<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <header>
      <h1>Register</h1>
      <?php
    //Iniciar la sesión
    session_start();
    $_SESSION['variable_de_session'] = "Sign up to our amazing website!";
    echo '<p>' . $_SESSION['variable_de_session'] . '</p>';

    $variable_normal = "Git es un sistema de control de versiones distribuido";

    echo $variable_normal;

    ?>
    <p><a href="pagina1.php">Log In</a></p>  
    </header>
</body>
</html>

