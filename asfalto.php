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
$tipo_producto = 1; 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    
    <title>Equipos de Ingenieria / Asfalto / PSS</title>    
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
	</head>
<body>

  <?php include 'html/header-html.php'; ?>

  <!-- Page Breadcrumbs Start -->
  <div class="slider bg-navy-blue bg-scroll pos-rel breadcrumbs-page">
    <div class="container">      
      <div class="breadcrumbs-description">
        <h1>Productos</h1>
        EQUIPOS DE INGENIERIA: ASFALTO
      </div>
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">
   
    <section class="bg-white bg-wave">
      <div class="container pos-rel">
        <div class="row">
          <!-- Heading Main -->
          <div class="col-md-12 ml-auto why-choose wow fadeInRight" data-wow-duration="0" data-wow-delay="0.6s">
              
              <section class="bg-white wide-tb-50 bg-wave">
                <div class="container">
                                       
                      <h3 class="h3-sm fw-6 txt-blue mb-4">PRODUCTOS / EQUIPOS DE INGENIERIA / ASFALTO</h3>  
                      
                      <div class="row">
                          <div class="col-lg-4">  
                              <div class="boxmarcas">
                                 <a href="https://www.humboldtmfg.com/asphalt.html" target="_blank"><img src="images/humboldt.png" alt=""/></a>
                                 <a href="https://www.humboldtmfg.com/asphalt.html" target="_blank" class="btn">Humboldt</a>
                              </div> 
                          </div>
                          <div class="col-lg-4">    
                              <div class="boxmarcas">
                                 <a href="https://www.gdsinstruments.com/soil-mechanics-testing-systems" target="_blank"><img src="images/gds.png" alt=""/></a>
                                 <a href="https://www.gdsinstruments.com/soil-mechanics-testing-systems" target="_blank" class="btn">GDS</a>
                              </div>
                          </div>
                          <div class="col-lg-4">  
                              <div class="boxmarcas">
                                 <a href="https://www.labotronics.com/Testing-Instruments" target="_blank"><img src="images/labotronics.png" alt=""/></a>
                                 <a href="https://www.labotronics.com/Testing-Instruments" target="_blank" class="btn">Labotronics</a>                              
                              </div> 
                          </div>
                      </div>  

                      <p>&nbsp;</p>      

                      <div class="row">
                          <div class="col-lg-4">
                               <ul class="list-unstyled icons-listing mb-0">                                 
                                  <li><i class="icofont-check"></i> Extracción de Aglutinante</li>
                                  <li><i class="icofont-check"></i> Extracción de Solventes</li>
                                  <li><i class="icofont-check"></i> Reciclaje de Solventes</li>
                               </ul>
                          </div>
                          <div class="col-lg-4"></div>
                          <div class="col-lg-4"></div>     
                      </div>

                      <p>&nbsp;</p> 
                      
                      <div class="row">
                          <div class="col-lg-4 text-center">
                               <img src="images/equipos-ingenieria/producto-image020.png" alt="">
                          </div>
                          <div class="col-lg-8">
                               <p>La prueba de Hamburgo, o el seguimiento de la rueda de inmersión se ha convertido en un método de prueba extremadamente popular en los últimos años. El rastreador de ruedas de Hamburgo está diseñado para soportar las demandas de los laboratorios de pruebas más activos. Está hecho de acero inoxidable de alta calidad, utiliza el sistema de brazo en voladizo estándar para cargar las muestras y produce un movimiento totalmente sinusoidal. En el informe de NCHRP: requisitos y mejoras del equipo de prueba de la pista de la rueda de Hamburgo para AASHTO T 324, la Cox / Cooper Hamburg fue claramente la máquina con el mejor rendimiento.</p>
                               <p>Desde entonces, los calentadores y el flujo de agua se han actualizado, lo que resulta en un calentamiento más rápido y una temperatura mejorada. Varios rastreadores de ruedas de Hamburgo no cumplen correctamente los requisitos actuales de AASHTO y pueden retrasarse aún más cuando se actualiza la norma. La máquina Cox / Cooper cumple con todos los requisitos de los estándares</p>
                          </div>     
                      </div>                          
                                  
                </div>
              </section>              
              
              <p>&nbsp;</p>

              <?php include 'html/form-pedido-otros-productos.php'; ?>
              
          </div>
        </div>
        
      </div>
    </section>

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
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.validate.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/code.js"></script>

  </body>
</html>