<?php include_once('./logic/conexion.php'); //conexion a la base de datos 
$id=$_GET['idusuario']; //obtenemos el id del usuario a eliminar 
$qr="DELETE FROM usuarios WHERE idusuario='$id'"; //query para eliminar el usuario 
$result =mysqli_query($conexion,$qr); //ejecutamos el query  echo "Se ha eliminado el usuario con exito"; //imprimimos un mensaje  echo "<br><a href='contenido.php'>Regresar página principal</a>"; 
//imprimimos un link para regresar a la pagina principal 
// header("Location: contenido.php"); ?> 
