<?php 
require_once('librerias/cabe.php');
require_once('librerias/conexionBD.php');


$sql = "select u.id, concat(u.ap_paterno,' ',u.ap_materno,' ',u.nombre) as nom_usuario from usuario u";
$result =  $conn->query($sql);
$usuario = array();
while ($fila =  $result->fetch_array()) {
    $usuario[] = $fila;
}


$sql = "select t.id, concat(c.nombre,' Par. ',c.paralelo, ' - TAREA: ', t.titulo) as nom_tarea 
from curso c, tarea t
where c.id=t.id_curso;";
$result =  $conn->query($sql);
$tarea = array();
while ($fila =  $result->fetch_array()) {
    $tarea[] = $fila;
}



$id=0;
$fecha="";
$titulo="";
$archivo_docente="";
$obs="";
$calificacion="";
$id_curso="";
$id_usuario="";



if(isset($_GET['id']))
{
	$sql="select * from respuesta where id=".$_GET['id'];
	$result=$conn->query($sql);
	$fila =$result->fetch_array();
	$id=$fila['id'];
	$fecha=$fila['fecha'];
	$titulo=$fila['titulo'];
	$archivo_estudiante=$fila['archivo_estudiante'];
	$obs=$fila['observacion'];
	$calificacion=$fila['calificacion'];
	$id_tarea=$fila['id_tarea'];
	$id_usuario=$fila['id_usuario'];
	//echo "ARCHIVO ".$archivo."<br>";


	
}
?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?=($id>0) ? 'Editar':'Nueva' ?> Respuesta</h1>        
                <form action="respuesta-procesa.php" enctype="multipart/form-data" method="post">
                 <input type="hidden" name="id" value="<?=$id?>" >
                 

                  <div class="form-group">
                    <label for="">Fecha</label>
                    <input type="date" name="fecha" class="form-control" value="<?=$fecha?>">
                  </div>
                 
                               
                  <div class="form-group">
                    <label for="">Archivo Estudiante</label>
                    <input type="file" name="archivo_estudiante" class="form-control">
                  </div>
                  
                  <div class="form-group">
                    <input type="hidden" name="archivo_estudiante2" value="<?=$archivo_estudiante?>" >
                  </div>
                  
                  <div class="form-group">
                    <label for="">Observacion</label>
                    <input type="text" name="obs" class="form-control" value="<?=$obs?>" placeholder="Ingrese titulo">
                  </div>
                  
                  <div class="form-group">
                    <label for="">Calificacion</label>
                    <input type="text" name="calificacion" class="form-control" value="<?=$calificacion?>" placeholder="Ingrese titulo">
                  </div>
  
                  
                 <div class="form-group">
                    <label for="">Tarea</label>
                    <select name="id_tarea" class="form-control" size="1">
                      <option value="">-- Seleccione --</option>
                      <?php foreach ($tarea as $item): 
                      	if($item['id']==$id_tarea)
                        {
						?>
                        <option value="<?= $item['id'] ?>" selected><?= $item['nom_tarea'] ?> </option>
                       <?php 
						}
						else
						{	   
					   ?> 
                       <option value="<?= $item['id'] ?>"><?= $item['nom_tarea'] ?></option>
                       
                      <?php 
						}
					  
					  endforeach ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="">Usuario</label>
                    <select name="id_usuario" class="form-control" size="1">
                      <option value="">-- Seleccione --</option>
                      <?php foreach ($usuario as $item): 
                      	if($item['id']==$id_usuario)
                        {
						?>
                        <option value="<?= $item['id'] ?>" selected><?= $item['nom_usuario'] ?> </option>
                       <?php 
						}
						else
						{	   
					   ?> 
                       <option value="<?= $item['id'] ?>"><?= $item['nom_usuario'] ?></option>
                       
                      <?php 
						}
					  
					  endforeach ?>
                    </select>
                  </div>
                  
                  

                  <button type="submit" class="btn btn-primary">Enviar</button>
                  <a href="tarea.php" class="btn btn-danger">Cancelar</a>
                </form>                
            </div>
        </div>
      </div>
<?php 
require_once('librerias/pie.php');
 ?>