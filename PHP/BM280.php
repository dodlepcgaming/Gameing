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
    <script src="BM280.js"></script>
</head>
<body>

    <div class="container">
        <h1>BME280 Weather Station Data</h1>
        <div id="sensor-data">
            <p>Loading sensor data...</p>
        </div>
    </div>

</body>
</html>