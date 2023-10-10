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
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    
    <title>Nosotros - Professional Service Support S.A.C. (PSS)</title>    
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
        <h1>Nosotros</h1>
        Somos una Empresa legalmente constituida dedicada a la compra y venta de vehículos nuevos y seminuevos, tenemos mas de 5 años dedicados a este rubro vende tu vehículo en menos de 2 horas.
      </div>
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- Counter Start -->
   <!-- <section class="wide-tb-50 bg-scroll counter-bg pos-rel">-->
      <!--<div class="bg-overlay blue opacity-50"></div>-->
      <!--<div class="container">-->
<!--<div class="row">-->
           <!-- Counter Col Start -->
            <!--<div class="col counter-style-1 col-6 col-lg-3 col-sm-6 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0s">-->
              <!--<p><i class="icofont-google-map"></i></p>-->
             <!-- <span class="counter">340</span>-->
              <!--<div>-->
               <!-- Proyectos completados-->
             <!-- </div>-->
           <!-- </div>-->
            <!-- Counter Col End -->

            <!-- Counter Col Start -->
            <!--<div class="col counter-style-1 col-6 col-lg-3 col-sm-6 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0s">-->
              <!--<p><i class="icofont-globe"></i></p>-->
             <!-- <span class="counter">200</span>-->
              <!--<span>+</span>-->
             <!-- <div>-->
               <!-- Proyectos completados-->
             <!-- </div>-->
            <!--</div>-->
            <!-- Counter Col End -->

            <!-- Spacer For Medium -->
            <!--<div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>-->
            <!-- Spacer For Medium -->

            <!-- Counter Col Start -->
            <!--<div class="col counter-style-1 col-6 col-lg-3 col-sm-6 wow fadeInRight" data-wow-duration="0" data-wow-delay="0">-->
              <!--<p><i class="icofont-vehicle-delivery-van"></i></p>-->
             <!--<span class="counter">340</span>-->
             <!-- <span>+</span>-->
              <!--<div>-->
               <!-- Proyectos completados-->
             <!-- </div>-->
           <!-- </div>-->
            <!-- Counter Col End -->

            <!-- Counter Col Start -->
           <!-- <div class="col counter-style-1 col-6 col-lg-3 col-sm-6 wow fadeInRight" data-wow-duration="0" data-wow-delay="0s">-->
              <!--<p><i class="icofont-umbrella-alt"></i></p>-->
             <!-- <span class="counter">200</span>-->
              <!--<div>-->
               <!-- Proyectos completados-->
              <!--</div>-->
            <!--</div>-->
            <!-- Counter Col End -->
        <!--</div>-->
      <!--</div>-->    
    <!--</section>-->
    <!-- Counter End -->

   

    <!-- What Makes Us Special Start -->
    <section class="bg-white bg-wave">
      <div class="container pos-rel">
        <div class="row">
          <!-- Heading Main -->
          <div class="col-md-12 ml-auto why-choose wow fadeInRight" data-wow-duration="0" data-wow-delay="0.6s">
              
              <section class="bg-white wide-tb-50 bg-wave">
                <div class="container pos-rel">
                  <div class="row">
                    <!-- Heading Main -->
                    <div class="col-md-12 ml-auto why-choose wow fadeInRight" data-wow-duration="0" data-wow-delay="0.6s">
                        <div class="row">                 
                              <div class="col-12 col-lg-6">              
                                <img nonce="<?php echo _SYSTEM_NONCE_; ?>" id="tnos" src="<?php echo URL_SITE; ?>/images/nosotros-jhh/nosotros-1.jpg" alt="" />              
                              </div>
                              <div class="col-12 col-lg-6">              
                                <div class="icon-box-2">
                                  <div class="media">                     
                                      <div class="service-inner-content media-body">
                                          <h4 class="h4-xl bk1 dyi">NOSOTROS</h4>
                                          <!--<p><strong>NUESTRA MISIÓN:</strong> xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX XXXXXXXXXXXXXXXXXXXXXX.</p>-->
                                          <!--<p><strong>NUESTRA VISIÓN:</strong> XXXXXXXXXXX XXXXXXXX XX XXl XXXXXXXXXXXXXXXXX.</p>-->
                                          <!--<p><strong>NUESTROS VALORES:</strong> XXXXXXXXXXXXXXXXXXXX XXXXXXXXXXXX XXXXXX XXXXXXXXXXXXXX XXX XX XX X XX XXXX.</p>-->
                                          <p>Somos una Empresa legalmente constituida dedicada a la compra y venta de vehículos nuevos y seminuevos, tenemos mas de 5 años dedicados a este rubro vende tu vehículo en menos de 2 horas.</p>
                                      </div>
                                  </div>
                                </div>              
                              </div>              
                        </div>
                        <br><br>
                        <!--<div class="text-center thumb-nos">-->
                           <!--<a href="javascript:void(0)"><img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/images/nosotros-thumb-1.png" class="bc2"/></a>-->
                           <!--<a href="javascript:void(0)"><img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/images/nosotros-thumb-2.png" class="bc2"/></a>-->
                           <!--<a href="javascript:void(0)"><img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/images/nosotros-thumb-1.png" class="bc2"/></a>-->
                          <!-- <a href="javascript:void(0)"><img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/images/nosotros-thumb-2.png" class="bc2"/></a>-->
                        </div>
                    </div>
                  </div>
                  
                </div>
              </section>              
              
          </div>
        </div>
        
      </div>
    </section>
    <!-- What Makes Us Special End -->

   

    <!-- Google Map Start -->
    <!--<section class="map-bg text-center">-->
     <!-- <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="images/mapa-google.png">-->
      <!--
      <div id="map-holder" class="pos-rel">
          <div id="map_extended">
              <p>This will be replaced with the Google Map.</p>
          </div>
      </div>
      -->      
    <!--</section>  -->   
    <!-- Google Map Start -->
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

  <!-- JQuery Map Plugin -->
  <!--
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/http://maps.google.com/maps/api/js?sensor=false"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.gmap.min.js"></script>
  -->    

  <!-- Masonary Plugin -->
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.cubeportfolio.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/masonary-custom.js"></script>

  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/site-custom.js"></script>  
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript">
    $(document).ready(function() {
    jQuery("#contactusForm").validate({
            meta: "validate",
            /* */
            rules: {
                name: "required",

                lastname: "required",
                // simple rule, converted to {required:true}
                email: { // compound rule
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                },
                cment: {
                    required: true
                },
                subject: {
                    required: true
                }
            },
            messages: {
                name: "Please enter your name.",
                lastname: "Please enter your last name.",
                email: {
                    required: "Please enter email.",
                    email: "Please enter valid email"
                },
                phone: "Please enter a phone.",
                subject: "Please enter a subject.",
                cment: "Please enter a comment."
            },
        });
     });
  </script>

  </body>
</html>