<?php  
ob_start();
include 'class/class_process.php';
no_cache();
$conectdata = new Proceso();
$conectdata::start();
$conectdata->start_default();
$conectdata->content_security_policy();
no_ataques_xss();
include 'html/variables-form-pedido.php';

$nombre = empty($_POST['nombre']) ? '' : $_POST['nombre'];
$email = empty($_POST['email']) ? '' : $_POST['email'];
$pais = empty($_POST['pais']) ? '' : $_POST['pais'];
$telefono = empty($_POST['telefono']) ? '' : $_POST['telefono'];
$consulta = empty($_POST['consulta']) ? '' : $_POST['consulta'];
$captcha = empty($_POST['captcha']) ? '' : $_POST['captcha'];
$action = empty($_POST['action']) ? '' : $_POST['action'];

$nombre = htmlspecialchars(clear_space(limpiar(not_html_script($nombre))));
$email = mb_strtolower(htmlspecialchars(clear_space(limpiar(not_html_script($email)))));
$pais = htmlspecialchars(clear_space(limpiar(not_html_script($pais))));
$telefono = htmlspecialchars(clear_space(limpiar(not_html_script($telefono))));
$consulta = htmlspecialchars(strip_tags(not_script($consulta)));
$captcha = clear_space(not_html_script(limpiar($captcha)));
$action = htmlspecialchars(clear_space(limpiar(not_html_script($action))));

$nombre = sanatize_var($nombre);
$email = sanatize_var($email);
$pais = sanatize_var($pais);
$telefono = sanatize_var($telefono);
$consulta = sanatize_var($consulta);
$captcha = sanatize_var($captcha);

$encontro = '0';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    
    <title>Contáctenos - Professional Service Support S.A.C. (PSS)</title>    
    <meta name="robots" content="index"/>
    <meta name="author" content="Creatusite.com - Diseño y Programación Web"> 
    <meta name="copyright" content="Professional Service Support S.A.C." />    
    <meta name="description" content="Equipos e instrumentos científicos de laboratorio de alta calidad en Lima - Perú">
    <meta name="keywords" content="laboratorio, alimentos, salud, ingenieria, kessel, equipos, importador, medico, construccion, pesquera, empresa, lima, microscopio, peru, quimica, investigacion, analisis, industria, balanza, analizador, concreto, tamices, determinador, potenciometro, centrifuga, vidrio, estufas, autoclave, liofilizador, cabina, carl zeiss, selecta, anton paar, and, ele, soiltest, humboldt, methrom, awareness, boeco, cruma, eppendordf, meril, mmm, metkon, spex, telstar, tinius olsen, tituladores, prensas">
  
    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="apple-touch-icon" sizes="180x180" href="<?php echo URL_SITE; ?>/images/apple-touch-icon.png">
    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="icon" type="image/png" sizes="32x32" href="<?php echo URL_SITE; ?>/images/favicon-32x32.png">
    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="icon" type="image/png" sizes="16x16" href="<?php echo URL_SITE; ?>/images/favicon-16x16.png">
    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="manifest" href="<?php echo URL_SITE; ?>/images/site.webmanifest">
    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="mask-icon" href="<?php echo URL_SITE; ?>/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" href="<?php echo URL_SITE; ?>/css/base.css" rel="stylesheet">

    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="stylesheet" type="text/css" href="<?php echo URL_SITE; ?>/rev-slider/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="stylesheet" type="text/css" href="<?php echo URL_SITE; ?>/rev-slider/revolution/fonts/font-awesome/css/font-awesome.css">
    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="stylesheet" type="text/css" href="<?php echo URL_SITE; ?>/rev-slider/revolution/css/settings.css">
    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="stylesheet" type="text/css" href="<?php echo URL_SITE; ?>/rev-slider/revolution/css/layers.css">
    <link nonce="<?php echo _SYSTEM_NONCE_; ?>" rel="stylesheet" type="text/css" href="<?php echo URL_SITE; ?>/rev-slider/revolution/css/navigation.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
    <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.character-counter.min.js"></script>	
	</head>
