<?php
session_start();
if(isset($_SESSION['variable_de_session'])) {
  echo '<p>' . $_SESSION['variable_de_session'] . '</p>';  
    //echo $variable_normal;
    echo "<h1>Contenido público</h1>";
}else {
    //header("Location:index.php");
    echo "<h1>Contenido privada</h1>";
}

?>
<a href="formulario.php">Sign Up</a><br>
<a href="logout.php">Log out</a>