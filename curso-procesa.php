<?php 
require_once('librerias/conexionBD.php');
$id= $_POST['id'];
$sigla = $_POST['sigla'];
$nombre = $_POST['nombre'];
$paralelo = $_POST['paralelo'];
$nivel = $_POST['nivel'];

if($id==0)
{
$sql = "insert into curso (sigla, nombre, paralelo, nivel) values ('$sigla','$nombre', '$paralelo',$nivel)";

}
else
{
	
$sql = "update curso set sigla='$sigla', nombre='$nombre', paralelo='$paralelo', nivel=$nivel where id=$id";

}


$result =  $conn->query($sql);	
if (!$result) die('Error al insertar');
header('Location: curso.php');
?>