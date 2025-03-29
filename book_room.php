<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $time = $_POST['time'];

    $checkQuery = "SELECT * FROM bookings WHERE time_slot = '$time'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "<script>alert('This time slot is already booked. Please choose another.'); window.location.href='booking.html';</script>";
    } else {
        $insertQuery = "INSERT INTO bookings (name, email, time_slot) VALUES ('$name', '$email', '$time')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Room booked successfully!'); window.location.href='book_room.html';</script>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
