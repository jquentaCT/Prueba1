<?php  
ob_start();
include 'class/class_process.php';
no_cache();
//www_url();
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

    <title>JHH INVERSIONES S.A.C.</title>
    <meta name="robots" content="index"/>
    <meta name="author" content="Creatusite.com - Diseño y Programación Web"> 
    <meta name="copyright" content="Professional Service Support S.A.C." />    
    <meta name="description" content="Venta de todo tipo de Vehiculos Lima - Perú">
    <meta name="keywords" content="">
  
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

  <div class="slider bg-navy-blue bg-scroll pos-rel home-page">
    <div class="container">
      <div class="breadcrumbs-description wow fadeInLeft" data-wow-duration="0" data-wow-delay="0s">
        <h1>J.H.H INERSIONES S.A.C</h1>
        Hace 15 años J.H.H inicio con las ventas, a lo largo de este tiempo, ha logrado posicionarse como uno de los grupos automotrices más importantes y con mayor potencial de desarrollo del país. Desde 2007 somo líderes en el sector automotriz y maquinarias, y contamos con el respaldo de un sólido grupo económico con operaciones en diversas partes de nuestro Perú.
      </div>
    </div>
  </div>

  <main id="body-content" style="overflow-y: inherit;">

    <p>&nbsp;</p>
    <div class="container mt25 mb25">
      <?php include 'html/carousel-productos.php'; ?>        
    </div>
    <p>&nbsp;</p>

    <section class="wide-pos-rel mb-spacer-md">     
       <div class="container">
          <div class="row">
          <?php             
             $sqlp = "select idp,nombre,imagen1 ";
             $sqlp.= "from ".TABLE_PREFIX._TAB_PROD_SYS_." ";
             $sqlp.= "where mostrar='1' and home='1' and (externo='2' or externo IS NULL)";

             $rowp = $conectdata->set_list_table($sqlp);
             foreach($rowp as $key => $valorp){
                                   
                  $nom_prod = utf8_decode($rowp[$key]['nombre']);

                  if(!empty($rowp[$key]['imagen1'])){
                      $img_prod = URL_SITE.'/images/productos/'.$rowp[$key]['imagen1'];
                  }else{ $img_prod = URL_SITE.'/images/productos/no-disponible.jpg'; }

                  $url_prod = htmlentities(URL_SITE.'/detalle-producto.php?cvar='.$rowp[$key]['idp']);                                                                             
                  echo '<div class="col-md-3"><div class="p5"><a href="'.$url_prod.'" title="'.$nom_prod.'"><img nonce="'._SYSTEM_NONCE_.'" class="img-fluid" src="'.$img_prod.'"/></a></div></div>';                      
             }            
          ?>
          </div>
       </div>
       <br>
    </section>

    <!--<section class="wide-tb-40 pos-rel mb-spacer-md bgclientes">     
       <div class="container">
           <div class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0s">
               <h1 class="heading-main ct_1">MARCAS</h1>             
               <div class="row text-center">
                  <?php
                    $sql = "select nombre,imagen1 ";
                    $sql.= "from ".TABLE_PREFIX._TAB_CLIE_SYS_." ";
                    $sql.= "where mostrar='1' limit 12";
                    $row = $conectdata->set_list_table($sql);
                    foreach($row as $key => $valor){                        
                        $nom_cli = utf8_encode($row[$key]['nombre']);                                                
                        $img_cli = 'images/clientes/'.$row[$key]['imagen1'];
                        if(!empty($row[$key]['imagen1'])){
                            if (file_exists($img_cli) == false){ $img_cli = 'images/clientes/tb-no-disponible.jpg'; }         
                        }else{ $img_cli = 'images/clientes/tb-no-disponible.jpg'; }
                  ?>
                        <div class="col-md-3"><img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/<?php echo $img_cli; ?>" class="ma_5" alt="<?php echo $nom_cli; ?>"/></div>                  
                  <?php  
                    }
                  ?>
               </div>
               <br>
               
               <!--<div class="text-center"><a class="btn-theme bg-blue-light no-shadow d-none d-lg-inline-block align-self-center" href="<?php echo URL_SITE; ?>/clientes.php" role="button">Ver más</a></div>-->

           <!--</div>-->
       <!--</div>-->        
    <!--</section>-->      
      
    <!--<section class="wide-tb-50">-->
      <!--<div class="container">-->
        <!--<div class="row">-->

           <!--<div class="col-sm-12 wow slideInDown" data-wow-duration="0" data-wow-delay="0.1s">

              <h1 class="heading-main">MARCAS</h1>         
              <p>&nbsp;</p>

              <div class="owl-carousel owl-theme" id="home-clients">
                  <?php
                    $sql = "select nombre,imagen1 ";
                    $sql.= "from ".TABLE_PREFIX._TAB_MARC_SYS_." ";
                    $sql.= "where mostrar='1'";
                    $row = $conectdata->set_list_table($sql);
                    foreach($row as $key => $valor){                        
                        $nom_mar = utf8_encode($row[$key]['nombre']);                                                
                        $img_mar = 'images/marcas/'.$row[$key]['imagen1'];
                        if(!empty($row[$key]['imagen1'])){
                            if (file_exists($img_mar) == false){ $img_mar = 'images/marcas/tb-no-disponible.jpg'; }         
                        }else{ $img_mar = 'images/marcas/tb-no-disponible.jpg'; }
                  ?>            
                  <div class="item">
                    <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/<?php echo $img_mar; ?>" alt="<?php echo $nom_mar; ?>">
                  </div>                
                  <?php  
                    }
                  ?>
              </div>

            </div>-->
        <!--</div>-->
      <!--</div>-->        
    <!--</section>-->

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

  <!-- JQuery Map Plugin -->
  <!--
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.gmap.min.js"></script>
  -->

  <!-- REVOLUTION JS FILES -->
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/jquery.themepunch.tools.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/jquery.themepunch.revolution.min.js"></script>

  <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->  
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/extensions/revolution.extension.actions.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/rev-slider/revolution/js/extensions/revolution.extension.video.min.js"></script>

  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/site-custom.js"></script> 
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/code.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript">
    var tpj=jQuery;
    
    var revapi1078;
    tpj(document).ready(function() {
      if(tpj("#rev_slider_1078_1").revolution == undefined){
        revslider_showDoubleJqueryError("#rev_slider_1078_1");
      }else{
        revapi1078 = tpj("#rev_slider_1078_1").show().revolution({
          sliderType:"standard",
          jsFileLocation:"revolution/js/",
          sliderLayout:"fullscreen",
          dottedOverlay:"none",
          delay:9000,
          navigation: {
            keyboardNavigation:"off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation:"off",
            mouseScrollReverse:"default",
            onHoverStop:"off",
            touch:{
              touchenabled:"on",
              swipe_threshold: 75,
              swipe_min_touches: 1,
              swipe_direction: "horizontal",
              drag_block_vertical: false
            }
            ,
            arrows: {
              style:"metis",
              enable:true,
              hide_onmobile:true,
              hide_under:600,
              hide_onleave:true,
              hide_delay:200,
              hide_delay_mobile:1200,
              //tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
              left: {
                h_align:"left",
                v_align:"center",
                h_offset:30,
                v_offset:0
              },
              right: {
                h_align:"right",
                v_align:"center",
                h_offset:30,
                v_offset:0
              }
            }
            ,
            bullets: {
              style: 'hades',
              tmp: '<span class="tp-bullet-image"></span>',
              enable:false,
              hide_onmobile:true,
              hide_under:600,
              //style:"metis",
              hide_onleave:true,
              hide_delay:200,
              hide_delay_mobile:1200,
              direction:"horizontal",
              h_align:"center",
              v_align:"bottom",
              h_offset:0,
              v_offset:30,
              space:5,
              //tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
            }
          },
          viewPort: {
            enable:true,
            outof:"pause",
            visible_area:"80%",
            presize:false
          },
          responsiveLevels:[1240,1024,778,480],
          visibilityLevels:[1240,1024,778,480],
          gridwidth:[1240,1024,778,480],
          gridheight:[600,600,500,400],
          lazyType:"none",
          parallax: {
            type:"mouse",
            origo:"slidercenter",
            speed:2000,
            levels:[2,3,4,5,6,7,12,16,10,50,47,48,49,50,51,55],
            type:"mouse",
          },
          shadow:0,
          spinner: 'spinner2',
          stopLoop:"off",
          stopAfterLoops:-1,
          stopAtSlide:-1,
          shuffle:"off",
          autoHeight:"off",
          hideThumbsOnMobile:"off",
          hideSliderAtLimit:0,
          hideCaptionAtLimit:0,
          hideAllCaptionAtLilmit:0,
          debugMode:false,
          fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
          }
        });
      }
    }); /*ready*/
  </script> 
  </body>
</html>