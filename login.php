<?php
session_start();

// DB credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "everglow_db";

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize input
$email = $conn->real_escape_string($_POST['email']);
$password_input = $_POST['password'];

// Query
$sql = "SELECT Name FROM users WHERE Email='$email' AND Password='$password_input'";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
  $row = $result->fetch_assoc();
  $name = $row['Name'];
  $_SESSION['user'] = $name;
  echo "<h2>Login successful!   </h2><br></br>";
  echo "<p>Welcome back, " . htmlspecialchars($name) . "!</p>";
  echo "<p><a href='index.html'>← Go to Home</a></p>";
} else {
  echo "<h3>Invalid email or password.</h3>";
  echo "<p><a href='login.html'>← Try Again</a></p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Status - Everglow</title>
  <link rel="stylesheet" href="form-style.css">
</head>
</html>

