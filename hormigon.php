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
    
    <title>Equipos de Ingenieria / Hormigón / PSS</title>    
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
        EQUIPOS DE INGENIERIA: HORMIGÓN
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
                                       
                      <h3 class="h3-sm fw-6 txt-blue mb-4">PRODUCTOS / EQUIPOS DE INGENIERIA / HORMIGÓN</h3>  
                      
                      <div class="row">
                          <div class="col-lg-3">  
                              <div class="boxmarcas">
                                 <a href="https://www.humboldtmfg.com/concrete.html" target="_blank"><img src="images/humboldt.png" alt=""/></a>
                                 <a href="https://www.humboldtmfg.com/concrete.html" target="_blank" class="btn">Humboldt</a>
                              </div> 
                          </div>
                          <div class="col-lg-3">    
                              <div class="boxmarcas">
                                 <a href="https://www.gdsinstruments.com/rock-mechanics-testing-systems/" target="_blank"><img src="images/gds.png" alt=""/></a>
                                 <a href="https://www.gdsinstruments.com/rock-mechanics-testing-systems/" target="_blank" class="btn">GDS</a>
                              </div>
                          </div>
                          <div class="col-lg-3">  
                              <div class="boxmarcas">
                                 <a href="http://www.testingequipmentie.com/Compression_Testing_Machine.html" target="_blank"><img src="images/testingequipmentie.png" alt=""/></a>
                                 <a href="http://www.testingequipmentie.com/Compression_Testing_Machine.html" target="_blank" class="btn">Testingequipmentie</a>                              
                              </div> 
                          </div>
                          <div class="col-lg-3">  
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
                                    <li><i class="icofont-check"></i> Medidores de Aire</li>
                                    <li><i class="icofont-check"></i> Resistencia de Uniones y pruebas de Anclaje</li>
                                    <li><i class="icofont-check"></i> Corrosión</li>
                                    <li><i class="icofont-check"></i> Monitores de Grietas</li>
                                    <li><i class="icofont-check"></i> Pruebas de Cubo</li>
                                    <li><i class="icofont-check"></i> Pruebas de Cilindro</li>
                                    <li><i class="icofont-check"></i> Pruebas de Flexión</li>
                                    <li><i class="icofont-check"></i> Pruebas de Congelamiento y Descongelamiento</li>
                                    <li><i class="icofont-check"></i> Georadar</li>
                                    <li><i class="icofont-check"></i> Prueba de Farguado</li>
                                    <li><i class="icofont-check"></i> Blane</li>
                                    <li><i class="icofont-check"></i> Mezcladores</li>
                              </ul>
                          </div>
                          <div class="col-lg-4">
                              <ul class="list-unstyled icons-listing mb-0">
                                    <li><i class="icofont-check"></i> Localizadores de barras de esfuerzo</li>
                                    <li><i class="icofont-check"></i> Resistividad</li>
                                    <li><i class="icofont-check"></i> Hormigón autoconsolidante</li>
                                    <li><i class="icofont-check"></i> Prueba de fijación del tiempo</li>
                                    <li><i class="icofont-check"></i> Prueba de Fuerza</li>
                                    <li><i class="icofont-check"></i> Prueba de Ultrasonido</li>
                                    <li><i class="icofont-check"></i> Unidad de Peso</li>
                                    <li><i class="icofont-check"></i> Impermeabilidad</li>
                                    <li><i class="icofont-check"></i> Calorímetro</li>
                                    <li><i class="icofont-check"></i> Máquina de Ensayo Universal</li>
                                    <li><i class="icofont-check"></i> Máquina de Ensayo Universal Hidráulica</li>
                                    <li><i class="icofont-check"></i> Máquina de Prueba de Impacto</li>
                              </ul> 
                          </div>
                          <div class="col-lg-4">
                              <ul class="list-unstyled icons-listing mb-0">
                                    <li><i class="icofont-check"></i> Máquina de Fluencia y Ruptura</li>
                                    <li><i class="icofont-check"></i> Máquina de Compresión</li> 
                                    <li><i class="icofont-check"></i> Máquina de Prueba Mecánica</li>
                                    <li><i class="icofont-check"></i> Máquina de Torsión</li>
                                    <li><i class="icofont-check"></i> Máquina de doblado</li>
                                    <li><i class="icofont-check"></i> Máquina de Ahuecamiento</li>
                                    <li><i class="icofont-check"></i> Máquina de Fricción</li>
                                    <li><i class="icofont-check"></i> Probadores de Dureza</li>
                                    <li><i class="icofont-check"></i> Extensómetros. - Personalizados, Axiales, de roca, concreto, transversales</li>
                                    <li><i class="icofont-check"></i> Deflectómetros</li>
                                    <li><i class="icofont-check"></i> Mecanismo de Clip-on</li> 
                                    <li><i class="icofont-check"></i> Probadores de dureza</li>
                              </ul>
                          </div>     
                      </div>

                      <p>&nbsp;</p> 
                      
                      <div class="row">
                          <div class="col-lg-4 text-center">
                               <img src="images/equipos-ingenieria/producto-image014.png" alt="">
                          </div>
                          <div class="col-lg-8">
                               <p>El controlador HCM-5080 presenta una bomba robusta, confiable y de funcionamiento frío de 1 hp, que funciona junto con el controlador para un control operativo completo. La pantalla táctil a color de 7 pulgadas y alta resolución del HCM-5080 proporciona un funcionamiento, configuración y calibración precisos y precisos del marco.</p>
                               <p>La configuración de prueba es simple, simplemente elija el estándar ASTM que desea usar y el controlador lo gu iará rápidamente a través del procedimiento de configuración. La calibración también es fácil con el HCM-5080, lo que le permite utilizar de 1 a 10 puntos para calibrar la máquina en cualquier incremento que elija.</p>
                               <p>También proporciona una perilla de control de motor precisa, que le permite marcar cargas precisas para la calibración. El controlador proporciona dos entradas de canal para carga, lo que permite el control de dos cuadros de compresión separados cuando se utiliza el accesorio de válvula selectora HCM-HP4014.</p>
                               <p>El HCM-5080 también proporciona dos entradas de canal adicionales para desplazamiento, lo que proporciona una solución fácil para determinar la ración de Poisson y la prueba de módulo de Young. El HCM-5080 también proporciona capacidades de adquisición de datos de hasta 1000 pruebas con 3000 puntos por prueba.</p>
                               <p>Esta información se puede exportar a través del puerto USB frontal y una unidad flash.</p>
                          </div>     
                      </div>
                      <br>

                      <div class="row">
                          <div class="col-lg-4 text-center">
                               <img src="images/equipos-ingenieria/producto-image012.png" alt="">
                          </div>
                          <div class="col-lg-8">
                              <p>La máquina de flexión y compresión de Concreto, CST-200/300  pueden ser accionadas de manera simultánea, transfiriendo la información, a través de un software para el análisis y reproducción de datos. Máxima Carga de compresión 300 / 200 kN, rango de carga de 2 a 300 kN, Máxima carga de flexión 10 kN, rango de carga de 0.1 a 10 kN.</p>
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