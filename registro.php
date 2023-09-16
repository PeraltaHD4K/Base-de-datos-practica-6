<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de usuario</title>
</head>
<body>
	<script>
		function goBack() {
			window.history.back();
		}
	</script>

  <?php
  // Conexión a la base de datos
  $conexion = new PDO("mysql:host=localhost;dbname=jugueteria", "root", "");

  // Obtención de los datos del formulario
  $nombre = $_POST["nombre"];
  $correo = $_POST["correo"];
  $contrasena = $_POST["contrasena"];
  $contrasena2 = $_POST["contrasena2"];

  // Comprobación de que los datos son correctos
  if ($contrasena != $contrasena2) {
    echo "Las contraseñas no coinciden<br>";
	echo "<button onclick='goBack()'>Volver</button>";
	exit();
  }

  try{
  	$consulta = $conexion->prepare("INSERT INTO usuario (nombre,  correo, contrasena) VALUES (:nombre,  :correo, :contrasena)");
  	$consulta->bindParam(":nombre", $nombre);
    $consulta->bindParam(":correo", $correo);
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
    $consulta->bindParam(":contrasena", $contrasena_hash);
    $consulta->execute();

    // Redirección a la página principal
    header("Location: index.php");

  // Manejo de excepcion si el correo ya existe
  }catch(PDOException $e){
  	if($e->getCode() == 23000){
  		echo "<div class='alert alert-danger'>Error: Entrada duplicada. Ya existe un registro con estos valores.</div>";
      	echo "<div class='alert alert-danger'>El correo electrónico ya está en uso.</div>";
        echo "<button onclick='goBack()'>Volver</button>";
        exit();

  	}else{
  		echo "<div class='alert alert-danger'>Hubo un error con el registro de usuario.$e->message();</div>";
     	echo "<button onclick='goBack()'>Volver</button>";
        exit();
  	}
  }

  // Creación del nuevo usuario
  $consulta = $conexion->prepare("INSERT INTO usuario (nombre,  correo, contrasena) VALUES (:nombre,  :correo, :contrasena)");
  $consulta->bindParam(":nombre", $nombre);
  $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
  $consulta->bindParam(":contrasena", $contrasena_hash);
  $consulta->execute();
  
  
  // Redirección a la página principal
  header("Location: index.php");
?>
</body>
</html>