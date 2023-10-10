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

$paispedido = !empty($_POST['bpaispedido']) ? $_POST['paispedido'] : '';
$ciudadpedido = !empty($_POST['ciudadpedido']) ? $_POST['ciudadpedido'] : '';
$enviopedido = !empty($_POST['enviopedido']) ? $_POST['enviopedido'] : '';
$nombrepedido = !empty($_POST['nombrepedido']) ? $_POST['nombrepedido'] : '';
$emailpedido = !empty($_POST['emailpedido']) ? $_POST['emailpedido'] : '';
$telefonopedido = !empty($_POST['telefonopedido']) ? $_POST['telefonopedido'] : '';
$comentariopedido = !empty($_POST['comentariopedido']) ? $_POST['comentariopedido'] : '';

$paispedido = htmlspecialchars(clear_space(limpiar(not_html_script($paispedido))));
$ciudadpedido = htmlspecialchars(clear_space(limpiar(not_html_script($ciudadpedido))));
$enviopedido = htmlspecialchars(clear_space(limpiar(not_html_script($enviopedido))));
$nombrepedido = htmlspecialchars(clear_space(limpiar(not_html_script($nombrepedido))));
$emailpedido = htmlspecialchars(clear_space(limpiar(not_html_script($emailpedido))));
$telefonopedido = htmlspecialchars(clear_space(limpiar(not_html_script($telefonopedido))));
$comentariopedido = htmlspecialchars(strip_tags(not_script($comentariopedido)));

$cvar = !empty($_GET['cvar']) ? $_GET['cvar'] : ''; 
$cvar = clear_space(not_html_script(limpiar($cvar)));
$cvar = (int)$cvar;

if(is_int($cvar)){
   
   $data = $conectdata->get_data_producto($cvar);
   if($data==false){
      header("Location:".URL_SITE);
      exit();
   }

}else{
   header("Location:".URL_SITE);
   exit();
}

$url_producto = urlencode(URL_SITE.'/detalle-producto.php?cvar='.$cvar);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    
    <title>Producto: <?php echo $data['nombre']; ?> - PSS</title>    
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
        <h1>Detalles del producto</h1>
        Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.
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
                  
                  <div class="row">
                      <div class="col-md-6 text-left">
                        <a href="javascript:void(0)" rel="<?php echo $cvar; ?>" class="btn-theme bg-orange no-shadow mab_5 cotiprod">Añadir a mi lista <i class="icofont-listing-box"></i></a>
                      </div>
                      <div class="col-md-6 text-right">
                         <a class="btn btn-success" href="<?php echo URL_SITE; ?>/productos.php" role="button"><i class="icofont-rounded-left"></i> Regresar a lista de productos</a>
                      </div>
                  </div>
                  <p>&nbsp;</p>
                  
                  <h2 class="h2-xl mb-3 fw-7 txt-black text-center"><?php echo $data['nombre']; ?></h2>
                  <h3 class="text-danger text-center"><?php echo $data['codigo']; ?></h3>

                  <br>                 
                  <?php  
                    $img_prod = 'images/productos/'.$data['imagen1'];
                    if(!empty($data['imagen1'])){
                        if (file_exists($img_prod) == false){ $img_prod = 'images/productos/no-disponible.jpg'; }         
                    }else{ $img_prod = 'images/productos/no-disponible.jpg'; }
                  ?>
                  <div class="text-center">
                     <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo $img_prod; ?>" alt="" class="rounded mb-4">
                  </div>
                  <br>                    

                  <div class="meta-box">
                     <a href="#">Categoría(s)</a><span>:</span>  
                     <?php  
                         $sql = "select nombre ";
                         $sql.= "from ".TABLE_PREFIX._TAB_CATP_SYS_." ";                                      
                         $sql.= "order by nombre asc";                        
                         $row = $conectdata->set_list_table($sql);
                         foreach($row as $key => $valor){
                            $cat[] = $row[$key]['nombre'];
                         } 
                         if(count($cat)>0){ echo utf8_encode(implode(', ', $cat)); }  
                     ?>
                  </div>
                  <p>&nbsp;</p>
                  
                  <?php echo $data['descripcion']; ?>                  
                 
                  <p>&nbsp;</p>

                  <!-- Tags & Share Box -->
                  <div class="row align-items-center mt-5">
                    <div class="col-md-auto">
                      <div class="tags">
                        <?php  
                          $tags = explode(',',$data['etiquetas']);
                          for($i=0;$i<count($tags);$i++){
                             echo '<a href="'.URL_SITE.'/detalle-producto.php?cvar='.$cvar.'">'.$tags[$i].'</a>';    
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-md-auto ml-auto">
                      <div class="share-this">
                        <div class="d-inline-flex align-items-center">
                          Compártelo:
                          <a href="http://twitter.com/share?text=<?php echo $data['nombre']; ?>&url=<?php echo $url_producto; ?>" class="rounded-circle tw" data-toggle="tooltip" title="Compartir en TWITTER" data-original-title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                          <a href="http://www.facebook.com/sharer.php?u=<?php echo $url_producto; ?>" class="rounded-circle ff" data-toggle="tooltip" title="Compartir en FACEBOOK" data-original-title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                          <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url_producto; ?>" class="rounded-circle ln" data-toggle="tooltip" title="Compartir en LINKEDIN" data-original-title="Linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Tags & Share Box -->

                  <!-- Spacer For Medium -->
                  <div class="w-100 d-none d-sm-block spacer-70"></div>
                  <!-- Spacer For Medium -->

                  <!-- Related Post -->
                  <div class="heading-left-border">
                    Productos relacionados
                  </div>
                  <div class="row">
                  <?php 
                    $count_categorias = explode(',',$data['categorias']);
                    if(count($count_categorias) > 0){

                       $id_categoria = $count_categorias[mt_rand(0, count($count_categorias) - 1)];
                     
                       $sql = "select * ";
                       $sql.= "from ".TABLE_PREFIX._TAB_PROD_SYS_." ";
                       $sql.= "where mostrar='1' and FIND_IN_SET(".$id_categoria.",categorias) > 0 and idp not in (".$cvar.") LIMIT 6";

                       $rowc = $conectdata->set_list_table($sql);
                       foreach($rowc as $key => $valorc){
                          $img_prodc = 'images/productos/'.$rowc[$key]['imagen1'];
                          if(!empty($rowc[$key]['imagen1'])){
                              if (file_exists($img_prodc) == false){ $img_prodc = 'images/productos/no-disponible.jpg'; }         
                          }else{ $img_prodc = 'images/productos/no-disponible.jpg'; }

                          $url_prod = htmlentities(URL_SITE.'/detalle-producto.php?cvar='.$rowc[$key]['idp']);
                  ?>    
                       <div class="col-sm-12 col-md-4">
                          <div class="blog-warp">
                            <a href="<?php echo $url_prod; ?>"><img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo $img_prodc; ?>" alt="" class="rounded"></a>
                            <div class="meta-box"><a href="<?php echo $url_prod; ?>"><?php echo utf8_encode($rowc[$key]['nombre']); ?></a></div>                                         
                          </div>
                       </div>
                  <?php
                       }

                    }
                  ?> 
                  </div>  
                  <!-- Related Post -->
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
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/bootbox.min.js"></script>


  <!-- JQuery Map Plugin -->
  <!--
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.gmap.min.js"></script>    
  -->

  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/site-custom.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/code.js"></script>  
  </body>
</html>