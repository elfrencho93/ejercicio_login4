<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    // User is logged in
    // Display the private content
    echo "<h1>Hello World!</h1>";
    echo "<p><a href='logout.php'>Log out</a></p>";
} else {
    // User is not logged in
    // Display a message or redirect to the login page
    echo "<h1>This content is private. Please log in or sign up to access it.</h1>";
    echo "<p><a href='login.php'>Log In</a></p>";
    echo "<p><a href='formulario.php'>Sign Up</a></p>";
}
?>
