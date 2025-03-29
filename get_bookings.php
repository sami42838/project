<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT time_slot FROM bookings ORDER BY time_slot ASC";
$result = $conn->query($sql);

$bookings = [];
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row['time_slot'];
}

echo json_encode($bookings);

$conn->close();
?>
