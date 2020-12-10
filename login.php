<?php 
session_start();
require_once('librerias/conexionBD.php');

$usuario = $_POST['usuario'];
$password = md5($_POST['password']);

$sql =  "select * from usuario where usuario = '$usuario' and password='$password' limit 1";

$result = $conn->query($sql);
if (!$result) die('Error al seleccionar');

if ($result->num_rows > 0){
    $fila = $result->fetch_array();
    $_SESSION["login"] = "OK";
    $_SESSION["usuario"] = $usuario;
	$_SESSION["id_sesion"] = $fila['id'];
    header('Location: inicio.php');
}
else{
    header('Location: index.php');
}
?>