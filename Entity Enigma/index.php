<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xmlData = $_POST['xmlInput'];

    
    $dom = new DOMDocument();
    // Load XML with options to resolve entities and load DTD
    if (!$dom->loadXML($xmlData, LIBXML_NOENT | LIBXML_DTDLOAD)) {
        die("<p style='color: #ff0066;'>:x: Invalid XML document!</p>");
    }

    // Convert DOM to SimpleXML for easier access
    $vaultData = simplexml_import_dom($dom);
    
    // Fake "Processing" delay (for realism)
    sleep(2);

    // Enhanced stylish output
    echo "<div style='display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f4f4;'>";
    echo "<div style='max-width: 500px; padding: 20px; background: linear-gradient(135deg, #ff758c, #ff7eb3); border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); text-align: center; font-family: Poppins, sans-serif;'>";
    echo "<h2 style='color: #fff; font-size: 24px;'>✔ Document Processed Successfully!</h2>";
    echo "<p style='color: #fff; font-size: 18px;'><strong>Security Log ID:</strong> " . htmlspecialchars($vaultData) . "</p>";
    echo "<a href='/' style='display: inline-block; margin-top: 15px; padding: 10px 20px; background: #fff; color: #ff758c; text-decoration: none; border-radius: 5px; font-weight: bold;'>Go Back</a>";
    echo "</div>";
    echo "</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Haven | Your Pet's Favorite Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --background: #121212;
            --surface: #1e1e1e;
            --primary: #bb86fc;
            --text: #e0e0e0;
            --border: #333;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: var(--background);
            color: var(--text);
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 2rem;
        }
        .hero {
            text-align: center;
            padding: 4rem 0;
            background: var(--surface);
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        .products, .testimonials, .blog {
            margin-bottom: 3rem;
        }
        .section-title {
            text-align: center;
            margin-bottom: 1rem;
            color: var(--primary);
            font-size: 1.8rem;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        .card {
            background: var(--surface);
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        textarea {
            width: 100%;
            height: 150px;
            background: #222;
            color: var(--text);
            border: 1px solid var(--border);
            padding: 1rem;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero">
            <h1>Welcome to Pet Haven</h1>
            <p>Your one-stop shop for pet supplies and accessories.</p>
        </div>
        
        <div class="products">
            <h2 class="section-title">Featured Products</h2>
            <div class="grid">
                <div class="card">
                    <img src="https://lyka.com.au/opengraph.jpg" alt="Dog Food">
                    <h3>Premium Dog Food</h3>
                    <p>High-quality nutrition for your furry friend.</p>
                </div>
                <div class="card">
                    <img src="https://www.purina-arabia.com/sites/default/files/2020-12/Article%20teaser%20cat%20games.jpg" alt="Cat Toy">
                    <h3>Interactive Cat Toy</h3>
                    <p>Keep your cat entertained for hours.</p>
                </div>
            </div>
        </div>
        
        <div class="comment-section">
            <h2 class="section-title">Leave a Comment</h2>
            <form method="POST" action="">
                <textarea name="xmlInput" placeholder="Hello!"></textarea>
                <button type="submit">Submit Comment</button>
            </form>
        </div>
    </div>
</body>
</html>
