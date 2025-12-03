<?php
$raw_json = `/home/mark/Desktop/BM280/raspberry-pi-bme280/bme280`;
$data = json_decode($raw_json, true);

if ($data !== null && is_array($data)) {
    echo json_encode([
        "temperature" => htmlspecialchars($data["temperature"] ?? "N/A"),
        "pressure" => htmlspecialchars($data["pressure"] ?? "N/A"),
        "altitude" => htmlspecialchars($data["altitude"] ?? "N/A")
    ]);
} else {
    echo json_encode([
        "error" => "Failed to read sensor data or decode JSON."
    ]);
}
?>