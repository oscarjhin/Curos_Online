<?php 
require_once('librerias/conexionBD.php');
$id= $_POST['id'];
$descripcion = $_POST['descripcion'];

if($id==0)
{
$sql = "insert into rol_usuario (descripcion) values ('$descripcion')";

}
else
{
	
$sql = "update rol_usuario set descripcion='$descripcion' where id=$id";

}


$result =  $conn->query($sql);	
if (!$result) die('Error al insertar');
header('Location: rol_usuario.php');
?>