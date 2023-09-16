<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>

<body>
    <?php
    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=jugueteria", "root", "");

    // Obtención de los datos del formulario
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Consulta para obtener el hash de contraseña almacenado por correo
    $consulta = $conexion->prepare("SELECT id, nombre, contrasena FROM usuario WHERE correo = :correo");
    $consulta->bindParam(":correo", $correo);
    $consulta->execute();

    // Si el usuario existe
    if ($consulta->rowCount() == 1) {
        // Obtener los datos del usuario
        $fila = $consulta->fetch(PDO::FETCH_ASSOC);
        $id_usuario = $fila["id"];
        $username = $fila["nombre"];
        $contrasena_hash = $fila["contrasena"];

        // Verificar la contraseña proporcionada con el hash almacenado
        if (password_verify($contrasena, $contrasena_hash)) {
            // Contraseña válida, iniciar sesión
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["id_usuario"] = $id_usuario;
            $_SESSION["username"] = $username;

            // Redirección a la página principal
            header("Location: sesion_iniciada.php");
        } else {
            // Contraseña incorrecta
            echo "El usuario o la contraseña no son correctos.<br>";
            echo "<a href=index.php>Regresar</a>";
            exit();
        }
    } else {
        // El usuario no existe
        echo "El usuario o la contraseña no son correctos.<br>";
        echo "<a href=index.php>Regresar</a>";
        exit();
    }
    ?>

</body>

</html>