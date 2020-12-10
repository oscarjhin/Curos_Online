<?php 
require_once('librerias/cabe.php');
require_once('librerias/conexionBD.php');

$sql = "select * from rol_usuario";
$result =  $conn->query($sql);
$rol_usuario = array();
while ($fila =  $result->fetch_array()) {
    $rol_usuario[] = $fila;
}


$id=0;
$usuario="";
$password="";
$password2="";
$paterno="";
$materno="";
$nombre="";
$correo="";
$id_rol_u="";



//echo $_GET['id'];
if(isset($_GET['id']))
{
	$sql="select * from usuario where id=".$_GET['id'];
	$result=$conn->query($sql);
	$fila =$result->fetch_array();
	$id=$fila['id'];
	$usuario=$fila['usuario'];
	$password="";
	$password2=$fila['password'];
	$paterno=$fila['ap_paterno'];
	$materno=$fila['ap_materno'];
	$nombre=$fila['nombre'];
	$correo=$fila['correo'];
	$id_rol_u=$fila['id_rol_u'];
	

}
?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?=($id>0) ? 'Editar':'Nuevo' ?> Usuarios</h1>        
                <form action="usuario-procesa.php" method="post">
                 <input type="hidden" name="id" value="<?=$id?>" >
                  <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="text" name="usuario" class="form-control" value="<?=$usuario?>" placeholder="Ingrese Usuario">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Ingrese Password">
                     <input type="hidden" name="password2" value="<?=$password2?>" >
                  </div>
                  <div class="form-group">
                    <label for="">Paterno</label>
                    <input type="text" name="paterno" class="form-control" value="<?=$paterno?>" placeholder="Ingrese Apellido Paterno">
                  </div>
                  <div class="form-group">
                    <label for="">Materno</label>
                    <input type="text" name="materno" class="form-control" value="<?=$materno?>" placeholder="Ingrese Apelllido Materno">
                  </div>
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?=$nombre?>" placeholder="Ingrese Nombre">
                  </div>
                  <div class="form-group">
                    <label for="">Correo</label>
                    <input type="text" name="correo" class="form-control" value="<?=$correo?>" placeholder="Ingrese su Correo Electronico">
                  </div>
                  
                  <div class="form-group">
                    <label for="">Rol Usuario</label>
                    <select name="rol_usuario" class="form-control">
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
                  <a href="usuario.php" class="btn btn-danger">Cancelar</a>
                </form>                
            </div>
        </div>
      </div>
<?php 
require_once('librerias/pie.php');
 ?>