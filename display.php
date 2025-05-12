<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Details</title>
</head>
<body>
  <h2>Submitted User Details</h2>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $fullname = htmlspecialchars($_POST["fullname"]);
      $email = htmlspecialchars($_POST["email"]);
      $password = htmlspecialchars($_POST["password"]);
      $phone = htmlspecialchars($_POST["phone"]);
      $address = htmlspecialchars($_POST["address"]);
      $payment = htmlspecialchars($_POST["payment"]);

      echo "<p><strong>Full Name:</strong> $fullname</p>";
      echo "<p><strong>Email:</strong> $email</p>";
      echo "<p><strong>Password:</strong> (hidden for security)</p>";
      echo "<p><strong>Phone:</strong> $phone</p>";
      echo "<p><strong>Address:</strong> $address</p>";
      echo "<p><strong>Payment Method:</strong> $payment</p>";
    } else {
      echo "<p>Error: No data submitted.</p>";
    }
  ?>
</body>
</html>
