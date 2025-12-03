function updateSensorData() {
    fetch('BM280_data.php')
        .then(response => response.json())
        .then(data => {
            let html = '';
            if (data.error) {
                html = `<div class="data-box">
                            <h2>Error</h2>
                            <p>${data.error}</p>
                        </div>`;
            } else {
                html = `<div class="data-box">
                            <h2>Current Sensor Readings</h2>
                            <p><strong>Temperature:</strong> ${data.temperature} °C</p>
                            <p><strong>Pressure:</strong> ${data.pressure} hPa</p>
                            <p><strong>Altitude:</strong> ${data.altitude} m</p>
                        </div>`;
            }
            document.getElementById('sensor-data').innerHTML = html;
        })
        .catch(error => {
            document.getElementById('sensor-data').innerHTML = `<div class="data-box"><h2>Error</h2><p>Could not fetch data.</p></div>`;
        });
}

setInterval(updateSensorData, 1000);
window.onload = updateSensorData;