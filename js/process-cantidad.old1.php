<?php
ob_start();
include '../class/class_process.php';
no_cache();
$conectdata = new Proceso();
$conectdata->start();
$conectdata->start_default();
no_ataques_xss();

$cantidad = !empty($_POST['cantidad']) ? $_POST['cantidad'] : '';
$ope = !empty($_POST['ope']) ? $_POST['ope'] : '';
$id = !empty($_POST['id']) ? $_POST['id'] : '';
$cantidad = clear_space(not_html_script(limpiar($cantidad)));
$ope = clear_space(not_html_script(limpiar($ope)));
$id = clear_space(not_html_script(limpiar($id)));
$cantidad = sanatize_var($cantidad);
$ope = sanatize_var($ope);
$id = sanatize_var($id);
$cantidad = (int)$cantidad;
$ope = (int)$ope;
$id = (int)$id;

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    $ItemCotizacion = !empty($_SESSION['ItemCotizacion']) ? $_SESSION['ItemCotizacion'] : '';
    $_SESSION['ItemCotizacion'][$id]['cantidad'] = $cantidad;
    echo number_format($_SESSION['ItemCotizacion'][$id]['precio']*$_SESSION['ItemCotizacion'][$id]['cantidad'],2, '.', '');

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