<body>

  <?php include 'html/header-html.php'; ?>

  <!-- Page Breadcrumbs Start -->
  <div class="slider bg-navy-blue bg-scroll pos-rel breadcrumbs-page">
    <div class="container">      
      <div class="breadcrumbs-description">
        <h1>Contáctenos</h1>       
      </div>
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- Google Map Start -->
    <section class="map-bg text-center">
      <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="images/mapa-google.png">
      <!--
      <div id="map-holder" class="pos-rel">
          <div id="map_extended">
              <p>This will be replaced with the Google Map.</p>
          </div>
      </div>
      -->      
    </section>     
    <!-- Google Map Start -->

    <!-- Contact Details Start -->
    <section class="wide-tb-100 pos-rel">
      <div class="container">
        <div class="contact-map-bg option">
          <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="images/map-bg.png" alt="">
        </div>

        <div class="row">
          <div class="col-md-4">
            <h2 class="h2-md mb-4 fw-7 txt-light-blue">Información</h2>
            <!-- Contact Detail Left -->
            <div class="contact-detail-shadow no-shadow mb-5 wow fadeInRight" data-wow-duration="0" data-wow-delay="0s">
              <h4>LIMA - PERÚ</h4>
              <div class="d-flex align-items-start items">
                <i class="icofont-google-map"></i> <span>Av. Angamos Oeste 1569 #202<br>
                Miraflores, Lima<br>
                Lima - Perú</span>
              </div>
              <div class="d-flex align-items-start items">
                <i class="icofont-phone"></i> <span>(+511) 606 6286<br>
                (+511) 6066287</span>
              </div>
              <div class="text-nowrap d-flex align-items-start items">
                  <i class="icofont-email"></i> <a href="mailto:ventas@cpss.com.pe" target="_blank">ventas@cpss.com.pe</a>                  
              </div>
              <div class="text-nowrap d-flex align-items-start items">              
                  <i class="icofont-email"></i> <a href="mailto:servicios@cpss.com.pe" target="_blank">servicios@cpss.com.pe</a>
              </div>
            </div>
            <!-- Contact Detail Left -->

          </div>


          <div class="col-md-8 col-sm-12">
            <h2 class="h2-md mb-4 fw-7 txt-light-blue">Consultas</h2>
            <div class="">
          
              <div class="free-quote-form contact-page-option wow fadeInLeft" data-wow-duration="0" data-wow-delay="0s"> 
                  <?php
                  if(!empty($action)){           

                      if( strlen(trim($nombre)) < 4 ){ $e1 = '<label for="nombre" class="error">(*) Ingrese su nombre completo</label>'; $encontro = '1'; }
                      else{ if( strange($nombre)=='_INCORRECTO_' ){ $e1 = '<label for="nombre" class="error">(*) Prohibido caracteres extraños</label>'; $encontro = '1'; } }

                      if( comprobar_email($email) == 0 ){ $e2 = '<label for="email" class="error">(*) Formato incorrecto</span>'; $encontro = '1'; }           

                      $pais = (int)$pais;
                      if(is_int($pais)){ 
                         if(empty($pais) or $pais=='0'){ $e3 = '<label for="pais" class="error">(*) Seleccione el País a enviar</span>'; $encontro = '1'; }
                      }else{
                         $e3 = '<label for="pais" class="error">(*) Formato incorrecto</span>'; $encontro = '1'; 
                      }                       
                      
                      if( strlen(trim($telefono)) ==0 ){ $e4 = '<label for="telefono" class="error">(*) Ingrese su teléfono.</span>'; $encontro = '1'; }
                      else{  
                          if( strlen($telefono) < 7 or strlen($telefono) > 9 ){
                              $e4 = '<label for="telefono" class="error">(*) La cantidad de dígitos es incorrecta.</span>'; $encontro = '1';                     
                          }
                          else{
                              if(onlynumbers($telefono) == '_INCORRECTO_'){
                                 $e4 = '<label for="telefono" class="error">(*) Formato incorrecto</span>'; $encontro = '1';
                              }
                          }
                      }    

                      if( strlen($consulta) <=5 ){ $e5 = '<label for="consulta" class="error">(*) Ingrese su consulta</span>'; $encontro = 1; }
                      else{
                          if(caracteres_area($consulta) == '_INCORRECTO_'){$e5 = '<label for="consulta" class="error">(*) Prohibido caracteres extraños</span>'; $encontro = 1; }
                      }

                      if( strlen(trim($captcha)) < 4 ){ $e6 = '<label for="captcha" class="error">(*) Ingrese el código</span>'; $encontro = '1'; }
                      else{ if( $captcha!=$_SESSION['code_captcha'] ){ $e6 = '<label for="captcha" class="error">(*) El código es incorrecto</span>'; $encontro = '1'; } }

                      if($encontro == '0'){ 
                          $data_pais = $conectdata->get_data_pais($pais);
                          
                          $from   = $email;
                          $from_name = utf8_decode($nombre);
                      
                          $to   = 'abelpilares@cpss.com.pe';
                          $to_name = utf8_decode('ABEL PILARES');

                          $cc1 = 'ventas@cpss.com.pe';
                          $cc1_name = utf8_decode('Area de ventas - Professional Service Support');

                          $cc2 = 'servicios@cpss.com.pe';
                          $cc2_name = utf8_decode('Area de servicios - Professional Service Support');                        

                          $subj = utf8_decode('Enviado desde contáctenos - CPSS.COM.PE');

                          $msg = '<strong>PAIS :</strong> '.$data_pais['nombre'].'<br>';
                          $msg.= '<strong>NOMBRE y APELLIDO :</strong> '.$nombre.'<br>';
                          $msg.= '<strong>TELF. :</strong> '.$telefono.'<br><br>';
                          $msg.= nl2br($consulta).'<br><br>';
                          $msg.= 'Enviado desde CPSS.COM.PE<br>';
                          $msg.= '<strong>IP:</strong> '.getIP().'<br>';
                          /*$msg.= '<strong>NAVEGADOR WEB:</strong> '.my_browser().'<br>';
                          $msg.= '<strong>SISTEMA OPERATIVO:</strong> '.my_system_pc();*/

                          $msg = utf8_decode($msg);

                          $resultado = smtpmailer($from, $from_name, $to, $to_name, $cc1, $cc1_name, $cc2, $cc2_name, $subj, $msg);
                          if($resultado==true){
                              $nombre = '';
                              $email = '';
                              $pais = '0';
                              $telefono = '';
                              $consulta = '';
                              $captcha = '';
                              unset($_SESSION['code_captcha']);
                              $_mensaje_ = '<div class="alert alert-success text-center" style="font-size: 18px;">';
                              $_mensaje_.= 'Su comentario fue enviado correctamente<br><strong>MUCHAS GRACIAS</strong>';
                              $_mensaje_.= '</div>'; 
                              header("refresh:4; url=./contactenos.php");        
                          }else{
                              $_mensaje_ = '<div class="alert alert-danger text-center" style="font-size: 18px;">';
                              $_mensaje_.= 'Hubo un error en el envio<br><strong>INTENTELO MÁS TARDE</strong>';
                              $_mensaje_.= '</div>';
                          }

                          echo $_mensaje_;

                      }
                  }              
                  ?>                 
                  <form action="contactenos.php" method="post" id="contactoption" novalidate="novalidate" class="rounded-field">
                      <div class="form-row mb-4">
                        <div class="col">
                          <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" maxlength="80" value="<?php echo $nombre; ?>"/>
                          <?php echo !empty($e1) ? $e1 : ''; ?>
                        </div>
                        <div class="col">
                          <input type="text" name="email" class="form-control" placeholder="Email" maxlength="80" value="<?php echo $email; ?>"/>
                          <?php echo !empty($e2) ? $e2 : ''; ?>
                        </div>
                      </div>
                      <div class="form-row mb-4">
                        <div class="col">
                          <select title="Seleccione una de las opciones" required name="pais" id ="pais" class="custom-select" aria-required="true" aria-invalid="false">
                              <option value="0">Seleccione el País a enviar</option>
                              <?php
                                 $conectdata->set_listar('select idp, nombre from '.TABLE_PREFIX._TAB_PAIS_SYS_.' order by nombre asc',$pais);
                              ?>
                          </select>
                          <?php echo !empty($e3) ? $e3 : ''; ?>
                        </div>
                        <div class="col">
                          <input type="tel" name="telefono" class="form-control" placeholder="teléfono/ fijo o móvil" maxlength="9" value="<?php echo $telefono; ?>"/>
                          <?php echo !empty($e4) ? $e4 : ''; ?>
                        </div>
                      </div>
                      <div class="form-row mb-4">
                        <div class="col">
                          <textarea id="consulta" name="consulta" rows="7" class="form-control" placeholder="Consulta" maxlength="800"><?php echo $consulta; ?></textarea>
                          <?php echo !empty($e5) ? $e5 : ''; ?>
                          <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript">
                                $('#consulta').characterCounter({
                                    maxlength: 800,
                                    blockextra: true
                                });
                          </script>
                        </div>
                      </div>
                      <div class="form-row mb-4">
                          <div class="col">
                              <input name="captcha" id="captcha" type="text" class="form-control" placeholder="Código" maxlength="6"/>
                              <?php echo !empty($e6) ? $e6 : ''; ?>
                          </div>
                          <div class="col">
                              <a href="javascript:void(0)" onClick="refreshCaptcha(); return false" title="Refrescar"><img src="images/refresh.png" alt="" class="ma_5_0" /></a>
                              <?php echo '<img nonce="'. _SYSTEM_NONCE_.'" id="code_captcha" src="captcha.php" alt="CAPTCHA" class="ma_5_0" />'; ?>
                          </div>  
                      </div>
                      <div class="form-row text-center">
                          <button name="contactoption" id="contactoption" type="submit" class="form-btn mx-auto btn-theme bg-blue-light">Enviar consulta <i class="icofont-rounded-right"></i></button>
                      </div>
                      <input type="hidden" name="action" value="send">
                  </form>                
              </div>
              
              </div>
          </div>
        </div>
      </div>        
    </section>
    <!-- Contact Details End -->   
  </main>

  <?php include 'html/footer-html.php'; ?>

  <?php include 'html/bottom-html.php'; ?>

  <!-- Main JavaScript -->
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/jquery.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/popper.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/bootstrap.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/bootstrap-dropdownhover.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/fontawesome-all.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/owl.carousel.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/twitter/jquery.tweet.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/jflickrfeed.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/jquery.waypoints.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/jquery.easing.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/jquery.counterup.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/jquery.easypiechart.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/jquery.appear.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/wow.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/jquery.validate.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/code.js"></script>

  <!-- JQuery Map Plugin -->
  <!--
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.gmap.min.js"></script>    
  -->

  <!-- Masonary Plugin -->
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.cubeportfolio.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/masonary-custom.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/site-custom.js"></script>  
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript">
    $(document).ready(function() {
    jQuery("#contactoption").validate({
            meta: "validate",           
            rules: {
                nombre: {
                    required: true,
                },
                email: { 
                    required: true,
                    email: true
                },
                pais: {
                    required: true,
                },
                tipo: {
                    required: true,
                },
                consulta: {
                    required: true,
                    consulta: true
                },
                captcha: {
                    required: true,
                    captcha: true
                }
            },
            messages: {
                nombre: "(*) Ingrese su nombre completo",               
                email: {
                    required: "(*) Ingrese su email",
                    email: "(*) Formato incorrecto"
                },
                pais: "(*) Seleccione el País a enviar",
                tipo: "(*) Seleccione el tipo de envio",
                consulta: "(*) Ingrese su consulta",
                captcha: "(*) Ingrese el código"
            },
        });
     });
  </script>

  </body>
</html>