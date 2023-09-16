<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido</title>
</head>
<body>
  <?php

  session_start();

  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: index.html");
    exit;
  }
  ?>
  <h1>Bienvenido, <?php echo $_SESSION["username"]; ?>!</h1>
  <p>Has iniciado sesión correctamente.</p>
  <a href="index.php">Volver al inicio de sesion</a><br>
  <a href="cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>
