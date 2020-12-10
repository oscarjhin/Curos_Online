<?php 
require_once('librerias/conexionBD.php');
$id= $_POST['id'];
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);
$password2 = $_POST['password2'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$id_rol_u = $_POST['rol_usuario'];

/*
echo "PAS 1: ".$password."<br>";
echo "PAS 2: ".$password2."<br>";
*/

if($id==0)
{
$sql = "insert into usuario (usuario, password, ap_paterno, ap_materno, nombre, correo, id_rol_u) values ('$usuario','$password','$paterno', '$materno', '$nombre', '$correo', $id_rol_u)";

}
else
{
	if($password!=$password2)
		$sql = "update usuario set usuario='$usuario', password='$password2', ap_paterno='$paterno', ap_materno='$materno', nombre='$nombre', correo='$correo' where id=$id";
	else
		$sql = "update usuario set usuario='$usuario', password='$password', ap_paterno='$paterno', ap_materno='$materno', nombre='$nombre', correo='$correo', id_rol_u=$id_rol_u where id=$id";
	


}


$result =  $conn->query($sql);	
if (!$result) die('Error al insertar');
header('Location: usuario.php');
?>