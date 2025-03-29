<?php
session_start();
$host = "localhost";
$dbname = "knowledge_portal";
$username = "root"; // Change if needed
$password = ""; // Change if needed

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = md5($_POST['password']); // MD5 hashing for simple security

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $user;
        header("Location: project.html");
        exit();
    } else {
        echo "<script>
                alert('Invalid username or password');
                window.location.href = 'login.html';
              </script>";
    }
}

$conn->close();
?>
