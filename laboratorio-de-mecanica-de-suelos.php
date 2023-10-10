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
    
    <title>Equipos de Ingenieria / Laboratorio de Mecanica de Suelos / PSS</title>    
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
        EQUIPOS DE INGENIERIA: LABORATORIO DE MECANICA DE SUELOS
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
                                       
                      <h3 class="h3-sm fw-6 txt-blue mb-4">PRODUCTOS / EQUIPOS DE INGENIERIA / LABORATORIO DE MECANICA DE SUELOS</h3>  
                      
                      <div class="row">
                          <div class="col-lg-4">  
                              <div class="boxmarcas">
                                 <a href="https://www.humboldtmfg.com/soil-mechanics.html" target="_blank"><img src="images/humboldt.png" alt=""/></a>
                                 <a href="https://www.humboldtmfg.com/soil-mechanics.html" target="_blank" class="btn">Humboldt</a>
                              </div> 
                          </div>
                          <div class="col-lg-4">    
                              <div class="boxmarcas">
                                 <a href="https://www.gdsinstruments.com/soil-mechanics-testing-systems" target="_blank"><img src="images/gds.png" alt=""/></a>
                                 <a href="https://www.gdsinstruments.com/soil-mechanics-testing-systems" target="_blank" class="btn">GDS</a>
                              </div>
                          </div>
                      </div>  

                      <p>&nbsp;</p>      

                      <div class="row">
                          <div class="col-lg-4">
                               <ul class="list-unstyled icons-listing mb-0">                           
                                  <li><i class="icofont-check"></i> Triaxial</li> 
                                  <li><i class="icofont-check"></i> Triaxial Dinámico</li>
                                  <li><i class="icofont-check"></i> Equipo de Corte Directo</li>                                                               
                               </ul>
                          </div>
                          <div class="col-lg-4">
                               <ul class="list-unstyled icons-listing mb-0">
                                  <li><i class="icofont-check"></i> Consolidometro</li>
                                  <li><i class="icofont-check"></i> Celdas de Carga</li>
                                  <li><i class="icofont-check"></i> Software</li>                                
                               </ul>
                          </div>
                          <div class="col-lg-4"></div>     
                      </div>

                      <p>&nbsp;</p> 
                      
                      <div class="row">
                          <div class="col-lg-4 text-center">
                               <img src="images/equipos-ingenieria/producto-image004.png" alt="">
                          </div>
                          <div class="col-lg-8">
                               <p>&nbsp;</p>
                               <p>El Marco de Carga HM-5030 ofrece la solución definitiva para un laboratorio que busca realizar pruebas Marshall, LBR y SCB, pero también le puede usar el marco de carga para todas sus otras necesidades de prueba. El Master Loader digital proporciona esa capacidad al manejar fácilmente las pruebas de compresión de asfalto, así como las pruebas de suelo como CBR y pruebas triaxiales, incluyendo UU, CU, CD y UC. El Master Loader digital tiene la capacidad de funcionar como una unidad independiente, que puede realizar pruebas Marshall con solo presionar un botón; o junto con el software NEXT de Humboldt, el módulo de software Marshall y una computadora, puede recopilar datos en tiempo real en forma de cuadros y gráficos.</p>
                               <p>El HM-5030 es ideal para proyectos de construcción de carreteras en laboratorios móviles o fijos, instituciones educativas y empresas de consultoría. Diseñado para aplicaciones que requieren sistemas de carga multipropósito, como proyectos de construcción de carreteras en laboratorios móviles o fijos, instituciones educativas y firmas de consultoría, el cargador maestro HM-5030 es ideal para casi cualquier aplicación, desde construcción de carreteras hasta grandes volúmenes comerciales y comerciales. laboratorios educativos.</p>
                          </div>     
                      </div>
                      <br>

                      <div class="row">
                          <div class="col-lg-4 text-center">
                               <img src="images/equipos-ingenieria/producto-image008.png" alt="">
                          </div>
                          <div class="col-lg-8">
                               <p>El aparato de corte directo / residual Humboldt HM-5760 utiliza carga neumática automatizada para aplicar cargas verticales a una muestra de suelo, eliminando la necesidad de cargar pesos utilizados en sistemas de tipo de peso muerto. La HM-5760 es una máquina basada en microprocesador que cuenta con un sistema de accionamiento de motor paso a paso y una pantalla táctil de 7 "que permite al operador controlar y monitorear todas las funciones de prueba. Al igual que todas las máquinas de la serie Elite de Humboldt, la   HM-5760 está construida con componentes duraderos y de alta calidad y cuenta con el uso de un motor paso a paso, engranajes de precisión y caja de cambios para garantizar un funcionamiento suave y confiable, así como resultados precisos.</p>
                               <p>El HM-5760 está construido alrededor del registrador de datos integral de 4 canales de Humboldt con control de pantalla táctil, que permite utilizar el HM-5760 como un dispositivo independiente capaz de realizar un control completo de las pruebas y el registro de datos. También puede ser controlado por una computadora en red en cualquier lugar con acceso a la red.</p>
                          </div>     
                      </div>
                      <br>

                      <div class="row">
                          <div class="col-lg-4 text-center">
                               <img src="images/equipos-ingenieria/producto-image006.png" alt="">
                          </div>
                          <div class="col-lg-8">
                               <p>&nbsp;</p>
                               <p>El aparato triaxial verdadero GDS (GDSTTA) tiene la característica definitoria de que, a diferencia del aparato triaxial convencional, los tres esfuerzos principales se pueden controlar de forma independiente, en lugar de solo dos en un sistema triaxial convencional. Esto permite que se realice una gama más amplia de caminos de tensión complejos.</p>
                               <p>Este sistema cíclico dinámico funciona con actuadores electromecánicos avanzados o actuadores hidráulicos opcionales y es una herramienta de investigación extremadamente sofisticada. Los ejes vertical y uno horizontal se cargan a través de los actuadores dinámicos (eje 1 y 2), el control de t ensión se proporciona para el segundo eje horizontal, (eje 3) a través de la presión de la celda.</p>
                          </div>     
                      </div>
                      <br>

                      <div class="row">
                          <div class="col-lg-4 text-center">
                               <img src="images/equipos-ingenieria/producto-image010.png" alt="">
                          </div>
                          <div class="col-lg-8">
                               <p>&nbsp;</p>
                               <p>La caja de cizalla de contrapresión de alta presión (HPBPS) es una versión de alta presión y alta carga de nuestra caja de cizalla de contrapresión estándar que puede realizar pruebas de cizallamiento directo con control preciso de contrapresión, para el control directo y la medición de fallas de pendiente realistas. El dispositivo puede cargar la muestra a 100kN axialmente y en cizallamiento, mientras que también es capaz de aplicar contrapresión de hasta 10MPa.</p>
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