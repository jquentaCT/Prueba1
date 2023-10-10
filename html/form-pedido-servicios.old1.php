<?php
$ser1 = empty($_POST['ser1']) ? '' : $_POST['ser1'];
$ser2 = empty($_POST['ser2']) ? '' : $_POST['ser2'];
$ser3 = empty($_POST['ser3']) ? '' : $_POST['ser3'];
$nombreproducto = empty($_POST['nombreproducto']) ? '' : $_POST['nombreproducto'];
$marcaproducto = empty($_POST['marcaproducto']) ? '' : $_POST['marcaproducto'];
$codigoproducto = empty($_POST['codigoproducto']) ? '' : $_POST['codigoproducto'];
$serieproducto = empty($_POST['serieproducto']) ? '' : $_POST['serieproducto'];
$nombreempresa = empty($_POST['nombreempresa']) ? '' : $_POST['nombreempresa']; 
$documentoruc = empty($_POST['documentoruc']) ? '' : $_POST['documentoruc'];
$telefonoempresa = empty($_POST['telefonoempresa']) ? '' : $_POST['telefonoempresa'];
$emailempresa = empty($_POST['emailempresa']) ? '' : $_POST['emailempresa'];
$action = empty($_POST['action']) ? '' : $_POST['action']; 

$ser1 = htmlspecialchars(clear_space(limpiar(not_html_script($ser1))));
$ser2 = htmlspecialchars(clear_space(limpiar(not_html_script($ser2))));
$ser3 = htmlspecialchars(clear_space(limpiar(not_html_script($ser3))));
$nombreproducto = htmlspecialchars(clear_space(limpiar(not_html_script($nombreproducto))));
$marcaproducto = htmlspecialchars(clear_space(limpiar(not_html_script($marcaproducto))));
$codigoproducto = htmlspecialchars(clear_space(limpiar(not_html_script($codigoproducto))));
$serieproducto = htmlspecialchars(clear_space(limpiar(not_html_script($serieproducto))));
$nombreempresa = htmlspecialchars(clear_space(limpiar(not_html_script($nombreempresa))));
$documentoruc = htmlspecialchars(clear_space(limpiar(not_html_script($documentoruc))));
$telefonoempresa = htmlspecialchars(clear_space(limpiar(not_html_script($telefonoempresa))));
$emailempresa = htmlspecialchars(clear_space(limpiar(not_html_script($emailempresa))));
$action = htmlspecialchars(clear_space(limpiar(not_html_script($action))));

$ser1 = sanatize_var($ser1);
$ser2 = sanatize_var($ser2);
$ser3 = sanatize_var($ser3);
$nombreproducto = sanatize_var($nombreproducto);
$marcaproducto = sanatize_var($marcaproducto);
$codigoproducto = sanatize_var($codigoproducto);
$serieproducto = sanatize_var($serieproducto);
$nombreempresa = sanatize_var($nombreempresa);
$documentoruc = sanatize_var($documentoruc);
$telefonoempresa = sanatize_var($telefonoempresa);
$emailempresa = sanatize_var($emailempresa);

