<?php 
require_once('librerias/cabe.php');
require_once('librerias/conexionBD.php');


$sql = "select u.id, concat(u.ap_paterno,' ',u.ap_materno,' ',u.nombre) as nom_usuario from usuario u";
$result =  $conn->query($sql);
$usuario = array();
while ($fila =  $result->fetch_array()) {
    $usuario[] = $fila;
}


$sql = "select c.id, concat(c.nombre,' - ',c.paralelo) as nom_curso from curso c";
$result =  $conn->query($sql);
$curso = array();
while ($fila =  $result->fetch_array()) {
    $curso[] = $fila;
}


$sql = "select * from rol_usuario where id!=1";
$result =  $conn->query($sql);
$rol_usuario = array();
while ($fila =  $result->fetch_array()) {
    $rol_usuario[] = $fila;
}


$id=0;
$fecha="";
$id_usuario="";
$id_curso="";
$id_rol_u="";

echo $_GET['id']."<br>";
if(isset($_GET['id']))
{
	$sql="select * from insc_curso where id=".$_GET['id'];
	$result=$conn->query($sql);
	$fila =$result->fetch_array();
	$id=$fila['id'];
	$fecha=$fila['fecha'];
	$id_usuario=$fila['id_usuario'];
	$id_curso=$fila['id_curso'];
	$id_rol_u=$fila['id_rol_u'];
	
	
}
?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?=($id>0) ? 'Editar':'Nuevo' ?> Inscripcion</h1>        
                <form action="inscripcion-procesa.php" method="post">
                 <input type="hidden" name="id" value="<?=$id?>" >
             
                  <div class="form-group">
                    <label for="">Fecha</label>
                    <input type="date" name="fecha" class="form-control" value="<?=$fecha?>">
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
                  
                  
                 <div class="form-group">
                    <label for="">Curso</label>
                    <select name="id_curso" class="form-control" size="1">
                      <option value="">-- Seleccione --</option>
                      <?php foreach ($curso as $item): 
                      	if($item['id']==$id_curso)
                        {
						?>
                        <option value="<?= $item['id'] ?>" selected><?= $item['nom_curso'] ?> </option>
                       <?php 
						}
						else
						{	   
					   ?> 
                       <option value="<?= $item['id'] ?>"><?= $item['nom_curso'] ?></option>
                       
                      <?php 
						}
					  
					  endforeach ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Rol Usuario</label>
                    <select name="id_rol_u" class="form-control">
                      <option value="">-- Seleccione --</option>
                      <?php foreach ($rol_usuario as $item): 
                      	if($item['id']==$id_rol_u)
                        {
						?>
                        <option value="<?= $item['id'] ?>" selected><?= $item['descripcion'] ?> </option>
                       <?php 
						}
						else
						{	   
					   ?> 
                       <option value="<?= $item['id'] ?>"><?= $item['descripcion'] ?></option>
                       
                      <?php 
						}
					  
					  endforeach ?>
                    </select>
                  </div>
                                
                  
                  <button type="submit" class="btn btn-primary">Enviar</button>
                  <a href="inscripcion.php" class="btn btn-danger">Cancelar</a>
                </form>                
            </div>
        </div>
      </div>
<?php 
require_once('librerias/pie.php');
 ?>