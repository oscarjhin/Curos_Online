<?php 
require_once('librerias/conexionBD.php');
$id= $_GET['id'];

$sql = "delete from insc_curso where id=$id";
$result =  $conn->query($sql);	
if (!$result) die('Error al eliminar');
header('Location: inscripcion.php');
?>