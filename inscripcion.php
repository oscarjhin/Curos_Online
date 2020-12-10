<?php 


require_once('librerias/cabe.php');
require_once('librerias/conexionBD.php');

$sql = "SELECT i.id,i.fecha, concat(u.ap_paterno,' ',u.ap_materno,' ',u.nombre) as nom_usuario, concat(c.nombre,' - ',c.paralelo) as nom_curso, r.descripcion
from usuario u, rol_usuario r, insc_curso i, curso c
where i.id_usuario=u.id AND
      i.id_curso=c.id AND
      i.id_rol_u=r.id
Order By nom_curso, nom_usuario;";
$result =  $conn->query($sql);
$materia = array();
while ($fila =  $result->fetch_array()) {
    $materia[] = $fila;
}

?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Inscripcion Cursos</h1>   
                <p>
                    <a href="inscripcion-edit.php" class="btn btn-success">Nuevo</a>
                </p>     
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Curso</th>
                        <th>Rol</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($materia as $item): ?>
                    <tr>
                        <td><?= $item['id']?></td>
                        <td><?= $item['fecha']?></td>
                        <td><?= $item['nom_usuario']?></td>
                        <td><?= $item['nom_curso']?></td>
                        <td><?= $item['descripcion']?></td>
                        <td>
                            <a href="inscripcion-edit.php?id=<?=$item['id']?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="inscripcion-eliminar.php?id=<?=$item['id']?>" class="btn btn-danger" onclick="return(confirm('Esta Seguro de Eliminar?'))">Eliminar</a>
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
