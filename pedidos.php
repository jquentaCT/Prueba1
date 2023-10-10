<?php  
ob_start();
include 'class/class_process.php';
no_cache();
$conectdata = new Proceso();
$conectdata->start();
$conectdata->start_default();
$conectdata->content_security_policy();
no_ataques_xss();
include 'html/variables-form-pedido.php';
//unset($_SESSION['ItemCotizacion']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    
    <title>Pedidos - Professional Service Support S.A.C. (PSS)</title>    
    <meta name="robots" content="index"/>
    <meta name="author" content="Creatusite.com - Diseño y Programación Web"> 
    <meta name="copyright" content="Professional Service Support S.A.C." />    
    <meta name="description" content="Equipos e instrumentos científicos de laboratorio de alta calidad en Lima - Perú">
    <meta name="keywords" content="laboratorio, alimentos, salud, ingenieria, kessel, equipos, importador, medico, construccion, pesquera, empresa, lima, microscopio, peru, quimica, investigacion, analisis, industria, balanza, analizador, concreto, tamices, determinador, potenciometro, centrifuga, vidrio, estufas, autoclave, liofilizador, cabina, carl zeiss, selecta, anton paar, and, ele, soiltest, humboldt, methrom, awareness, boeco, cruma, eppendordf, meril, mmm, metkon, spex, telstar, tinius olsen, tituladores, prensas">
    <base nonce="<?php echo _SYSTEM_NONCE_; ?>" href="<?php echo URL_SITE; ?>/" />
    
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
	</head>
