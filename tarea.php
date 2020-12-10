<?php 

require_once('librerias/cabe.php');
require_once('librerias/conexionBD.php');


$sql = 
"SELECT t.*, concat(u.ap_paterno,' ',u.ap_materno,' ',u.nombre) as nom_usuario, concat(c.nombre,' - ',c.paralelo) as nom_curso
FROM tarea t, curso c, usuario u
where t.id_usuario=u.id AND
	  t.id_curso=c.id;";


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
                <h1>Tarea</h1>   
                <p>
                    <a href="tarea-edit.php" class="btn btn-success">Nuevo</a>
                </p>     
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>fecha</th>
                      <th>Titulo</th>                 
                        <th>Arch. Docente</th>
                        <th>Curso</th>
                        <th>Usuario</th>
                        
                      <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($noticias as $item): ?>
                    <tr>
                        <td><?= $item['id']?></td>
                        <td><?= $item['fecha']?></td>
                      <td><?= $item['titulo']?></td>
                        <td><a href="<?=$item['archivo_docente']?>" target="_blank">  <img src="img/reporte.png"
       alt="MDN logo" /></a></td> 
       					<td><?= $item['nom_curso']?></td>
                        <td><?= $item['nom_usuario']?></td>                      
                      <td>
                            <a href="tarea-edit.php?id=<?=$item['id']?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="tareas-eliminar.php?id=<?=$item['id']?>" class="btn btn-danger" onclick="return(confirm('Esta Seguro de Eliminar?'))">Eliminar</a>
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
