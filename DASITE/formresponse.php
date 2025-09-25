<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Response</title>
</head>
<body>
    <h2>Form Response</h2>

    <?php
    function safeInput($key) {
        return htmlspecialchars(trim($_REQUEST[$key] ?? ''), ENT_QUOTES, 'UTF-8');
    }

    $fname = safeInput('fname');
    $lname = safeInput('lname');
    $car   = safeInput('car');

    if ($fname || $lname || $car) {
        echo "<p>Hello, your name is: <strong>$fname $lname</strong>.</p>";
        echo "<p>Your favorite car is: <strong>$car</strong>.</p>";
    } else {
        echo "<p>No form data received.</p>";
    }
    ?>

    <h2>Debug Raw Data</h2>
    <pre>GET: <?php var_dump($_GET); ?></pre>
    <pre>POST: <?php var_dump($_POST); ?></pre>
</body>
</html>
