<?php
// Database credentials
$servername = "localhost";
$username = "root"; // default XAMPP user
$password = ""; // leave empty in XAMPP
$dbname = "everglow_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Sanitize and fetch form data
$fullname = $conn->real_escape_string($_POST['fullname']);
$email = $conn->real_escape_string($_POST['email']);
$password_raw = $_POST['password'];
$phone = $conn->real_escape_string($_POST['phone']);
$address = $conn->real_escape_string($_POST['address']);
$payment=$conn->real_escape_string($_POST['payment']);

// Insert into table
$sql = "INSERT INTO users (Name,Email, Password, Phone, Address,Payment)
VALUES ('$fullname', '$email', '$password_raw', '$phone', '$address', '$payment')";

if ($conn->query($sql) === TRUE) {
echo "<h2>Registration successful!</h2>";

echo "<p><a href='register.html'>← Go back</a></p>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>