<?php 

require_once('librerias/cabe.php');
require_once('librerias/conexionBD.php');

$sql = "select * from curso";
$result =  $conn->query($sql);
$materia = array();
while ($fila =  $result->fetch_array()) {
    $materia[] = $fila;
}

?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Cursos</h1>   
                <p>
                    <a href="curso-edit.php" class="btn btn-success">Nuevo</a>
                </p>     
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Sigla</th>
                        <th>Nombre</th>
                        <th>Paralelo</th>
                        <th>Nivel</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($materia as $item): ?>
                    <tr>
                        <td><?= $item['id']?></td>
                        <td><?= $item['sigla']?></td>
                        <td><?= $item['nombre']?></td>
                        <td><?= $item['paralelo']?></td>
                        <td><?= $item['nivel']?></td>
                        <td>
                            <a href="curso-edit.php?id=<?=$item['id']?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="curso-eliminar.php?id=<?=$item['id']?>" class="btn btn-danger" onclick="return(confirm('Esta Seguro de Eliminar?'))">Eliminar</a>
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
