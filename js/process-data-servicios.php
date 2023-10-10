<?php
ob_start();
include '../class/class_process.php';
no_cache();
$conectdata = new Proceso();
$conectdata->start();
$conectdata->start_default();
no_ataques_xss();

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        
        $ser1 = !empty($_POST['ser1']) ? $_POST['ser1'] : '';
        $ser2 = !empty($_POST['ser2']) ? $_POST['ser2'] : '';
        $ser3 = !empty($_POST['ser3']) ? $_POST['ser3'] : '';
        $nombreproducto = !empty($_POST['nombreproducto']) ? $_POST['nombreproducto'] : '';
        $marcaproducto = !empty($_POST['marcaproducto']) ? $_POST['marcaproducto'] : '';
        $codigoproducto = !empty($_POST['codigoproducto']) ? $_POST['codigoproducto'] : '';
        $serieproducto = !empty($_POST['serieproducto']) ? $_POST['serieproducto'] : '';
        $observacionesproducto = !empty($_POST['observacionesproducto']) ? $_POST['observacionesproducto'] : '';
        
        $ser1 = clear_space(not_html_script(limpiar($ser1)));
        $ser2 = clear_space(not_html_script(limpiar($ser2)));
        $ser3 = clear_space(not_html_script(limpiar($ser3)));
        $nombreproducto = clear_space(not_html_script(limpiar($nombreproducto)));
        $marcaproducto = clear_space(not_html_script(limpiar($marcaproducto)));
        $codigoproducto = clear_space(not_html_script(limpiar($codigoproducto)));
        $serieproducto = clear_space(not_html_script(limpiar($serieproducto)));
        $observacionesproducto = not_script(limpiar($observacionesproducto));
        
        $ser1 = sanatize_var($ser1);
        $ser2 = sanatize_var($ser2);
        $ser3 = sanatize_var($ser3);
        $nombreproducto = sanatize_var($nombreproducto);
        $marcaproducto = sanatize_var($marcaproducto);
        $codigoproducto = sanatize_var($codigoproducto);
        $serieproducto = sanatize_var($serieproducto);
        $observacionesproducto = sanatize_var($observacionesproducto);
            
        $error = array();
        
        if(empty($ser1) && empty($ser2) && empty($ser3)){
             $error[] = '<strong>SERVICIOS:</strong> Seleccione al menos uno de las opciones.'; $encontro = '1';
        } 

        if( strlen($nombreproducto) <= 2 ){ $error[] = '<strong>PRODUCTO:</strong> ingrese el nombre completo.'; }
        elseif( strlen($nombreproducto) > 80 ){ $error[] = '<strong>PRODUCTO:</strong> cantidad de caracteres no permitido.'; }
        else{
            if(caracteres_special($nombreproducto) == '_INCORRECTO_'){ $error[] = '<strong>PRODUCTO:</strong> prohibido caracteres extraños.'; }
        }

        if( strlen($marcaproducto) <= 2 ){ $error[] = '<strong>MARCA:</strong> ingrese el nombre completo.'; }
        elseif( strlen($marcaproducto) > 80 ){ $error[] = '<strong>MARCA:</strong> cantidad de caracteres no permitido.'; }
        else{
            if(caracteres_special($marcaproducto) == '_INCORRECTO_'){ $error[] = '<strong>MARCA:</strong> prohibido caracteres extraños.'; }
        }

        if( strlen($codigoproducto) <= 2 ){ $error[] = '<strong>CÓDIGO:</strong> ingrese el código del producto ( 0-9, A-Z ,- ).'; }
        elseif( strlen($codigoproducto) > 15 ){ $error[] = '<strong>CÓDIGO:</strong> cantidad de caracteres no permitido.'; }
        else{
            if(alfanumber_code($codigoproducto) == '_INCORRECTO_'){ $error[] = '<strong>CÓDIGO:</strong> prohibido caracteres extraños.'; }
        }

        if( strlen($serieproducto) == 0 ){ $error[] = '<strong>SERIE:</strong> ingrese la serie del producto.'; }
        elseif( strlen($serieproducto) > 15 ){ $error[] = '<strong>SERIE:</strong> cantidad de caracteres no permitido.'; }
        else{
            if(caracteres_special($serieproducto) == '_INCORRECTO_'){ $error[] = '<strong>SERIE:</strong> formato incorrecto.'; }
        } 

        if( strlen($observacionesproducto) > 0 ){ 
            if( strlen($observacionesproducto) > 700 ){ $error[] = '<strong>OBSERVACIONES:</strong> cantidad de caracteres no permitido.'; }
            else{
                if(caracteres_area($observacionesproducto) == '_INCORRECTO_'){ $error[] = '<strong>OBSERVACIONES:</strong> formato incorrecto.'; }
            }
        }           

        if( count($error)==0 ){

        	 $nombre = utf8_decode($nombreproducto);        
        	 $resumen = '';
        	 $categorias = '';
        	 $imagen = 'envio-servicios.png';
           $cantidad = 1;
           $codigoproducto = mb_strtoupper($codigoproducto);
           $serieproducto = utf8_decode($serieproducto);

           $tipo_servicio = '';
           if($ser1=='1'){ $tipo_servicio.= 'Mantenimiento Preventivo / '; }
           if($ser2=='1'){ $tipo_servicio.= 'Mantenimiento Correctivo / '; }
           if($ser3=='1'){ $tipo_servicio.= 'Calibración / '; }

           $servicios = 'SERVICIOS >> '.$tipo_servicio;
           $servicios = trim($servicios);
           $servicios = substr($servicios, 0, -1);
           $servicios = utf8_decode($servicios);
           $observacionesproducto = utf8_decode($observacionesproducto);

           $_SESSION['ItemCotizacion'][$codigoproducto]['nombre'] = $nombre;           
           $_SESSION['ItemCotizacion'][$codigoproducto]['marca'] = mb_strtoupper($marcaproducto);
      		 $_SESSION['ItemCotizacion'][$codigoproducto]['resumen'] = $resumen;
      		 $_SESSION['ItemCotizacion'][$codigoproducto]['categorias'] = $categorias;
           $_SESSION['ItemCotizacion'][$codigoproducto]['serie'] = $serieproducto;     
           $_SESSION['ItemCotizacion'][$codigoproducto]['cantidad'] = $cantidad;
           $_SESSION['ItemCotizacion'][$codigoproducto]['imagen'] = $imagen;
           $_SESSION['ItemCotizacion'][$codigoproducto]['tipo'] = $servicios;
           $_SESSION['ItemCotizacion'][$codigoproducto]['observaciones'] = $observacionesproducto;

           echo '<div class="bg-validacion-success"><strong>FELICITACIONES:</strong> SU PRODUCTO FUE AGREGADO A SU LISTA CORRECTAMENTE.<br>VISITE POR FAVOR SU <a href="./pedidos.php" class="text-success"><strong>LISTA DE PEDIDOS</strong></a></div>';

    	}else{
           echo '<div class="bg-validacion-error">';               
           foreach ($error as $value){
              echo $value.'<br>';  
           }
           echo '</div>';
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