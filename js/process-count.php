<?php
ob_start();
include '../class/class_process.php';
no_cache();
$conectdata = new Proceso();
$conectdata->start();
$conectdata->start_default();
no_ataques_xss();

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    $ItemCotizacion = !empty($_SESSION['ItemCotizacion']) ? $_SESSION['ItemCotizacion'] : '';

    if (is_array($ItemCotizacion)) {
        echo '<div id="count_prod" class="form-row mb-4">
            <ul class="text-success">
                 <li>( '.count($ItemCotizacion).' ) productos seleccionados.</li>
                 <li>Verifique su <a href="./pedidos.php" class="text-success"><strong>LISTA DE PEDIDOS</strong></a>.</li>
            </ul>                             
         </div>';     
    }else{ 
        echo '<div id="count_prod" class="form-row mb-4">
            <ul class="text-danger">
                 <li>( 0 ) productos seleccionados.</li>
                 <li>Visite nuestra sección de <a href="./productos.php" class="text-danger"><strong>PRODUCTOS</strong></a>.</li>
            </ul>                             
         </div>';
    }     
                         

}
else{
?>
<script src="<?php echo URL_SITE; ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   altop = screen.height;
   anchop = screen.width;
   p1 = "Dimensión de PANTALLA: <strong>alto = "+altop+", ancho = "+anchop+"</strong>";
   $("#dmp").html(p1);
});
</script>
<?php
	echo '<h2>Proceso no Admitido</h2>';
	echo '<img src="../images/user-authentication.png" width="200"/>';
	echo '<p>Sus datos fueron registrados</p>';
    echo '<ul>';
    echo '<li>Su IP es: <strong>'.getIP().'</strong></li>';
    echo '<li>Su NAVEGADOR WEB es: <strong>'.my_browser().'</strong></li>';
    echo '<li>Su SISTEMA OPERATIVO es: <strong>'.my_system_pc().'</strong></li>';  
    echo '<li id="dmp"></li>';
    echo '</ul>';
    exit();
}
?>