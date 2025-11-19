<?php
// Ensure pin is set to output mode
shell_exec("gpio mode 7 out");

// Read current LED state
$currentState = trim(shell_exec("gpio read 7"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['toggle'])) {
        shell_exec("gpio toggle 7");
        $currentState = trim(shell_exec("gpio read 7"));
    }
    if (isset($_POST['button'])) {
        if ($currentState == "1") {
            shell_exec("gpio write 7 0"); // turn OFF
        } else {
            shell_exec("gpio write 7 1"); // turn ON
        }
        $currentState = trim(shell_exec("gpio read 7"));
    }
}

$buttonlabel1 = "Toggle LED";
$buttonlabel2 = ($currentState == "1") ? "Turn OFF" : "Turn ON";
?>
<html>
<head><title>LED Control</title></head>
<body>
<h1>LED BUTTONS</h1>
<form method="post">
    <input type="submit" name="toggle" value="<?php echo $buttonlabel1; ?>">
    <input type="submit" name="button" value="<?php echo $buttonlabel2; ?>">
</form>
<p>LED State: <?php echo htmlspecialchars($currentState); ?></p>
</body>
</html>
