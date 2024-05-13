<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>
    <header>
      <h1>Register</h1> 
    </header>
    <nav>
    <?php
      session_start();
      if (isset($_SESSION['logged_in'])) {
      // User is logged in
      // Display the private content
        echo "<p><a href='logout.php'>Log out</a></p>";
      } else {
      // User is not logged in
      // Display the public content
        echo "<p><a href='login.php'>Log In</a></p>";
        echo "<a href='formulario.php'>Sign Up</a>";
    }
  ?>
  </nav>
  <section>
    <h2>About Our Product</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, mauris eget luctus ultricies, ipsum nunc ultrices metus, ac lacinia justo nisl id elit.</p>
    <p>Integer nec nunc vel nulla ultrices aliquet. Fusce euismod, nunc vel tincidunt lacinia, mauris sem posuere risus, eget lacinia felis nunc id nunc.</p>
  </section>

  <article>
  <h2>Latest News</h2>
  <h3><a href="pagina1.php">Article Title</a></h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, mauris eget luctus ultricies, ipsum nunc ultrices metus, ac lacinia justo nisl id elit.</p>
  <p>Integer nec nunc vel nulla ultrices aliquet. Fusce euismod, nunc vel tincidunt lacinia, mauris sem posuere risus, eget lacinia felis nunc id nunc.</p>
  </article>

  <footer>
    <p>&copy; 2024 Your Website. All rights reserved.</p>
    <p>Contact: info@example.com</p>
  </footer>
</body>
</html>