$encontro = '0';
?>
<section class="wide-tb-100 bg-light-gray pt-0">
  <div class="container">
    <?php  
      if(!empty($action)){

          if(empty($ser1) && empty($ser2) && empty($ser3)){
             $e1 = '<span class="text-danger">(*) Seleccione al menos uno de nuestros servicios</span>'; $encontro = '1';
          }          

          if( strlen(trim($nombreproducto)) < 4 ){ $e2 = '<span class="text-danger">(*) Ingrese el nombre completo del producto</span>'; $encontro = '1'; }
          else{ if( strange($nombreproducto)=='_INCORRECTO_' ){ $e2 = '<span class="text-danger">(*) Prohibido caracteres extraños</span>'; $encontro = '1'; } }

          if( strlen(trim($marcaproducto)) < 4 ){ $e3 = '<span class="text-danger">(*) Ingrese la marca</span>'; $encontro = '1'; }
          else{ if( strange($marcaproducto)=='_INCORRECTO_' ){ $e3 = '<span class="text-danger">(*) Prohibido caracteres extraños</span>'; $encontro = '1'; } }

          if( strlen($codigoproducto) <= 2 ){ $e4 = '<span class="text-danger">(*) ingrese el código del producto ( 0-9, A-Z ,- ).</span>'; }
          elseif( strlen($codigoproducto) > 15 ){ $e4 = '<span class="text-danger">(*) cantidad de caracteres no permitido.</span>'; }
          else{
              if(alfanumber_code($codigoproducto) == '_INCORRECTO_'){ $e4 = '<span class="text-danger">(*) prohibido caracteres extraños.</span>'; }
          }

          if( strlen(trim($serieproducto)) < 4 ){ $e5 = '<span class="text-danger">(*) Ingrese el nro. de serie</span>'; $encontro = '1'; }
          else{ if( strange($serieproducto)=='_INCORRECTO_' ){ $e5 = '<span class="text-danger">(*) Prohibido caracteres extraños</span>'; $encontro = '1'; } }

          if( strlen(trim($nombreempresa)) < 4 ){ $e6 = '<span class="text-danger">(*) Ingrese el nombre de la empresa</span>'; $encontro = '1'; }
          else{ if( strange($nombreempresa)=='_INCORRECTO_' ){ $e6 = '<span class="text-danger">(*) Prohibido caracteres extraños</span>'; $encontro = '1'; } }

          if( strlen(trim($documentoruc)) ==0 ){ $e7 = '<span class="text-danger">(*) Ingrese su teléfono.</span>'; $encontro = '1'; }
          else{  
              if( strlen($documentoruc) != 11 ){
                  $e7 = '<span class="text-danger">(*) La cantidad de dígitos del RUC es incorrecta.</span>'; $encontro = '1';                     
              }
              else{
                  if(onlynumbers($documentoruc) == '_INCORRECTO_'){
                     $e7 = '<span class="text-danger">(*) Formato incorrecto</span>'; $encontro = '1';
                  }
              }
          }

          if( strlen(trim($telefonoempresa)) ==0 ){ $e8 = '<span class="text-danger">(*) ingrese su teléfono.</span>'; $encontro = '1'; }
          else{  
              if( strlen($telefonoempresa) < 7 or strlen($telefonoempresa) > 9 ){
                  $e8 = '<span class="text-danger">(*) La cantidad de dígitos es incorrecta.</span>'; $encontro = '1';                     
              }
              else{
                  if(onlynumbers($telefonoempresa) == '_INCORRECTO_'){
                     $e8 = '<span class="text-danger">(*) Formato incorrecto</span>'; $encontro = '1';
                  }
              }
          } 

          if( comprobar_email($emailempresa) == 0 ){ $e9 = '<span class="text-danger">(*) Formato incorrecto</span>'; $encontro = '1'; }    


          if($encontro == '0'){ 
             
              $from   = $email;
              $from_name = utf8_decode($nombre);
              $to   = 'abelpilares@cpss.com.pe';
              $to_name = utf8_decode('Professional Service Support');
              $cc = 'angelicapilares@cpss.com.pe';
              $cc_name = utf8_decode('ANGELICA PILARES');

              $subj = utf8_decode('ENVIADO DESDE PEDIDOS DE SERVICIO - CPSS.COM.PE');

              $msg = '<strong>SERVICIO :</strong> '.utf8_decode($data_pais['nombre']).'<br>';
              $msg.= '<strong>NOMBRE y APELLIDO :</strong> '.utf8_decode($nombre).'<br>';
              $msg.= '<strong>TELÉFONO :</strong> '.utf8_decode($telefono).'<br><br>';
              $msg.= utf8_decode(nl2br($consulta)).'<br><br>';
              $msg.= 'Enviado desde CPSS.COM.PE<br>';
              $msg.= '<strong>IP:</strong> '.getIP().'<br>';
              /*$msg.= '<strong>NAVEGADOR WEB:</strong> '.my_browser().'<br>';
              $msg.= '<strong>SISTEMA OPERATIVO:</strong> '.my_system_pc();*/

              $resultado = smtpmailer($from, $from_name, $to, $to_name, $cc, $cc_name, $subj, $msg);
              if($resultado==true){
                  $nombre = '';
                  $email = '';
                  $pais = '0';
                  $telefono = '';
                  $consulta = '';
                  $captcha = '';
                  unset($_SESSION['code_captcha']);
                  $_mensaje_ = '<div class="alert alert-success text-center" style="font-size: 18px;">';
                  $_mensaje_.= 'Su pedido de servicio fue enviado correctamente<br><strong>MUCHAS GRACIAS</strong>';
                  $_mensaje_.= '</div>'; 
                  header("refresh:3; url=./pedidos.php");        
              }else{
                  $_mensaje_ = '<div class="alert alert-danger text-center" style="font-size: 18px;">';
                  $_mensaje_.= 'Hubo un error en el envio<br><strong>INTENTELO MÁS TARDE</strong>';
                  $_mensaje_.= '</div>';
              }

              echo $_mensaje_;

          }
      } 
    ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-8 offset-lg-2 wow fadeInUp" data-wow-duration="0" data-wow-delay="0s">
        <div class="free-quote-form contact-page">
            
            <h1 class="heading-main mb-4">Solicita nuestros servicios</h1>
            <form action="" method="post" id="contactusForm" novalidate="novalidate" class="col rounded-field">
                <div class="form-row mb-4">
                     <div class="col-lg-2">Servicio:</div>
                     <div class="col-lg-10">
                            <input type="checkbox" id="ser1" name="ser1" value="1">
                            <label for="ser1"> Mantenimiento Preventivo</label>
                            &nbsp;&nbsp;
                            <input type="checkbox" id="ser2" name="ser2" value="2">
                            <label for="ser2"> Mantenimiento Correctivo</label>
                            &nbsp;&nbsp;
                            <input type="checkbox" id="ser3" name="ser3" value="3">
                            <label for="ser3"> Calibración</label>
                     </div>
                     <?php echo !empty($e1) ? $e1 : ''; ?>
                </div>
                <div class="form-row mb-4">
                      <div class="col-lg-12">
                          <input type="text" name="nombreproducto" id="nombreproducto" class="form-control" placeholder="Nombre del Producto a realizar" maxlength="80" value="<?php echo $nombreproducto; ?>" required>
                          <?php echo !empty($e2) ? $e2 : ''; ?>
                      </div>                    
                </div>  
                <div class="form-row mb-4">                     
                      <div class="col-lg-6">
                          <input type="text" name="marcaproducto" id="marcaproducto" class="form-control" placeholder="Marca" maxlength="80" required>
                          <?php echo !empty($e3) ? $e3 : ''; ?>
                      </div>
                      <div class="col-lg-6">
                          <input type="text" name="codigoproducto" id="codigoproducto" class="form-control" placeholder="Código / Módelo del Producto" maxlength="15" required>
                          <?php echo !empty($e4) ? $e4 : ''; ?>
                      </div>
                </div>
                <div class="form-row mb-4">                      
                      <div class="col-lg-6">
                          <input type="text" name="serieproducto" id="serieproducto" class="form-control" placeholder="Nro. de serie" maxlength="15" required>
                          <?php echo !empty($e5) ? $e5 : ''; ?>
                      </div>
                      <div class="col-lg-6"></div>                    
                </div>

                <hr>

                <div class="form-row mb-4">
                      <div class="col-lg-6">
                         <input type="text" name="nombreempresa" id="nombreempresa" class="form-control" placeholder="Nombre / Razón Social de la empresa" maxlength="100" value="<?php echo $nombreempresa; ?>" required>
                         <?php echo !empty($e6) ? $e6 : ''; ?>
                      </div>
                      <div class="col-lg-6">
                         <input type="text" name="documentoruc" id="documentoruc" class="form-control" placeholder="Documento de identidad R.U.C." maxlength="11" value="<?php echo $documentoruc; ?>" required>
                         <?php echo !empty($e7) ? $e7 : ''; ?>
                      </div>   
                </div>

                <div class="form-row mb-4">
                      <div class="col-lg-6">
                         <input type="tel" name="telefonoempresa" class="form-control mb-3" placeholder="Teléfono móvil o fijo" maxlength="12" value="<?php echo $telefonoempresa; ?>" required>
                         <?php echo !empty($e8) ? $e8 : ''; ?>
                      </div>
                      <div class="col-lg-6">
                         <input type="email" name="emailempresa" class="form-control" placeholder="Email" maxlength="80" value="<?php echo $emailempresa; ?>" required>
                         <?php echo !empty($e9) ? $e9 : ''; ?>
                      </div>   
                </div>
                

                <div class="form-row text-center">
                    <input type="hidden" name="action" value="send">
                    <button name="contactForm" id="contactForm" type="submit" class="form-btn mx-auto btn-theme bg-blue-light">Solicitar nuestros servicios <i class="icofont-rounded-right"></i></button>
                </div>
            </form>

          </div>
      </div>
    </div>
  </div>
</section>