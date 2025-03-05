<?php
if (!isset($_COOKIE['auth'])) die("Access denied!");

$token = $_COOKIE['auth'];
$payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], explode('.', $token)[1])));

if ($payload->role !== "admin") die("🔒 Insufficient clearance level!");

echo '
<!DOCTYPE html>
<html>
<head>
    <title>🚀 Admin Panel</title>
    <style>
        .flag-box {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            padding: 2rem;
            border-radius: 15px;
            width: 80%;
            margin: 5% auto;
            animation: glow 2s infinite;
        }
        @keyframes glow {
            0% { box-shadow: 0 0 20px #4CAF50; }
            50% { box-shadow: 0 0 40px #4CAF50; }
            100% { box-shadow: 0 0 20px #4CAF50; }
        }
    </style>
</head>
<body>
    <div class="flag-box">
        <h1>🚩 Mission Accomplished!</h1>
        <p>Flag: <strong>BAU{JWT_Tampering_In_Space}</strong></p>
        <p>🌌 You\'ve successfully hacked the Space Corp!</p> <!-- Escaped apostrophe -->
    </div>
</body>
</html>
';
?>
