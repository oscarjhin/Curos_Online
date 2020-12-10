<?php 
require_once('librerias/conexionBD.php');


$id=$_POST['id'];
$fecha=$_POST['fecha'];
$titulo=$_POST['titulo'];

$archivo=$_FILES["archivo_docente"]["name"];
$ruta=$_FILES["archivo_docente"]["tmp_name"];
$destino="profesor/".$archivo;

$id_curso=$_POST['id_curso'];
$id_usuario=$_POST['id_usuario'];


/*
echo "TITULO ".$titulo.'<br>';
echo "RUTA ".$ruta.'<br>';
echo "DESTINO ".$destino.'<br>';
*/
copy($ruta, $destino);



if($id==0)
{
$sql ="INSERT INTO tarea(fecha, titulo, archivo_docente, id_curso, id_usuario) VALUES ('$fecha', '$titulo', '$destino', $id_curso, $id_usuario)";


}

else
{
	
	if($archivo=="")
	{
		$destino=$_POST['archivo_docente2'];
		
	}
	else
	{
		unlink($_POST['archivo_docente2']);	
	}	
	
$sql ="UPDATE tarea SET fecha='$fecha', titulo='$titulo', archivo_docente='$destino', id_curso=$id_curso, id_usuario=$id_usuario where id=$id";	
	
}


$result =  $conn->query($sql);	
if (!$result) die('Error al insertar');
header('Location: tarea.php');
?>

