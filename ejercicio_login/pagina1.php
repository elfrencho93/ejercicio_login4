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
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h1>Hello $username!</h1>";
        echo "<p><a href='logout.php'>Log out</a></p>";
    } else {
        // Handle the case when 'username' is not set
        echo "<h1>Username not found in session.</h1>";
    }
} else {
    // User is not logged in
    // Display a message or redirect to the login page
    echo "<h1>This content is private. Please log in or sign up to access it.</h1>";
    echo "<p><a href='login.php'>Log In</a></p>";
    echo "<p><a href='formulario.php'>Sign Up</a></p>";
}
?>

</body>
</html>
