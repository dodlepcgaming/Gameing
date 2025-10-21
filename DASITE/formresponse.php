<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Response</title>
</head>
<body>
    <h2>Form Response</h2>

    <?php

    $server = "localhost";
    $username = "php";
    $password = "password";
    $databse = "ClientList";

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

    echo "<h2 style='color:white;'>Form Submission Result:</h2>";
    echo $result 
        ? "<p style='color:lime;'>Data successfully inserted!</p>"
        : "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";

    // Optional link to view entries
    echo "<br><a href='displaydata.php' style='color:cyan;'>View submitted entries</a>";

    mysqli_close($conn);
    ?>
</body>
</html>
