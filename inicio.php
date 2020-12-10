<?php 
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] != "OK") {
    header('location: index.php');
}
require_once('librerias/cabe.php');
?>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Contenido</h1>        
            </div>
        </div>
      </div>
<?php 
require_once('librerias/pie.php');
 ?>
