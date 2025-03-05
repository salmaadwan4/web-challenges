<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

$key = "dummy_key"; // Not used for validation (intentional)

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $users = ["guest" => "guest123", "admin" => "adminSecret"];

    if (isset($users[$username]) && $users[$username] === $password) {
        $payload = ["username" => $username, "role" => "user"];
        $jwt = JWT::encode($payload, $key, 'HS256');
        setcookie("auth", $jwt, time() + 3600, "/");
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "🚨 Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>🚀 Space Corp Login</title>
    <style>
        body { 
            background: #0f0c29; 
            color: white; 
            font-family: Arial; 
            text-align: center;
        }
        .login-box {
            background: linear-gradient(45deg, #1a1a2e, #16213e);
            padding: 2rem;
            border-radius: 15px;
            width: 300px;
            margin: 5% auto;
            box-shadow: 0 0 20px rgba(0, 191, 255, 0.3);
        }
        input {
            padding: 10px;
            margin: 10px;
            width: 80%;
            background: rgba(255,255,255,0.1);
            border: 1px solid #00bfff;
            color: white;
        }
        button {
            background: #00bfff;
            border: none;
            padding: 10px 20px;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .hint {
            color: #00bfff;
            font-size: 0.9em;
        }
        h2 {
    font-size: 1.2rem; 
    white-space: nowrap; 
        }

    </style>
</head>
<body>
    <div class="login-box">
        <h2 style="font-size: 1.2rem; white-space: nowrap;">🚀 Welcome to Space Corp</h2>
        <?php if(isset($error)) echo "<p style='color:#ff4444'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Astronaut ID" required><br>
            <input type="password" name="password" placeholder="Launch Code" required><br>
            <!--Hint: Try astronaut ID "guest" with launch code "guest123"-->
            <button type="submit">Launch</button>
        </form>
        <p class="hint">Hint: Look deeper</p>
    </div>
</body>
</html>
