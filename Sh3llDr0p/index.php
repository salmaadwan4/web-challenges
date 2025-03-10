<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ip = $_POST['ip'];
    $output = shell_exec("ping -c 4 " . $ip);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ping Tool</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e7dff, #00bfae);
            font-family: 'Arial', sans-serif;
            color: #fff;
        }
        .container {
            margin-top: 100px;
            z-index: 10;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            color: #333;
        }
        .card-header {
            background: linear-gradient(135deg, #00bfae, #6e7dff);
            color: #fff;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-primary {
            background-color: #00bfae;
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            width: 100%;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1e9e7f;
        }
        .form-control {
            border-radius: 50px;
            border: 2px solid #ddd;
            padding: 15px;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #00bfae;
            box-shadow: 0 0 5px rgba(0, 191, 174, 0.7);
        }
        .output {
            background-color: #f1f1f1;
            border-radius: 15px;
            padding: 15px;
            margin-top: 30px;
            font-family: 'Courier New', Courier, monospace;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: #333;
        }
        .error {
            color: #ff6f61;
        }
        .success {
            color: #4caf50;
        }
        .footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 14px;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Ping Tool</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="ip" class="form-label">Enter IP Address:</label>
                                <input type="text" class="form-control" id="ip" name="ip" placeholder="e.g., 8.8.8.8" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ping</button>
                        </form>
                        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                            <div class="output mt-4">
                                <?php if (isset($output) && strpos($output, 'Invalid IP address') === false): ?>
                                    <h5>Ping Output:</h5>
                                    <pre><?php echo htmlspecialchars($output); ?></pre>
                                <?php else: ?>
                                    <p class="error"><?php echo $output; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
