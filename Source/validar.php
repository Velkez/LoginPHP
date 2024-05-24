<?php 
include_once('./logic/conexion.php'); 
// session_destroy(); // Destruye la sesión por si hay una activa 
session_start() ; // Inicia la sesión 

$usuario = $_POST['nnombre']; // Guarda el nombre del usuario ingresado en el formulario 
$pass = $_POST['npassword']; // Guarda el password del usuario ingresado en el formulario

if(empty($usuario) || empty($pass)){ // Si el usuario o la contraseña están vacíos     
    header("Location: index.php"); // Redirecciona a la página de index.php     
    exit(); 
} 


// $sql="select * from usuarios where password='$pass'"; // Selecciona todos los datos de la tabla usuarios donde el password sea igual al password ingresado 
$query="SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass'"; //query para registrar el usuario y el password  
$result =mysqli_query(conectar(), $query); //ejecutamos el query 
$array = mysqli_fetch_array($result); // Guarda los datos de la consulta en un array 
if($array['usuario'] == $usuario && $array['password'] == $pass){ // Si el usuario y el password ingresado son iguales a los de la base de datos     
    session_start(); // Inicia la sesión  
    $_SESSION['usuario'] = $usuario; // Guarda el nombre del usuario que inició sesión en la variable usuario     
    header("Location: ./crud/contenido.php"); // Redirecciona a la página de contenido.php 
}else{      
    echo "Usuario o contraseña incorrectos"; //imprimimos un mensaje     
    echo "<br><a href='index.php'>Regresar al login</a>"; //imprimimos un link para regresar a la pagina principal 
} 
 
// if($row = mysqli_fetch_array($result)){ 
//  if($row['password'] ==  $pass){ 
//      session_start(); 
//      $_SESSION['usuario'] = $usuario; 
//      header("Location: contenido.php"); 
//  }else{ 
         
//  } 
// }else{ 
//  header("Location: index.html"); 
//  exit(); 
// } 
