<?php
$server = "markraspi5";
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

if ($result) {
    $new_id = mysqli_insert_id($conn);
    echo "<p style='color:lime;'>Success! Your data was added to the database.</p>";
    echo "<p style='color:white;'>Your assigned ID is: <b>$new_id</b></p>";
} else {
    echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
}

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
        <a href="index.html"><img class="EVIL" src="images/THECREATOR.jpg" style="max-width: 5%; height: auto;" alt="image of Mark in a very dark room smiling"></a>
        <a href="displaydata.php"><img class="EVILER" src="images/THECREATOR.jpg" style="max-width: 5%; height: auto;" alt="image of Mark in a very dark room smiling"></a>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
