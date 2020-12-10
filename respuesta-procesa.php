<?php 
require_once('librerias/conexionBD.php');


$id=$_POST['id'];
$fecha=$_POST['fecha'];

$archivo=$_FILES["archivo_estudiante"]["name"];
$ruta=$_FILES["archivo_estudiante"]["tmp_name"];
$destino="estudiante/".$archivo;

$obs=$_POST['obs'];
$calificacion=$_POST['calificacion'];

$id_tarea=$_POST['id_tarea'];
$id_usuario=$_POST['id_usuario'];


/*
echo "TITULO ".$titulo.'<br>';
echo "RUTA ".$ruta.'<br>';
echo "DESTINO ".$destino.'<br>';
*/
copy($ruta, $destino);



if($id==0)
{
$sql ="INSERT INTO respuesta(fecha, archivo_estudiante, observacion, calificacion, id_tarea, id_usuario) VALUES ('$fecha', '$destino', '$obs', $calificacion, $id_tarea, $id_usuario)";


}

else
{
	
	if($archivo=="")
	{
		$destino=$_POST['archivo_estudiante2'];
		
	}
	else
	{
		unlink($_POST['archivo_estudiante2']);	
	}	
	
$sql ="UPDATE respuesta SET fecha='$fecha', archivo_estudiante='$destino', observacion='$obs', calificacion=$calificacion, id_tarea=$id_tarea, id_usuario=$id_usuario";	
	
}


$result =  $conn->query($sql);	
if (!$result) die('Error al insertar');
header('Location: respuesta.php');
?>

