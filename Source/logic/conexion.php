<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

function conectar() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $message = "";

    if ($conn->connect_error) {
        $message ="Error al conectar a la base de datos: ";
        die($message . $conn->connect_error);
    }
    $message = "Conexión exitosa a la base de datos";

    return $conn;
}



// $conn->close();
?>
