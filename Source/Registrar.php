<?php 
include_once('./logic/conexion.php'); //conexion a la base de datos $usuario = $_POST['nnombre']; // Guarda el nombre del usuario ingresado en el formulario 
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword']; // Guarda el password del usuario ingresado en el formulario 
if(empty($usuario) || empty($pass)){ // Si el usuario o la contraseña están vacíos     
  header("Location: index.php"); // Redirecciona a la página de index.php     
  exit(); // Sale del script actual 
} 

// $sql="select * from usuarios where password='$pass'"; //el error que tien es que no esta comparando el usuario con el password 
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$pass'"; // Selecciona todos los datos de la tabla usuarios donde el password sea igual al password ingresado 
$result = mysqli_query(conectar(), $sql); //ejecutamos el query

//verificar si un usuario ya existe
if(mysqli_num_rows($result) > 0) { // Si el número de filas es mayor a 0 significa que ya existe un usuario con ese nombre
  // El usuario ya existe
  echo "El usuario ya existe"; //imprimimos un mensaje 
  echo "<br><a href='index.php'>Regresar al login</a>"; //imprimimos un link para regresar a la pagina principal
  exit(); // Sale del script actual
} 

$sql1 = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$pass')"; //query para registrar el usuario 
$result1 = mysqli_query(conectar(), $sql1); //ejecutamos el query
if($result1) { // Si se ejecutó correctamente el query
  echo "Se ha registrado el usuario con éxito"; //imprimimos un mensaje
  echo "<br><a href='index.php'>Regresar al login</a>"; //imprimimos un link para regresar a la pagina principal 
} else { // Si no se ejecutó correctamente el query
  echo "Hubo un error al registrar el usuario"; //imprimimos un mensaje
}
?>