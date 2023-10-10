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
    
    <title>Equipos de Ingenieria / Laboratorio / PSS</title>    
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
        EQUIPOS DE INGENIERIA: LABORATORIO
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
                                       
                      <h3 class="h3-sm fw-6 txt-blue mb-4">PRODUCTOS / EQUIPOS DE INGENIERIA / LABORATORIO</h3>  
                      
                      <div class="row">
                          <div class="col-lg-4">  
                              <div class="boxmarcas">
                                 <a href="https://www.humboldtmfg.com/general-lab.html" target="_blank"><img src="images/humboldt.png" alt=""/></a>
                                 <a href="https://www.humboldtmfg.com/general-lab.html" target="_blank" class="btn">Humboldt</a>
                              </div> 
                          </div>
                          <div class="col-lg-4"></div>
                          <div class="col-lg-4"></div>
                      </div>  

                      <p>&nbsp;</p>      

                      <div class="row">
                          <div class="col-lg-4">
                               <ul class="list-unstyled icons-listing mb-0">                           
                                  <li><i class="icofont-check"></i> Balanzas</li>
                                  <li><i class="icofont-check"></i> Soporte de Calentamiento de Vasos</li>
                                  <li><i class="icofont-check"></i> Pinceles</li>
                                  <li><i class="icofont-check"></i> Calibrador</li>
                                  <li><i class="icofont-check"></i> Cortadores de Corcho y vidrio</li>
                                  <li><i class="icofont-check"></i> Platos, Frascos, Cajas</li>
                                  <li><i class="icofont-check"></i> Durómetros</li>
                                  <li><i class="icofont-check"></i> Hornos</li>
                                  <li><i class="icofont-check"></i> Medidores e Indicadores</li>
                                  <li><i class="icofont-check"></i> Guantes</li>                 
                               </ul>
                          </div>
                          <div class="col-lg-4">
                               <ul class="list-unstyled icons-listing mb-0">
                                  <li><i class="icofont-check"></i> Platos Calientes</li>
                                  <li><i class="icofont-check"></i> Quemadores de Laboratorio</li>
                                  <li><i class="icofont-check"></i> Abrazaderas de Laboratorio</li>
                                  <li><i class="icofont-check"></i> Bombas de Filtro de Laboratorio</li>
                                  <li><i class="icofont-check"></i> Pinzas</li>
                                  <li><i class="icofont-check"></i> Herramientas de Laboratorio</li>
                                  <li><i class="icofont-check"></i> Trípodes y Soportes</li>
                                  <li><i class="icofont-check"></i> Material de Laboratorio</li>
                                  <li><i class="icofont-check"></i> Mazos, Caucho</li>
                                  <li><i class="icofont-check"></i> Mortero y Maja</li>
                               </ul>
                          </div>
                          <div class="col-lg-4">
                               <ul class="list-unstyled icons-listing mb-0">
                                  <li><i class="icofont-check"></i> Hornos</li>
                                  <li><i class="icofont-check"></i> Sartenes y Tazones</li>
                                  <li><i class="icofont-check"></i> Selecciones de Roca y Cinceles</li>
                                  <li><i class="icofont-check"></i> Contenedores de Muestras</li>
                                  <li><i class="icofont-check"></i> Espátulas y Cucharas</li>
                                  <li><i class="icofont-check"></i> Bordes Rectos</li>
                                  <li><i class="icofont-check"></i> Termómetros</li>
                                  <li><i class="icofont-check"></i> Temporizadores</li>
                                  <li><i class="icofont-check"></i> Transformadores</li>
                                  <li><i class="icofont-check"></i> Paletas</li>  
                               </ul>
                          </div>     
                      </div>

                      <p>&nbsp;</p> 
                      
                      <div class="row">
                          <div class="col-lg-4 text-center">
                               <img src="images/equipos-ingenieria/producto-image039.png" alt="">
                          </div>
                          <div class="col-lg-8">
                              <strong>Horno de convección de aire forzado</strong>
                              <p>Ideal para pruebas de suelo y asfalto, los hornos de la serie Despatch LBB cuentan con velocidades de calentamiento rápidas y controles digitales precisos y fáciles de leer. Los potentes elementos calefactores llevan el horno a la temperatura muy rápidamente, lo que da como resultado resultados de prueba rápidos y una calidad de muestra mejorada. Los controles digitales ofrecen una temperatura precisa y un gran panel LED facilita el monitoreo de la temperatura del horno.</p>
                              <p>Los hornos de la serie LBB funcionan a temperaturas de hasta 400 ° F (204 ° C) y utilizan un flujo de aire de convección forzada para temperaturas uniformes en toda la cámara del horno. Los estantes estándar pueden manejar hasta 50 libras.(22,7 kg) y son fáciles de deslizar y reposicionar. Estantes que pueden manejar 200 lbs. (90,7 kg) de material están disponibles como opción.Cumple con los requisitos de uniformidad de AASHTO de ± 3 ° a 150 ° C.</p>
                          </div>     
                      </div>
                      <br>

                      <div class="row">
                          <div class="col-lg-4 text-center">
                               <p>&nbsp;</p>
                               <img src="images/equipos-ingenieria/producto-image041.png" alt="">
                          </div>
                          <div class="col-lg-8">
                              <p>Admite los siguientes estándares: ASTM D2041 , ASTM C88 , ASTM D5581 , ASTM C88 , ASTM D5581 , ASTM C136 , ASTM D5581 , ASTM C136 , ASTM D5581</p>
                              <p>La serie Explorer incluye tres balanzas de precisión de alta capacidad con capacidades de hasta 35 kg. Las balanzas Explorer de alta capacidad ofrecen las mismas características intuitivas y modulares que los modelos Explorer estándar, como el sistema de calibración interna completamente automática AutoCal ™, que también se puede apagar, tiempo de estabilización de 1 segundo, dos sensores sin contacto para control de operación, con funciones adicionales y atributos para soportar aplicaciones de pesaje de mayor capacidad.</p>
                              <p>Las balanzas incluyen: pantalla táctil a todo color de 5.7 pulg(640 x 480 píxeles), que se puede quitar para ubicación remota o en columna, teclado QWERTY y teclado numérico para ingresar rápidamente datos GLP y GMP y otros datos de aplicaciones; USB estándar y RS232 y un tercer puerto opcional de RS232 o Ethernet, carcasa de fundición a presión, bandeja de acero inoxidable y cubierta reemplazable en uso, y pesaje integral debajo del gancho.</p>
                              <p>Las opciones incluyen: columna de pantalla táctil; kit de pies rodantes; batería recargable; cables y kits de interfaz.</p>
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