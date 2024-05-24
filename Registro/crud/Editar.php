<?php include_once('./logic/conexion.php'); //conexion a la base de datos 
if (isset($_GET['id'])) { //obtenemos el id del usuario a editar 
    $id = $_GET['id']; //obtenemos el id del usuario a editar  
    // Obtener los detalles del usuario de la base de datos 

    $sql = "SELECT * FROM usuarios WHERE idusuario = '$id'"; //query para obtener los datos del usuario 
    $result = mysqli_query($conexion, $sql); //ejecutamos el query 
    if (mysqli_num_rows($result) > 0) {  // Si el número de filas es mayor a 0 significa que ya existe un usuario con ese nombre 
        $usuario = mysqli_fetch_assoc($result); //obtenemos los datos del usuario 
    } else { // Si no existe el usuario         
        echo "No se encontró el usuario";
        exit; // Sale del script actual     
    }
} else {
    echo "ID de usuario no especificado"; // Si no se especifica el id del usuario a editar     
    exit; // Sale del script actual 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>

<body>
    <h1>Editar Usuario</h1>

    <form action="editarlg.php" method="POST"> <!-- Formulario para editar el usuario -->
        <input type="hidden" name="id" value="<?php echo $usuario['idusuario'];
                                                ?>"> <!-- Campo oculto para enviar el id del usuario a editar --> <input type="text" name="nnombre" placeholder="Usuario" value="<?php echo $usuario['usuario']; ?>"> <!-- Campo para el nombre del usuario -->
        <input type="text" name="npassword" placeholder="Contraseña" value="<?php echo $usuario['password']; ?>"> <!-- Campo para la contraseña del usuario -->
        <input type="submit" value="Guardar"> <!-- Botón para guardar los cambios -->
    </form> <!-- Fin del formulario para editar el usuario -->
</body>

</html>