<?php
// Read current LED state
$currentState = trim(shell_exec("gpio read 7"));

// Handle button press
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['toggle'])) {
        // Toggle the LED
        shell_exec("gpio toggle 7");
        $currentState = trim(shell_exec("gpio read 7"));
    }
    if (isset($_POST['button'])) {
        // Set LED ON or OFF based on current state
        if ($currentState == "1") {
            shell_exec("gpio write 7 0");
        } else {
            shell_exec("gpio write 7 1");
        }
        $currentState = trim(shell_exec("gpio read 7"));
    }
}
$buttonlabel1 = "Toggle LED";
$buttonlabel2 = ($currentState == "1") ? "Turn ON" : "Turn OFF";
?>

<html>
<head>
    <title>LED Control</title>
</head>
<body>
<h1>LED BUTTONS</h1>
<form method="post">
    <input type="submit" name="toggle" value="1"><?php echo $buttonlabel1; ?>
    <input type="submit" name="button" value="1"><?php echo $buttonlabel2; ?>
</form>
<p>LED State: <?php echo htmlspecialchars($currentState); ?></p>
</body>
</html>