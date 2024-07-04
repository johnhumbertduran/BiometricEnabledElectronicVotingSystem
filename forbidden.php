<?php
// Set the HTTP status code to 403
http_response_code(403);

// Display a forbidden message with Bootstrap 5.3.3
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="Biometric Enabled Electronic Voting System">
    <meta property="og:title" content="Biometric Enabled Electronic Voting System">
    <meta name="robots" content="index,follow">
    <meta name="MobileOptimized" content="width" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="description" content="BiometricEnabledElectronicVotingSystem">
    <meta name="keywords" content="Biometric,Enabled,Electronic,Voting,System">
    <!-- <meta property="og:image" content="me.JPG"> -->

    <link rel="icon" type="image/png" href="bins/sampleLogo.png">

    <link rel="stylesheet" href="bins/styles/color.css">
    <link rel="stylesheet" href="bins/styles/button.css">
    <link rel="stylesheet" href="bins/styles/footer.css">
    <link rel="stylesheet" href="bins/styles/dropdown.css">
    <link rel="stylesheet" href="bins/styles/select.css">
    <link rel="stylesheet" href="bins/bootstrap-5.3.3-dist/css/bootstrap.min.css"> <!-- Bootstrap 5 for offline -->
    <!-- Latest compiled and minified CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <!-- <link rel="stylesheet" href="../../bins/styles/styles.css"> -->

    <title>Biometric Enabled Electronic Voting System</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background-image: url("bins/403.png");
            background-size: contain;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-color: #8bb9f0;
        }
        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        h1 {
            font-size: 50px;
            color: #d9534f;
        }
        p {
            font-size: 20px;
        }
        .btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>403 Forbidden</h1>
        <p>You do not have permission to access this page.</p>
        <button class="button-green" onclick="history.back()">Go Back</button>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>';
