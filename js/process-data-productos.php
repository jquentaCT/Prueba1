<?php
ob_start();
include '../class/class_process.php';
no_cache();
$conectdata = new Proceso();
$conectdata->start();
$conectdata->start_default();
no_ataques_xss();

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
        $nombreproducto = !empty($_POST['nombreproducto']) ? $_POST['nombreproducto'] : '';
        $marcaproducto = !empty($_POST['marcaproducto']) ? $_POST['marcaproducto'] : '';
        $codigoproducto = !empty($_POST['codigoproducto']) ? $_POST['codigoproducto'] : '';
        $cantidadproducto = !empty($_POST['cantidadproducto']) ? $_POST['cantidadproducto'] : '';
        $tipo_producto = !empty($_POST['tipo_producto']) ? $_POST['tipo_producto'] : '';

        $nombreproducto = clear_space(not_html_script(limpiar($nombreproducto)));
        $marcaproducto = clear_space(not_html_script(limpiar($marcaproducto)));
        $codigoproducto = clear_space(not_html_script(limpiar($codigoproducto)));
        $cantidadproducto = clear_space(not_html_script(limpiar($cantidadproducto)));
        $tipo_producto = clear_space(not_html_script(limpiar($tipo_producto)));

        $nombreproducto = sanatize_var($nombreproducto);
        $marcaproducto = sanatize_var($marcaproducto);
        $codigoproducto = sanatize_var($codigoproducto);
        $cantidadproducto = sanatize_var($cantidadproducto);
        $tipo_producto = sanatize_var($tipo_producto);
       
        $error = array();
        
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

        if( strlen($cantidadproducto) == 0 ){ $error[] = '<strong>CANTIDAD:</strong> ingrese la cantidad.'; }
        elseif( strlen($cantidadproducto) > 15 ){ $error[] = '<strong>CANTIDAD:</strong> cantidad de caracteres no permitido.'; }
        else{
            if(onlynumbers($cantidadproducto) == '_INCORRECTO_'){ $error[] = '<strong>CANTIDAD:</strong> formato incorrecto.'; }
        }

        if( strlen($tipo_producto) < 0 ){ $error[] = '<strong>TIPO DE PRODUCTO:</strong> no fue detectado.'; }
        else{
            if(onlynumbers($tipo_producto) == '_INCORRECTO_'){ $error[] = '<strong>TIPO DE PRODUCTO:</strong> formato inconrrecto.'; }
            else{
                if($tipo_producto!=1 && $tipo_producto!=2){ $error[] = '<strong>TIPO DE PRODUCTO:</strong> valor no reconocido.'; }
            }
        }    

        if( count($error)==0 ){

           if($tipo_producto=='1'){ $ti = 'EQUIPOS-INGENIERIA'; }
           elseif($tipo_producto=='2'){ $ti = 'EQUIPOS-MEDICOS'; }  

        	 $nombre = utf8_decode($nombreproducto);
           $marcaproducto = mb_strtoupper(utf8_decode($marcaproducto));        
        	 $resumen = '';
        	 $categorias = '';
        	 $imagen = 'envio-pedidos.png';
           $cantidad = $cantidadproducto;
           $codigoproducto = mb_strtoupper($codigoproducto);
        	 
           $_SESSION['ItemCotizacion'][$codigoproducto]['nombre'] = $nombre;           
           $_SESSION['ItemCotizacion'][$codigoproducto]['marca'] = $marcaproducto;
      		 $_SESSION['ItemCotizacion'][$codigoproducto]['resumen'] = $resumen;
      		 $_SESSION['ItemCotizacion'][$codigoproducto]['categorias'] = $categorias;
           $_SESSION['ItemCotizacion'][$codigoproducto]['serie'] = '-------';     
           $_SESSION['ItemCotizacion'][$codigoproducto]['cantidad'] = $cantidad;
           $_SESSION['ItemCotizacion'][$codigoproducto]['imagen'] = $imagen;
           $_SESSION['ItemCotizacion'][$codigoproducto]['tipo'] = $ti;

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