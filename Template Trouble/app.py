from flask import Flask, request, render_template_string, render_template

app = Flask(__name__)
FLAG = open("/flag.txt").read()

BLACKLIST = [
    "os", "system", "eval", "exec", "class",
    "subprocess","config", "self", "mro", "_", "base", "subclasses"
]

@app.route("/")
def index():
    return render_template("index.html")

@app.route("/render", methods=["POST"])
def render():
    template = request.form.get("template", "")
    if not template:
        return "Submit a 'template' parameter.", 400

    # Block blacklisted keywords (case-insensitive)
    for keyword in BLACKLIST:
        if keyword in template.lower():
            return f"Forbidden keyword: {keyword}", 403

    try:
        rendered = render_template_string(template)
        return render_template("index.html", template=template, rendered=rendered)
    except Exception as e:
        return render_template("index.html", error=str(e))

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
