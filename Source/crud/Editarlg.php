<?php include_once('../logic/conexion.php'); //conexion a la base de datos 
$usuario = $_POST['nnombre']; // Guarda el nombre del usuario ingresado en el formulario 
$pass = $_POST['npassword']; // Guarda el password del usuario ingresado en el formulario 
$id = $_POST['idusuario']; //obtenemos el id del usuario a eliminar 
if (empty($usuario) || empty($pass)) { // Si el usuario o la contraseña están vacíos     
    header("Location: index.html"); // Redirecciona a la página de index.html 

}

$qr = "UPDATE usuarios SET usuario='$usuario', password='$pass' WHERE idusuario='$id'"; //query para actualizar el usuario 
$result = mysqli_query(conectar(), $qr); //ejecutamos el query 
if ($result) { // Si se ejecutó correctamente el query    
    echo "Se ha actualizado el usuario con éxito"; //imprimimos un mensaje     
    echo "<br><a href='contenido.php'>Regresar página principal</a>";
    //imprimimos un link para regresar a la pagina principal 
} else {
    echo "Hubo un error al actualizar el usuario"; //imprimimos un mensaje 
} 
// header("Location: contenido.php"); 
