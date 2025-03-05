<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xmlData = $_POST['xmlInput'];

    libxml_disable_entity_loader(false);
    $dom = new DOMDocument();
    if (!$dom->loadXML($xmlData, LIBXML_NOENT | LIBXML_DTDLOAD)) {
        die('<div class="alert error"><i class="fas fa-times-circle"></i> Invalid XML document!</div>');
    }

    $vaultData = simplexml_import_dom($dom);
    sleep(2); // Processing delay

    echo '<div class="alert success">';
    echo '<i class="fas fa-check-circle"></i>';
    echo '<h2>Document Processed Successfully!</h2>';
    echo '<div class="result-box">';
    echo '<p class="meta">Security Log ID</p>';
    echo '<div class="output">'.htmlspecialchars($vaultData->message).'</div>';
    echo '</div></div>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Vault Manager | XML Processor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --success: #22c55e;
            --error: #ef4444;
            --background: #f8fafc;
            --surface: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--background);
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 1rem;
        }

        .container {
            background: var(--surface);
            width: 100%;
            max-width: 680px;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin: 2rem 0;
        }

        .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .header h1 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #64748b;
        }

        .editor-container {
            border: 2px dashed #cbd5e1;
            border-radius: 0.75rem;
            padding: 2rem;
            background: #f8fafc;
            transition: border-color 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .editor-container:hover {
            border-color: var(--primary);
        }

        #xmlInput {
            width: 100%;
            height: 200px;
            padding: 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.5rem;
            background: white;
            font-family: monospace;
            resize: vertical;
            transition: border-color 0.3s ease;
        }

        #xmlInput:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        button {
            background: var(--primary);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s ease, opacity 0.2s ease;
            width: 100%;
        }

        button:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .alert {
            padding: 1.5rem;
            border-radius: 0.75rem;
            margin: 1.5rem 0;
            display: flex;
            gap: 1rem;
        }

        .alert i {
            font-size: 1.5rem;
            margin-top: 0.25rem;
        }

        .success {
            background: #f0fdf4;
            color: var(--success);
            border: 2px solid #bbf7d0;
        }

        .error {
            background: #fef2f2;
            color: var(--error);
            border: 2px solid #fecaca;
        }

        .result-box {
            flex-grow: 1;
        }

        .result-box h2 {
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .output {
            background: white;
            padding: 1rem;
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            font-family: monospace;
            word-break: break-all;
        }

        .meta {
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .hint {
            text-align: center;
            color: #64748b;
            margin-top: 1.5rem;
            font-size: 0.875rem;
        }

        .loading {
            display: none;
            text-align: center;
            padding: 1.5rem;
            color: var(--primary);
        }

        .loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Secure Vault Manager</h1>
            <p>Validate XML security documents for system integration</p>
        </div>

        <div class="editor-container">
            <form method="POST" action="" id="docForm">
                <textarea 
                    id="xmlInput"
                    name="xmlInput"
                    placeholder="<?= htmlspecialchars('<!-- Paste your XML document here -->\n<data>\n  <message>Sample</message>\n</data>') ?>"
                ></textarea>
                <button type="submit">Validate Document →</button>
            </form>
        </div>

        <div class="loading">
            <i class="fas fa-spinner"></i> Analyzing document structure...
        </div>

        <p class="hint">
            🔒 Restricted access: <a href="/admin" style="color: var(--primary); text-decoration: none;">Admin portal</a>
        </p>
    </div>

    <script>
        document.getElementById('docForm').addEventListener('submit', () => {
            document.querySelector('.loading').style.display = 'block';
        });
    </script>
</body>
</html>
