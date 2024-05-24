<?php 
    include_once('../logic/conexion.php'); session_start(); // Inicia la sesión 

    if (!isset($_SESSION['usuario'])) { // Si no hay una sesión activa (no hay un usuario que haya iniciado sesión) 
        header('Location: index.php'); // Redirecciona a la página de index.php     
        exit(); // Finaliza la ejecución del script 
    } 
    
    $usr = $_SESSION['usuario']; // Guarda el nombre del usuario en la variable $usr 
?>

<!DOCTYPE html> 
<html lang="en"> 
    
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
</head> 
    
<body> 
    <h1>Dashboard Administrativo</h1> <!-- Título de la página --> 
    <h2>Bienvenido, <?php echo $usr; ?>!</h2> <!-- Muestra el nombre del usuario --> 
        
    <a href="logic/cerrarsesion.php">Cerrar sesión</a> <!-- Link para cerrar sesión --> 
        
    <!-- Tabla CRUD usuarios --> 

    <input type="button" value="Agregar usuario" onclick="location.href='editar.php'"> <!-- Botón para agregar usuario -->  
        
    <table> <!-- Tabla para mostrar los usuarios --> 
        <tr> 
            <th>Usuario</th> <!-- Encabezado de la columna --> 
            <th>Contraseña</th> <!-- Encabezado de la columna --> 
            <th>Acciones</th> <!-- Encabezado de la columna --> 
        </tr>

        <?php     
            $sql = "select * from usuarios"; // Consulta para obtener todos los usuarios de la base de datos 
            $result = mysqli_query(conectar(), $sql); // Ejecuta la consulta y guarda el resultado en $result     
            while ($mostrar = mysqli_fetch_array($result)) { // Itera sobre cada fila del resultado de la consulta 
        ?>  
        <tr> 
            <td><?php echo $mostrar['usuario'] ?></td> <!-- Muestra el usuario --> 
            <td><?php echo $mostrar['password'] ?></td> <!-- Muestra la contraseña --> 
            <td><a href="editar.php?id=<?php echo $mostrar['idusuario'] ?>">Editar</a> 
            <td><a href="del.php?id=<?php echo $mostrar['idusuario'] ?>">Eliminar</a></td>
        </tr>
        <?php 
            } 
        ?> 
    </table>
</body>  
</html> 
 
