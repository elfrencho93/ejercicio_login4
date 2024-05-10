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
    </header>
    <nav>
      <?php
      //Iniciar la sesión
      session_start();
      $_SESSION['variable_de_session'] = "Look here!";
      echo '<p>' . $_SESSION['variable_de_session'] . '</p>';

      $variable_normal = "Sign up to our amazing website!";

      echo $variable_normal;

      ?>
      <p><a href="pagina1.php">Log In</a></p> 
  </nav>
  <section>

  </section>
  <article>

  </article>
  <footer>
  
  </footer>
</body>
</html>

