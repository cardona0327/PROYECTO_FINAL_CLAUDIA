<?php
session_start();

// Generar un texto CAPTCHA aleatorio
$captcha_text = substr(md5(rand()), 0, 6);
$_SESSION['captcha_text'] = $captcha_text;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPTCHA</title>
    <style>
        .captcha-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 120px;
            height: 50px;
            background-color: #f4f4f4;
            border: 2px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .captcha-text {
            font-size: 24px;
            font-family: 'Arial', sans-serif;
            color: #333;
            font-weight: bold;
            text-align: center;
            line-height: 50px;
        }
    </style>
</head>
<body>
    <div class="captcha-container">
        <div class="captcha-text"><?php echo htmlspecialchars($captcha_text); ?></div>
    </div>
</body>
</html>
