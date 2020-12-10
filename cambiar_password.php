<?php 

require_once('librerias/cabe.php');
require_once('librerias/sesion.php');
require_once('librerias/conexionBD.php');

$id=$_SESSION['id_sesion'];

echo "ID USUARIO: ".$id."<br>";
?>

      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Cambiar Contraseña</h1>        
                <form action="cambiar_password-procesa.php" method="post">
                 <input type="hidden" name="id" value="<?=$id?>" >

                  <div class="form-group">
                    <label for="">Nuevo Contraseña</label>
                    <input type="password" name="password1" class="form-control" value="" placeholder="Ingrese Password">
                  </div>
                  
                  <div class="form-group">
                    <label for="">Repita Contraseña</label>
                    <input type="password" name="password2" class="form-control" value="" placeholder="Ingrese Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                  <a href="index.php" class="btn btn-danger">Cancelar</a>
                </form>                
            </div>
        </div>
      </div>
<?php 
require_once('librerias/pie.php');
 ?>