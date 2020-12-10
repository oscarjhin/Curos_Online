<?php 
require_once('librerias/conexionBD.php');
$sql = "select * from usuario u, rol_usuario r WHERE u.id_rol_u=r.id";
$result =  $conn->query($sql);
$usuarios = array();
while ($fila =  $result->fetch_array()) {
    $usuarios[] = $fila;
}
require_once('librerias/cabe.php');
?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Usuarios</h1>   
                <p>
                    <a href="usuario-edit.php" class="btn btn-success">Nuevo</a>
                </p>     
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Paterno</th>
                        <th>Materno</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol Usuario</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($usuarios as $item): ?>
                    <tr>
                        <td><?= $item['id']?></td>
                        <td><?= $item['usuario']?></td>
                        <td><?= $item['ap_paterno']?></td>
                        <td><?= $item['ap_materno']?></td>
                        <td><?= $item['nombre']?></td>
                        <td><?= $item['correo']?></td>
                        <td><?= $item['descripcion']?></td>
                        <td>
                            <a href="usuario-edit.php?id=<?=$item['id']?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="usuarios-eliminar.php?id=<?=$item['id']?>" class="btn btn-danger" onclick="return(confirm('Esta Seguro de Eliminar?'))">Eliminar</a>
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
