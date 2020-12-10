<?php 

require_once('librerias/cabe.php');
require_once('librerias/conexionBD.php');

$id= $_POST['id'];
$clave1 = $_POST['password1'];
$clave2 = $_POST['password2'];
$clave=md5($_POST['password1']);

if($clave1==$clave2 && $clave1!="" && $clave2!="")
{
	$sql = "update usuario set password='$clave'where id=$id";
	$result =  $conn->query($sql);	
	if (!$result) die('Error al cambiar password');
	else
	 echo "<h2>Pasword actualizado satisfactoriamente</h2> <br>";	
}
else
{
	if($clave1=="" && $clave1=="")
		echo "<h2>No pude introducir vacios</h2> <br>";
	else
		echo "<h2>Los passwords no son iguales</h2> <br>";	
}	

//header('Location: cambiar_password.php');

?>

<a href="cambiar_password.php" class="btn btn-danger">Volver</a>
 <br>
      
<?php 
require_once('librerias/pie.php');
 ?>