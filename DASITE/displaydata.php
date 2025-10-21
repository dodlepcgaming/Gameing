<?php
$server = "localhost";
$username = "php";
$password = "password"; // Replace with your actual password
$database = "mydb";     // Replace with your actual DB name

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
}

$filter = "";
if (!empty($_GET['fname'])) {
    $fname = mysqli_real_escape_string($conn, $_GET['fname']);
    $filter = "WHERE client_FN LIKE '%$fname%'";
}

$sql = "SELECT * FROM client_car $filter;";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submitted Car Data</title>
    <link rel="stylesheet" href="Styling.css">
</head>
<body>
    <h2 class="header">Submitted Car Information</h2>

    <div style="text-align:center;">
        <form method="GET" style="margin:20px auto;">
            <label for="fname" style="color:white;">Filter by first name:</label>
            <input type="text" name="fname" id="fname" placeholder="Enter first name" style="border-radius:5px; padding:5px;">
            <input type="submit" value="Search" style="border-radius:5px; padding:5px;">
        </form>

        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<table style='margin:0 auto; border-collapse:collapse; width:80%; color:white; text-align:center;'>";
            echo "<tr style='background: linear-gradient(to bottom, #b5c3ff, #000);'>
                    <th style='border:1px solid #999; padding:8px;'>ID</th>
                    <th style='border:1px solid #999; padding:8px;'>First Name</th>
                    <th style='border:1px solid #999; padding:8px;'>Last Name</th>
                    <th style='border:1px solid #999; padding:8px;'>Car</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td style='border:1px solid #999; padding:8px;'>{$row['client_number']}</td>
                        <td style='border:1px solid #999; padding:8px;'>{$row['client_FN']}</td>
                        <td style='border:1px solid #999; padding:8px;'>{$row['client_LN']}</td>
                        <td style='border:1px solid #999; padding:8px;'>{$row['client_car']}</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p style='color:yellow;'>No results found!</p>";
        }

        mysqli_close($conn);
        ?>

        <br>
        <a href="dasidesite.html" style="color:cyan;">← Back to Form</a>
        <br><br>
        <a href="index.html" style="color:lightgray;">🏠 Return to Home</a>
    </div>
</body>
</html>