<body>

  <?php include 'html/header-html.php'; ?>

  <!-- Page Breadcrumbs Start -->
  <div class="slider bg-navy-blue bg-scroll pos-rel breadcrumbs-page">
    <div class="container">      
      <div class="breadcrumbs-description">
        <h1>Lista de Pedidos</h1>        
      </div>
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- What We Offer Start -->
    <section class="wide-tb-80">|
      <div class="container pos-rel">
        <div class="row align-items-start">

          <div class="col-md-12 col-lg-8">            
            <div class="row">
              <!-- Blog Items -->
              <div class="col-md-12">

                  <?php  
                    if(!empty($actionpedido)){
                          
                          $ItemCotizacion = !empty($_SESSION['ItemCotizacion']) ? $_SESSION['ItemCotizacion'] : '';

                          if(!is_array($ItemCotizacion)){ $encontro = '1'; }

                          $paispedido = (int)$paispedido;
                          if(is_int($paispedido)){ 
                             if(empty($paispedido) or $paispedido=='0'){ $e1 = '<span class="text-danger">Seleccione el País a enviar</span>'; $encontro = '1'; }
                          }else{ $e1 = '<span class="text-danger">Formato incorrecto</span>'; $encontro = '1'; }

                          if( strlen(trim($ciudadpedido)) < 4 ){ $e2 = '<span class="text-danger">Ingrese la ciudad</label>'; $encontro = '1'; }
                          else{ if( strange($ciudadpedido)=='_INCORRECTO_' ){ $e2 = '<span class="text-danger">Prohibido caracteres extraños</label>'; $encontro = '1'; } }

                          $enviopedido = (int)$enviopedido;
                          if(is_int($enviopedido)){ 
                             if(empty($enviopedido) or $enviopedido=='0'){ $e3 = '<span class="text-danger">Seleccione a que personal enviar</span>'; $encontro = '1'; }                            
                          }else{ $e3 = '<span class="text-danger">Formato incorrecto</span>'; $encontro = '1'; }
                          
                          if( strlen(trim($nombre_empresa)) < 4 ){ $e4 = '<span class="text-danger">Ingrese el nombre completo</label>'; $encontro = '1'; }
                          elseif( strlen(trim($nombre_empresa)) > 100 ){ $e4 = '<span class="text-danger">Los caracteres exceden a 100</label>'; $encontro = '1'; }
                          else{ if( strange($nombre_empresa)=='_INCORRECTO_' ){ $e4 = '<span class="text-danger">Prohibido caracteres extraños</label>'; $encontro = '1'; } }

                          if( strlen(trim($direccion_registro)) < 4 ){ $e5 = '<span class="text-danger">Ingrese la dirección completa</label>'; $encontro = '1'; }
                          elseif( strlen(trim($direccion_registro)) > 100 ){ $e5 = '<span class="text-danger">Los caracteres exceden a 100</label>'; $encontro = '1'; }
                          else{ if( strange($direccion_registro)=='_INCORRECTO_' ){ $e5 = '<span class="text-danger">Prohibido caracteres extraños</label>'; $encontro = '1'; } }
                          
                          if( strlen(trim($cargo_empresa)) < 4 ){ $e6 = '<span class="text-danger">Ingrese su cargo en la empresa</label>'; $encontro = '1'; }
                          elseif( strlen(trim($cargo_empresa)) > 50 ){ $e6 = '<span class="text-danger">Los caracteres exceden a 50</label>'; $encontro = '1'; }
                          else{ if( strange($cargo_empresa)=='_INCORRECTO_' ){ $e6 = '<span class="text-danger">Prohibido caracteres extraños</label>'; $encontro = '1'; } }

                          if( strlen($documento_ruc) == 0 ){ $e7 = '<span class="text-danger">Ingrese su Nro de R.U.C.</span>'; $encontro = 1; }
                          else{
                              if( strlen($documento_ruc) != 11 ){ $e7 = '<span class="text-danger">Los dígitos deben ser de 11 caracteres.</span>'; $encontro = 1; }
                              else{  
                                 if(onlynumbers($documento_ruc) == '_INCORRECTO_'){ $e7 = '<span class="text-danger">Formato incorrecto.</span>'; $encontro = 1; }
                              }
                          }

                          if( strlen(trim($nombre_contacto)) < 4 ){ $e8 = '<span class="text-danger">Ingrese el nombre de contacto</label>'; $encontro = '1'; }
                          elseif( strlen(trim($nombre_contacto)) > 80 ){ $e8 = '<span class="text-danger">Los caracteres exceden a 80</label>'; $encontro = '1'; }
                          else{ if( strange($nombre_contacto)=='_INCORRECTO_' ){ $e8 = '<span class="text-danger">Prohibido caracteres extraños</label>'; $encontro = '1'; } }
                                   

                          if(onlynumbers($telefono_pedido) == '_INCORRECTO_'){ $e9 = '<span class="text-danger">El formato es incorrecto</span>'; $encontro = 1; }
                          else{
                             if( strlen(trim($telefono_pedido)) < 5 or strlen(trim($telefono_pedido)) > 12 ){ $e9 = '<span class="text-danger">Cantidad de dígitos es incorrecto</span>'; $encontro = 1; } 
                          }

                          if( comprobar_email($email_pedido) == 0 ){ $e10 = '<span class="text-danger">Formato incorrecto</span>'; $encontro = '1'; } 


                          if($encontro == '0'){ 
                              $data_pais = $conectdata->get_data_pais($paispedido);
                              $data_dirigido = $conectdata->get_data_trabajadores($enviopedido);
                              
                              $from   = $email_pedido;
                              $from_name = utf8_decode($nombre_contacto);
                     
                              $to   = 'abelpilares@cpss.com.pe';
                              $to_name = utf8_decode('ABEL PILARES');

                              $cc1 = 'ventas@cpss.com.pe';
                              $cc1_name = utf8_decode('AREA DE VENTAS - Professional Service Support');

                              $cc2 = 'servicios@cpss.com.pe';
                              $cc2_name = utf8_decode('AREA DE SERVICIOS - Professional Service Support');

                              $subj = utf8_decode('Lista de pedidos online - CPSS.COM.PE');                                                    
                              
                              $msg = '<strong>PAIS :</strong> '.utf8_decode($data_pais['nombre']).'<br>';
                              $msg.= '<strong>CIUDAD :</strong> '.utf8_decode($ciudadpedido).'<br>';
                              $msg.= '<strong>DIRIGIDO A :</strong> '.utf8_decode($data_dirigido['cargo']).' // '.utf8_decode($data_dirigido['nombre']).' '.utf8_decode($data_dirigido['apellidos']).'<br>';
                              $msg.= '<strong>NOMBRE DE LA EMPRESA :</strong> '.utf8_decode(mb_strtoupper($nombre_empresa)).'<br>';
                              $msg.= '<strong>R.U.C. DE LA EMPRESA :</strong> '.utf8_decode(mb_strtoupper($documento_ruc)).'<br>';
                              $msg.= '<strong>NOMBRE DEL CONTACTO :</strong> '.utf8_decode(mb_strtoupper($nombre_contacto)).'<br>';
                              $msg.= '<strong>CARGO EN LA EMPRESA :</strong> '.utf8_decode(mb_strtoupper($cargo_empresa)).'<br>';
                              $msg.= '<strong>TELEFONO DE CONTACTO :</strong> '.utf8_decode($telefono_pedido).'<br>';
                              $msg.= '<strong>EMAIL DE CONTACTO :</strong> '.utf8_decode($email_pedido).'<br><br>';                              

                              $msg.= '<table border="1" width="100%" cellpadding="3">
                              <tbody>
                                <tr>
                                  <th align="center" valign="middle" bgcolor="#209ab7">Item</th>
                                  <th align="center" valign="middle" bgcolor="#209ab7">Codigo</th>
                                  <th align="center" valign="middle" bgcolor="#209ab7">Producto</th>
                                  <th align="center" valign="middle" bgcolor="#209ab7">Marca</th>
                                  <th align="center" valign="middle" bgcolor="#209ab7">Serie</th>
                                  <th align="center" valign="middle" bgcolor="#209ab7">Cantidad</th>
                                  <th align="center" valign="middle" bgcolor="#209ab7">Tipo de Producto</th>
                                  <th align="center" valign="middle" bgcolor="#209ab7">Observaciones</th>                                  
                                </tr>';
                              
                              $item = 1;
                             
                              foreach ($ItemCotizacion as $k  => $v){
                                 $msg.= '<tr>
                                      <td><strong>'.$item.'</strong></td>
                                      <td align="center" valign="middle"><strong>'.mb_strtoupper($k).'</strong></td>
                                      <td>'.$ItemCotizacion[$k]['nombre'].'</td>
                                      <td align="center" valign="middle">'.$ItemCotizacion[$k]['marca'].'</td>
                                      <td align="center" valign="middle">'.$ItemCotizacion[$k]['serie'].'</td>
                                      <td align="center" valign="middle">'.$ItemCotizacion[$k]['cantidad'].'</td>
                                      <td align="center" valign="middle">'.str_replace('-',' ',$ItemCotizacion[$k]['tipo']).'</td>
                                      <td>'.nl2br($ItemCotizacion[$k]['observaciones']).'</td>                                     
                                    </tr>';
                                    $item++;                                              
                              }

                              $msg.= '<tr>
                                    <td colspan="8" align="right" bgcolor="#209ab7"><strong>POSTERIORMENTE TENDRA QUE ESTAR ATENTO A SU BUZON DE CORREOS</strong></td>                                   
                                  </tr>
                                </tbody>
                              </table>';
                              
                              $msg.= '<br><br>';                              
                              $msg.= 'Enviado desde CPSS.COM.PE<br>';
                              $msg.= '<strong>SU IP:</strong> '.getIP().'<br>';
                              /*$msg.= '<strong>NAVEGADOR WEB:</strong> '.my_browser().'<br>';
                              $msg.= '<strong>SISTEMA OPERATIVO:</strong> '.my_system_pc();*/

                              $resultado = smtpmailer($from, $from_name, $to, $to_name, $cc1, $cc1_name, $cc2, $cc2_name, $subj, $msg);
                              if($resultado==true){
                                  $paispedido = '0';
                                  $ciudadpedido = '';
                                  $enviopedido = '0';
                                  $nombrepedido = '';
                                  $emailpedido = '';
                                  $telefonopedido = '';
                                  $comentariopedido = '';
                                  unset($_SESSION['ItemCotizacion']);
                                  $_mensaje_ = '<div class="alert alert-success text-center" style="font-size: 18px;">';
                                  $_mensaje_.= 'Su LISTA DE PEDIDOS fue enviado correctamente<br>estará recibiendo nuestra respuesta en breve<br><strong>MUCHAS GRACIAS</strong>';
                                  $_mensaje_.= '</div>'; 
                                  header("refresh:3; url=./");        
                              }else{
                                  $_mensaje_ = '<div class="alert alert-danger text-center" style="font-size: 18px;">';
                                  $_mensaje_.= 'Hubo un error en el envio<br><strong>INTENTELO MÁS TARDE</strong>';
                                  $_mensaje_.= '</div>';
                              }

                              echo $_mensaje_;

                          }
                       
                    }
                  ?>

                  <h2>Mi lista</h2>
                  <div class="text-right">
                     <a class="btn btn-success" id="backLink" href="javascript:void(0)" role="button"><i class="icofont-rounded-left"></i> Regresar a la página anterior</a>
                  </div>
                  <br>
                  <?php  
                    $ItemCotizacion = !empty($_SESSION['ItemCotizacion']) ? $_SESSION['ItemCotizacion'] : '';
                                        
                    if (is_array($ItemCotizacion)) {

                           foreach ($ItemCotizacion as $k  => $v){

                               if(!empty($ItemCotizacion[$k]['imagen'])){
                                  $img_prod = 'images/productos/'.$ItemCotizacion[$k]['imagen'];        
                               }else{ $img_prod = 'images/productos/no-disponible.jpg'; }
                               
                               //$importe = number_format($ItemCotizacion[$k]['precio']*$ItemCotizacion[$k]['cantidad'],2, '.', '');                               
                               $importe = '';

                               echo '<div class="boxpedido" id="bp'.$k.'">
                                      <div class="row">
                                          <div class="col-md-1 text-center">
                                            <a href="javascript:void(0)" rel="'.$k.'" class="btn_delete"></a>
                                          </div>  
                                          <div class="col-md-9">                                        
                                            <img nonce="'._SYSTEM_NONCE_.'" src="'.$img_prod.'" alt=""/>
                                            <strong>'.utf8_encode($ItemCotizacion[$k]['nombre']).'</strong><br>
                                            <strong>CÓDIGO: <span class="text-danger">'.mb_strtoupper($k).'</span></strong><br>
                                            <strong>TIPO: <span class="text-danger">'.str_replace('-',' ',$ItemCotizacion[$k]['tipo']).'</span></strong>
                                            <div class="clear"></div>
                                          </div>                                         
                                          <div class="col-md-2 text-center">
                                            Cantidad
                                            <span class="cant" id="'.$k.'">'.$ItemCotizacion[$k]['cantidad'].'</span>
                                            <a href="javascript:void(0)" rel="'.$k.'" class="btn_mas"></a>
                                            <a href="javascript:void(0)" rel="'.$k.'" class="btn_menos"></a>
                                          </div>                                          
                                      </div>                                      
                                     </div>';
                           }
                       
                    }else{
                        echo '<div class="text-center"><img nonce="'._SYSTEM_NONCE_.'" src="'.URL_SITE.'/images/carrito-vacio.png" alt=""/></div>';
                    }                          
                  ?>
                  
                  <br> 
                  <div class="text-center">
                       <a class="btn-theme icon-left bg-blue-light no-shadow d-none d-lg-inline-block align-self-center" href="#" role="button" data-toggle="modal" data-target="#request_popup"><i class="icofont-page"></i> Segundo paso:&nbsp;&nbsp; ingresar sus datos</a> 
                  </div>

              </div>
              <!-- Blog Items -->              
            </div>

          </div>

          <div class="col-md-12 col-lg-4">        
            <!-- Add Some Left Space -->    
            <aside class="sidebar-spacer row">

              <!-- Sidebar Primary Start -->
              <div class="sidebar-primary col-lg-12 col-md-6">
                <!-- Search Widget Start -->
                <div class="widget-wrap">
                  <h3 class="h3-md fw-7 mb-4">Buscador</h3>
                  <form method="post" action="./productos.php" class="flex-nowrap col ml-auto footer-subscribe p-0">
                    <input name="buscador" type="text" class="form-control" placeholder="Buscar …">
                    <button type="submit" class="btn btn-theme bg-blue-light"><i class="icofont-search p-0"></i></button>
                  </form>
                </div>
                <!-- Search Widget End -->

                <!-- Sidebar Support Widget Start -->
                <div class="widget-wrap text-center bg-sky-blue rounded py-5">
                  <div class="mb-2"><i class="icofont-headphone-alt icofont-4x"></i></div>
                  <h3 class="h3-md fw-5 txt-orange mb-4">Necesitas ayuda?</h3>
                  <p>Llamanos<br> Consultas las 24/7</p>
                  <a href="./contactenos.php" class="btn-theme bg-blue-light mt-3">Contáctanos <i class="icofont-rounded-right"></i></a>
                </div>
                <!-- Sidebar Support Widget End -->                
              </div>
              <!-- Sidebar Primary End -->                        

            </aside>
            <!-- Add Some Left Space -->    
          </div>

        </div>
        
      </div>
    </section>
    <!-- What We Offer End -->    
  </main>  

  <?php include 'html/footer-html.php'; ?>

  <?php include 'html/bottom-html.php'; ?>

  <!-- Main JavaScript -->
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/popper.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/bootstrap.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/bootstrap-dropdownhover.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/fontawesome-all.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/owl.carousel.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/twitter/jquery.tweet.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jflickrfeed.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.waypoints.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.easing.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.counterup.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.easypiechart.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.appear.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/wow.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/code.js"></script>

  <?php if($encontro==1){ ?>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript">
      $('#request_popup').modal('show');
  </script>       
  <?php } ?>

  <!-- JQuery Map Plugin -->
  <!--
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.gmap.min.js"></script>
  -->

  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/site-custom.js"></script>  
  </body>
</html>