<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styleindex.css">
</head>
<body>
<?php
session_start();

if (isset($_SESSION['logged_in'])) {
    // User is logged in
    // Display the private content
    $username = $_SESSION['username']; // Assuming the username is stored in the session
    echo "<h1>Hello $username.</h1>";
    echo "<p><a href='logout.php'>Log out</a></p>";
} else {
    // User is not logged in
    // Display a message or redirect to the login page
    echo "<h1>This content is private. Please log in to access it.</h1>";
    echo "<p><a href='login.php'>Log In</a></p>";
}
?>

<p><a href="index.php">Back to Index</a></p>
</body>
</html>
