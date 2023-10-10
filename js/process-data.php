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

$encontro = 0;

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

        if( strlen($ipd) <= 2 ){ echo  'ingrese el código del producto ( 0-9, A-Z ,- ).'; $encontro = 1; }
        elseif( strlen($ipd) > 15 ){ echo  'cantidad de caracteres no permitido.'; $encontro = 1; }
        else{
            if(alfanumber_code($ipd) == '_INCORRECTO_'){ echo  'prohibido caracteres extraños.'; $encontro = 1; }
        }   

        if($encontro == 0){
    	    
    	      $data = $conectdata->get_data_producto_code($ipd);
    	      if($data==false){
                 echo 'El producto no existe';
    	      }else{

                 $mar = $conectdata->get_data_marca($data['marcas']);

      	      	 $nombre = utf8_decode($data['nombre']);
                 $codigo = utf8_decode($data['codigo']);
      	      	 $resumen = utf8_decode($data['resumen']);
      	      	 $categorias = utf8_decode($data['categorias']);	  
      	      	 $imagen = utf8_decode($data['imagen1']);
      	      	 
                 $_SESSION['ItemCotizacion'][$codigo]['nombre'] = $nombre;
                 $_SESSION['ItemCotizacion'][$codigo]['marca'] = mb_strtoupper($mar['nombre']);      
            		 $_SESSION['ItemCotizacion'][$codigo]['resumen'] = $resumen;
            		 $_SESSION['ItemCotizacion'][$codigo]['categorias'] = $categorias;
                 $_SESSION['ItemCotizacion'][$codigo]['serie'] = '-------';     
                 $_SESSION['ItemCotizacion'][$codigo]['cantidad'] = 1;
                 $_SESSION['ItemCotizacion'][$codigo]['imagen'] = $imagen;
                 $_SESSION['ItemCotizacion'][$codigo]['tipo'] = 'PRODUCTO-PSS';

                 echo 'Su producto fue agregado a su lista';          		
    	      } 

    	}else{
         echo 'problema';
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