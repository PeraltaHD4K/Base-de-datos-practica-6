<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
</head>

<body>
  <?php
  session_start();

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    echo "<p>Has iniciado sesión correctamente como " . $_SESSION["username"] . ".</p>";
    echo "<a href='sesion_iniciada.php'>Ir a la sesion</a>";
  }else{
    echo "<form action='login.php' method='post'>
      <input type='text' name='correo' placeholder='Correo electrónico' required>
      <input type='password' name='contrasena' placeholder='Contraseña' required>
      <input type='submit' value='Iniciar sesión'>
    </form>";
    echo "<p>No tienes una cuenta? <a href='crear_usuario.html'>Crear usuario</a></p>";
  }

  $mostrarLink = !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true;
  ?>

</body>

</html>