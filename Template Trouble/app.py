import re
from flask import Flask, request, render_template_string, render_template

app = Flask(__name__)
FLAG = open("/flag.txt").read()

# Expanded blacklist of keywords (case-insensitive) to block more dangerous patterns
BLACKLIST = [
    "os", "system", "eval", "exec", "class", "subprocess", "config", "self", "mro", "_", "base", "subclasses",
    "import","read", "open", "getattr", "setattr", "globals", "locals", "compile", "input", "repr", "filter", "map", "reduce", "flag.txt", "cat" , "ls", "id" ]

@app.route("/")
def index():
    return render_template("index.html")

@app.route("/render", methods=["POST"])
def render():
    template = request.form.get("template", "")
    if not template:
        return "Submit a 'template' parameter.", 400

    # Check for blacklisted keywords (case-insensitive)
    for keyword in BLACKLIST:
        if keyword in template.lower():
            return "BLACKLIST", 403
    # Check if the template contains hex encoding, and decode it
    decoded_template = decode_hex(template)

    # Block if decoding resulted in a forbidden keyword
    for keyword in BLACKLIST:
        if keyword in decoded_template.lower():
            return "BLACKLIST", 403
    try:
        rendered = render_template_string(decoded_template)
        return render_template("index.html", template=template, rendered=rendered)
    except Exception as e:
        return render_template("index.html", error=str(e))

def decode_hex(encoded_str):
    """
    This function decodes a hex-encoded string to its ASCII representation.
    Example: '%7B%22template%22%3A%20%22Hello%20World%22%7D' -> '{"template": "Hello World"}'
    """
    # Match hex-encoded strings like %XX (e.g., %20 for space)
    hex_pattern = re.compile(r'%[0-9A-Fa-f]{2}')
    
    # Decode hex to characters
    decoded_str = re.sub(hex_pattern, lambda x: chr(int(x.group(0)[1:], 16)), encoded_str)

    return decoded_str

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
