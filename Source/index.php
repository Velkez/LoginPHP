<?php session_start(); // Iniciala sesión
if (isset($_SESSION['usuario'])) { // verifica si existe la variable de sesión usuario para evitar que se acceda a contenido.php por URL
    session_destroy(); // Destruye la sesión existente }
// Verifica si se accede a index.php por URL sin cerrar la sesión
// if (!empty($_SESSION['usuario']) && basename($_SERVER['PHP_SELF']) !='index.php') { 
// basename($_SERVER['PHP_SELF']) devuelve el nombre del archivo actual
// header('Location: contenido.php'); // Redirecciona a la página de contenido.php
// exit(); // Finaliza la ejecución del script
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Login</title></head>
    <body>
        <div>
            <center>
                <form method="POST" action="validar.php"> <!-- validar.php es el archivo que se encarga de validar los datos ingresados en el formulario -->
                    <input type="text" name="nnombre" placeholder="Usuario" /> <!-- nnombre es el nombre del campo que se va a enviar a validar.php -->
                    <br />
                    <input type="password" name="npassword" placeholder="Contraseña"/> <!-- npassword es el nombre del campo que se va a enviar a validar.php -->
                    <br />
                    <button type="submit">Iniciar Sesion</button> <!-- Boton de envio -->

                    <a href="registro.html">¿No tienes una cuenta? Registrarse</a> <!-- Enlace a la pagina de registro -->
                </form>
            </center>
        </div>
    </body>
</html> 