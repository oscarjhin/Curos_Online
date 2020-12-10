<?php 


require('librerias/cabe.php');
require_once('librerias/conexionBD.php');



$sql = "select * from rol_usuario";
$result =  $conn->query($sql);
$categorias = array();
while ($fila =  $result->fetch_array()) {
    $categorias[] = $fila;
}

?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Rol Usuario</h1>   
                <p>
                    <a href="rol_usuario-edit.php" class="btn btn-success">Nuevo</a>
                </p>     
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($categorias as $item): ?>
                    <tr>
                        <td><?= $item['id']?></td>
                        <td><?= $item['descripcion']?></td>
                        <td>
                            <a href="rol_usuario-edit.php?id=<?=$item['id']?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="rol_usuario-eliminar.php?id=<?=$item['id']?>" class="btn btn-danger" onclick="return(confirm('Esta Seguro de Eliminar?'))">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
      </div>
<?php 
require_once('librerias/pie.php');
 ?>
