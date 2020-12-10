<?php 
require_once('librerias/cabe.php');
require_once('librerias/conexionBD.php');

$id=0;
$sigla="";
$nombre="";
$paralelo="";
$nivel="";

//echo $_GET['id'];
if(isset($_GET['id']))
{
	$sql="select * from curso where id=".$_GET['id'];
	$result=$conn->query($sql);
	$fila =$result->fetch_array();
	$id=$fila['id'];
	$sigla=$fila['sigla'];
	$nombre=$fila['nombre'];
	$paralelo=$fila['paralelo'];
	$nivel=$fila['nivel'];
	
}
?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?=($id>0) ? 'Editar':'Nuevo' ?> Curso</h1>        
                <form action="curso-procesa.php" method="post">
                 <input type="hidden" name="id" value="<?=$id?>" >

                  <div class="form-group">
                    <label for="">Sigla</label>
                    <input type="text" name="sigla" class="form-control" value="<?=$sigla?>" placeholder="Ingrese Sigla">
                  </div>
                  
                  <div class="form-group">                
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?=$nombre?>" placeholder="Ingrese Descripcion">
                  </div>
                  
                  <div class="form-group">                
                    <label for="">Paralelo</label>
                    <input type="text" name="paralelo" class="form-control" value="<?=$paralelo?>" placeholder="Ingrese Nombre">
                  </div>
                  
                  <div class="form-group">
                    <label for="">Nivel</label>
                    <input type="text" name="nivel" class="form-control" value="<?=$nivel?>" placeholder="Ingrese Nivel">
                  </div>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                  <a href="curso.php" class="btn btn-danger">Cancelar</a>
                </form>                
            </div>
        </div>
      </div>
<?php 
require_once('librerias/pie.php');
 ?>