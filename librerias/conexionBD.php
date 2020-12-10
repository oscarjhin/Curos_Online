<?php 
$host = 'localhost';
$user = 'root';
$pass = 'jhin6730026';
$bdat = 'bd_cursos_online';

$conn = new mysqli($host,$user,$pass,$bdat);

if ($conn->connect_errno > 0){
    die('Error de conexion ' . $conn->connect_error);
}
?>