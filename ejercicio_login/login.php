<?php
session_start();

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Perform the login validation here
    // If the login is successful, set the session variable
    $data_string = file_get_contents('user_data.txt');
    $data = json_decode($data_string, true);

    if ($_POST['username'] == $data['nombre'] && $_POST['password'] == $data['password']) {
        $_SESSION['logged_in'] = true;
        // Redirect the user to the private content page
        header("Location: pagina1.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" name="submit">Log In</button>
    </form>
</body>
</html>
