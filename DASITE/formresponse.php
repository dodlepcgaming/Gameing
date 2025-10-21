<?php
$server = "localhost";
$username = "php";
$password = "password";
$database = "ClientList";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
}

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$car   = mysqli_real_escape_string($conn, $_POST['car']);

$sql = "INSERT INTO client_car (client_FN, client_LN, client_car)
        VALUES ('$fname', '$lname', '$car');";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submission</title>
    <link rel="stylesheet" href="Styling.css">
</head>
<body>
    <h2 class="header">Form Submission Result</h2>

    <div style="text-align:center; color:white;">
        <?php
        if ($result) {
            echo "<p style='color:lime;'>Success! Your data was added to the database.</p>";
        } else {
            echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
        }
        ?>

        <br>
        <a href="dasidesite.html" style="color:cyan;">← Back to Form</a>
        <br><br>
        <a href="displaydata.php" style="color:lightgray;">View Submitted Entries →</a>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
