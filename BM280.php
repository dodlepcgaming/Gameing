<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BME280 Sensor Readings</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { margin-top: 50px; }
        .data-box { border: 1px solid #ccc; padding: 20px; margin: 10px auto; width: 300px; text-align: left; }
        h1 { color: #333; }
        p { font-size: 1.1em; }
        strong { display: inline-block; width: 120px; }
    </style>
</head>
<body>

    <div class="container">
        <h1>BME280 Weather Station Data</h1>

        <form method="post">
            <button type="submit" name="read_data">Refresh Readings</button>
        </form>

        <?php
        // Check if the button was pressed
        if (isset($_POST['read_data'])) {
            // 1. Execute the BME280 binary and capture its JSON output
            // Assumes the binary is in the same directory and is executable
            $raw_json = `./home/mark/Desktop/BM280/raspberry-pi-bme280/bme280`; 

            // 2. Decode the JSON string into an associative array
            $data = json_decode($raw_json, true);

            // 3. Check if decoding was successful and data exists
            if ($data !== null && is_array($data)) {
                
                // Get the individual readings
                $temp = htmlspecialchars($data["temperature"] ?? "N/A");
                $pressure = htmlspecialchars($data["pressure"] ?? "N/A");
                $altitude = htmlspecialchars($data["altitude"] ?? "N/A");

                // Display the results
                echo '<div class="data-box">';
                echo '<h2>Current Sensor Readings</h2>';
                echo '<p><strong>Temperature:</strong> ' . $temp . ' °C</p>';
                echo '<p><strong>Pressure:</strong> ' . $pressure . ' hPa</p>';
                echo '<p><strong>Altitude:</strong> ' . $altitude . ' m</p>';
                echo '</div>';
            } else {
                // Display an error if the command failed or JSON was invalid
                echo '<div class="data-box">';
                echo '<h2>Error</h2>';
                echo '<p>Failed to read sensor data or decode JSON.</p>';
                // Optional: show raw output for debugging
                // echo '<p>Raw Output: ' . htmlspecialchars($raw_json) . '</p>'; 
                echo '</div>';
            }
        } else {
            // Initial message before the button is pressed
            echo '<p>Press the button to retrieve the latest sensor data.</p>';
        }
        ?>
    </div>

</body>
</html>