<?php 

require_once('librerias/cabe.php');
require_once('librerias/conexionBD.php');


$sql = 
"SELECT r.*, concat(u.ap_paterno,' ',u.ap_materno,' ',u.nombre) as nom_usuario, concat(c.nombre,' Par. ',c.paralelo, ' - TAREA: ', t.titulo) as nom_tarea FROM tarea t, curso c, respuesta r, usuario u where t.id_curso=c.id AND r.id_tarea=t.id AND r.id_usuario=u.id";


$result =  $conn->query($sql);
$noticias = array();
	while ($fila =  $result->fetch_array()) 
	{
		$noticias[] = $fila;
	}

?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Respuesta</h1>   
                <p>
                    <a href="respuesta-edit.php" class="btn btn-success">Nuevo</a>
                </p>     
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>fecha</th>                 
                        <th>Arch. Estudiante</th>
                        <th>Observacion</th>
                        <th>Calificacion</th>
                        <th>Tarea</th>
                        <th>Usuario</th>
                        
                      <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($noticias as $item): ?>
                    <tr>
                        <td><?= $item['id']?></td>
                        <td><?= $item['fecha']?></td>
                        <td><a href="<?=$item['archivo_estudiante']?>" target="_blank">  <img src="img/reporte.png"
       alt="MDN logo" /></a></td>
       					<td><?= $item['observacion']?></td>
                        <td><?= $item['calificacion']?></td>  
       					<td><?= $item['nom_tarea']?></td>
                        <td><?= $item['nom_usuario']?></td>                      
                      <td>
                            <a href="respuesta-edit.php?id=<?=$item['id']?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="respuesta-eliminar.php?id=<?=$item['id']?>" class="btn btn-danger" onclick="return(confirm('Esta Seguro de Eliminar?'))">Eliminar</a>
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
