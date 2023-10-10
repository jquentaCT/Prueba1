<?php
ob_start();
include '../class/class_process.php';
no_cache();
$conectdata = new Proceso();
$conectdata->start();
$conectdata->start_default();
no_ataques_xss();

$ipd = !empty($_POST['ipd']) ? $_POST['ipd'] : '';
$ipd = clear_space(not_html_script(limpiar($ipd)));
$ipd = sanatize_var($ipd);
$ipd = (int)$ipd;

$encontro = 0;

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    if(onlynumbers($ipd)=='_INCORRECTO_'){ echo 'Formato incorrecto del producto'; $encontro = 1; }   

    if($encontro == 0){
	    
	      $data = $conectdata->get_data_producto($ipd);
	      if($data==false){
             echo 'El producto no existe';
	      }else{

	      	 $nombre = utf8_decode($data['nombre']);
           $codigo = utf8_decode($data['codigo']);
	      	 $resumen = utf8_decode($data['resumen']);
	      	 $categorias = utf8_decode($data['categorias']);
	      	 $precio = number_format($data['precio'],2, '.', '');
	      	 $imagen = utf8_decode($data['imagen1']);
	      	 
           $_SESSION['ItemCotizacion'][$ipd]['nombre'] = $nombre;
           $_SESSION['ItemCotizacion'][$ipd]['codigo'] = $codigo;
      		 $_SESSION['ItemCotizacion'][$ipd]['resumen'] = $resumen;
      		 $_SESSION['ItemCotizacion'][$ipd]['categorias'] = $categorias;
           $_SESSION['ItemCotizacion'][$ipd]['precio'] = $precio;
           $_SESSION['ItemCotizacion'][$ipd]['cantidad'] = 1;
           $_SESSION['ItemCotizacion'][$ipd]['imagen'] = $imagen;

           echo 'Su producto fue agregado a su lista';
      		
	      } 

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