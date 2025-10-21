<?php
$server = "markraspi5";
$username = "php";
$password = "password";
$database = "ClientList";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
}

$filter = "";
if (!empty($_GET['fname'])) {
    $fname = mysqli_real_escape_string($conn, $_GET['fname']);
    $filter = "WHERE client_FN LIKE '%$fname%'";
} elseif (!empty($_GET['car'])) {
    $car = mysqli_real_escape_string($conn, $_GET['car']);
    $filter = "WHERE client_car LIKE '%$car%'";
}

$sql = "SELECT id, client_FN, client_LN, client_car FROM client_car $filter ORDER BY id DESC;";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Car Database</title>
    <link rel="stylesheet" href="Styling.css">
</head>
<body>
    <h2 class="header">Client Car Records</h2>

    <div style="text-align:center;">
        <form method="GET" style="margin:20px auto;">
            <label for="fname" style="color:white;">Filter by First Name:</label>
            <input type="text" id="fname" name="fname" placeholder="Enter name" style="border-radius:5px; padding:5px;">
            <br><br>
            <label for="car" style="color:white;">Filter by Car:</label>
            <input type="text" id="car" name="car" placeholder="Enter car" style="border-radius:5px; padding:5px;">
            <br><br>
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
                        <td style='border:1px solid #999; padding:8px; color:#a3b9ff; font-weight:bold;'>{$row['id']}</td>
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
        <a href="index.html"><img class="EVIL" src="images/THECREATOR.jpg" style="max-width: 5%; height: auto;" alt="image of Mark in a very dark room smiling"></a>
    </div>
</body>
</html>
