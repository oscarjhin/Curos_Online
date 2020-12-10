<?php 
require_once('librerias/conexionBD.php');

$id=$_POST['id'];
$fecha=$_POST['fecha'];
$id_usuario=$_POST['id_usuario'];
$id_curso=$_POST['id_curso'];
$id_rol_u=$_POST['id_rol_u'];


if($id==0)
{
$sql = "insert into insc_curso (fecha, id_usuario, id_curso, id_rol_u) values ('$fecha', $id_usuario, $id_curso, $id_rol_u)";
}
else
{
	
$sql = "update insc_curso set fecha='$fecha', id_usuario=$id_usuario, id_curso=$id_curso, id_rol_u=$id_rol_u where id=$id";

}


$result =  $conn->query($sql);	
if (!$result) die('Error al insertar');
header('Location: inscripcion.php');
?>