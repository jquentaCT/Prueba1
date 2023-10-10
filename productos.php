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

$buscador = !empty($_POST['buscador']) ? $_POST['buscador'] : '';
$categoria = !empty($_POST['categoria']) ? $_POST['categoria'] : '';
$marca = !empty($_POST['marca']) ? $_POST['marca'] : '';
$buscador = clear_space(not_html_script(limpiar($buscador)));
$categoria = clear_space(not_html_script(limpiar($categoria)));
$marca = clear_space(not_html_script(limpiar($marca)));
$buscador = sanatize_var($buscador);
$categoria = sanatize_var($categoria);
$marca = sanatize_var($marca);
$encontro = 0;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    
    <title>Productos - Professional Service Support S.A.C. (PSS)</title>    
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
  <div class="slider bg-blue-light bg-scroll pos-rel breadcrumbs-page">
    <div class="container">
      <div class="breadcrumbs-description">
        <h1>Productos</h1>
        EQUIPOS DE INGENIERÍA / EQUIPOS MÉDICOS / SOFTWARE DE APLICACIÓN
      </div>
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">
   
        <section class="wide-tb-20">

          <div class="container pos-rel">
         
            <!-- FRANJA 1 -->
            <section class="wide-tb-50 pb-0 team-section-bottom pos-rel mb25">
              <div class="container">          
                
                <div class="pb-4">
                  <div class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0.1s">

                          <h3 class="h3-xl fw-6 txt-blue mb-4">PROFESSIONAL SERVICE SUPPORT S.A.C "PSS"</h3> 
                     
                          <p>Somos una Empresa que representa a fabricantes de equipos de Marcas reconocidas Mundialmente, con soporte.</p>
                           
                          <p>&nbsp;</p>

                          <div class="row">
                               <div class="col-lg-6"> 
                                    <strong>EQUIPOS DE INGENIERÍA</strong>
                                    <ul class="list-unstyled">
                                      <li><i class="icofont-simple-right"></i> <strong>Civil</strong> - Análisis  de:  Suelos,  Cemento,  Concreto,  Asfalto,  Agregados, Sísmica.</li>
                                      <li><i class="icofont-simple-right"></i> <strong>Minera</strong> - Análisis de: Suelos, Rocas, Concreto.</li>
                                      <li><i class="icofont-simple-right"></i> <strong>Mecánica</strong> - Oxidación, Dureza, Torsión.</li>
                                      <li><i class="icofont-simple-right"></i> <strong>Ambiental</strong> - Aguas (PH, presencia de sólidos en suspensión), Aceites (densidad).</li> 
                                      <li><i class="icofont-simple-right"></i> <strong>Mecánica de Fluidos</strong> - Bancos de trabajo y Prueba Hidraulica.</li> 
                                    </ul>          
                               </div>
                               <div class="col-lg-6">    
                                    <strong>EQUIPOS MÉDICOS</strong>
                                    <ul class="list-unstyled">
                                      <li><i class="icofont-simple-right"></i> Ciencias Bilógicas.</li>
                                      <li><i class="icofont-simple-right"></i> Atención Médica.</li>
                                      <li><i class="icofont-simple-right"></i> Biologia Molecular.</li>
                                      <li><i class="icofont-simple-right"></i> Biotecnologia.</li>
                                      <li><i class="icofont-simple-right"></i> Laboratorios de Investigación e Intrucción Educativa.</li>
                                    </ul>
                               </div>   
                          </div>  

                          <p>&nbsp;</p>  
              
                          <p>Somos Ingenieros y Técnicos capacitados en los EEUU y Europa para el mantenimiento según protocolo y ajuste para la calibración certificada.</p>
                          <p>Actualmente operamos en 3 zonas del Perú (Norte, Lima-Centro y Sur del País), donde estamos pendientes de todos nuestros actuales y potenciales clientes.</p>
                          
                          <strong>RUC: 20509797847 / Teléfono: (511) 606 6286</strong>                    
                  </div>              
                </div>
                
                <?php include 'html/carousel-productos.php'; ?>

              </div>
            </section>
            <!-- FIN DE FRANJA 1 -->
            
            <p>&nbsp;</p>

            <h3 class="h3-xl fw-6 txt-blue mb-4">BUSCADOR DE PRODUCTOS PSS</h3> 

            <!-- FORMULARIO DE BUSQUEDA -->
            <form action="./productos.php" method="post" autocomplete="off">

              <div class="mb-4">
                  <div class="row">
                      <div class="col-lg-9 mb10">
                          <div class="row">
                              <div class="col-md-2 mb10 lh38">
                                  <strong>Buscador:</strong>
                              </div>  
                              <div class="col-md-10 mb10">
                                <input type="text" name="buscador" class="form-control" placeholder="Código / nombre / descripción de productos" maxlength="100" value="<?php echo $buscador; ?>"/>
                                <?php echo !empty($e1) ? $e1 : ''; ?>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-2 mb10 lh38">
                                  <strong>Categoría:</strong>
                              </div>
                              <div class="col-md-10 mb10">
                                <select title="Lista de categorias" name="categoria" id="categoria" class="custom-select" aria-required="true" aria-invalid="false">
                                    <option value="0">- Seleccionar opción -</option>
                                    <?php
                                      $conectdata->set_listar("select idc, nombre from ".TABLE_PREFIX._TAB_CATP_SYS_." where mostrar='1' order by nombre asc",$categoria);
                                    ?>
                                </select>
                                <?php echo !empty($e2) ? $e2 : ''; ?>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-2 mb10 lh38">
                                  <strong>Marcas:</strong>
                              </div>
                              <div class="col-md-10 mb10">
                                <select title="Lista de marcas" name="marca" id="marca" class="custom-select" aria-required="true" aria-invalid="false">
                                    <option value="0">- Seleccionar opción -</option>
                                    <?php
                                      $conectdata->set_listar("select idm, nombre from ".TABLE_PREFIX._TAB_MARC_SYS_." where mostrar='1' order by nombre asc",$marca);
                                    ?>
                                </select>
                                <?php echo !empty($e3) ? $e3 : ''; ?>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 mb10 text-center">
                        <br>
                        <button name="contactoption" id="contactoption" type="submit" class="form-btn mx-auto btn-theme bg-blue-light w100">Buscar producto ahora <i class="icofont-rounded-right"></i></button>
                      </div>
                  </div>   
              </div>

              <br><br>
            
              <div id="js-grid-masonry" class="cbp">
                  <?php  
                  if(!empty($buscador)){
                    $sql = "select *, match (codigo,nombre,resumen,descripcion) against ('".$buscador."'') ";
                    $sql.= "from ".TABLE_PREFIX._TAB_PROD_SYS_." ";
                    $sql.= "where mostrar='1' and match (codigo,nombre,resumen,descripcion) against ('".$buscador."'') ";
                  }else{
                    $sql = "select * ";
                    $sql.= "from ".TABLE_PREFIX._TAB_PROD_SYS_." ";
                    $sql.= "where mostrar='1' ";
                  }
                  
                  if(!empty($marca) && $marca!='0'){ $sql.= "and marcas = ".$marca." "; }
                  if(!empty($categoria) && $categoria!='0'){ $sql.= "and FIND_IN_SET(".$categoria.",categorias) > 0 "; }

                  $row = $conectdata->set_list_table($sql);
                  if(count($row)==0){

                      if(!empty($buscador)){
                        $sql = "select * ";
                        $sql.= "from ".TABLE_PREFIX._TAB_PROD_SYS_." ";
                        $sql.= "where mostrar='1' and ";
                        $sql.= "(codigo like '%".$buscador."%' or nombre like '%".$buscador."%' or resumen like '%".$buscador."%' or descripcion like '%".$buscador."%') ";
                      }else{
                        $sql = "select * ";
                        $sql.= "from ".TABLE_PREFIX._TAB_PROD_SYS_." ";
                        $sql.= "where mostrar='1' ";
                      }

                      if(!empty($marca) && $marca!='0'){ $sql.= "and marcas = ".$marca." "; }
                      if(!empty($categoria) && $categoria!='0'){ $sql.= "and FIND_IN_SET(".$categoria.",categorias) > 0 "; }

                      $row = $conectdata->set_list_table($sql);
                      
                  }

                  if($encontro == 0){
                    $row = $conectdata->set_row_pagination($sql,12,$buscador);
                  }

                  $filas_count = 0;

                  ?>
                  <div class="row">
                  <?php

                  foreach($row as $key => $valor){
                      
                        $id_prod = $row[$key]['idp'];
                        $cod_prod = utf8_encode($row[$key]['codigo']);
                        $nom_prod = utf8_encode($row[$key]['nombre']);                     
                        $res_prod = utf8_encode($row[$key]['resumen']);
                        $ext_prod = utf8_encode($row[$key]['externo']);
                        $uex_prod = utf8_encode($row[$key]['url_externo']);
                        //$url_prod = trim($row[$key]['variable']);
                        if($ext_prod=='1'){ $url_prod = $uex_prod; }
                        else{ $url_prod = URL_SITE.'/detalle-producto.php?cvar='.$id_prod; }                  

                        $img_prod = 'images/productos/'.$row[$key]['imagen1'];
                        if(!empty($row[$key]['imagen1'])){
                            if (file_exists($img_prod) == false){ $img_prod = 'images/productos/no-disponible.jpg'; }         
                        }else{ $img_prod = 'images/productos/no-disponible.jpg'; }                  
                  ?>
                        <div class="cbp-item">
                            <div class="blog-warp text-justify">
                              
                              <div class="imglist">
                                <a href="<?php echo $url_prod; ?>"<?php if($ext_prod=='1'){ echo ' target="_blank"'; } ?> class="text-center"><img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo $img_prod; ?>" alt="" class="rounded" style="width:200px;"/></a>
                              </div>
                              
                              <div class="meta-box"><a href="javascript:void(0)">Código :</a> <span id="suc<?php echo $cod_prod; ?>" class="text-danger" style="display: inline-flex;"><?php echo $cod_prod; ?></span> </div>
                              <h4 class="h4-md mb-3"><a href="<?php echo $url_prod; ?>"><?php echo $nom_prod; ?></a></h4>
                              <p><?php echo $res_prod; ?></p>
                              <div class="text-center">
                                <?php if($ext_prod=='1'){ ?>
                                  <a href="<?php echo $url_prod; ?>" class="btn-theme bg-blue-light no-shadow mab_5" target="_blank">Visitar catálogo <i class="icofont-rounded-right"></i></a>                             
                                <?php }else{ ?> 
                                  <a href="<?php echo $url_prod; ?>" class="btn-theme bg-blue-light no-shadow mab_5">Ver más <i class="icofont-rounded-right"></i></a>
                                  <a href="javascript:void(0)" rel="<?php echo $cod_prod; ?>" class="btn-theme bg-orange no-shadow mab_5 cotiprod">Añadir <i class="icofont-listing-box"></i></a>
                                <?php } ?>                             
                              </div>   
                            </div>
                        </div>
                  <?php                       
                    $filas_count++;  
                  }
                  ?>
                  </div>

              </div>
            
              <br>
              <?php echo $conectdata->set_row_page(); ?>
            </form>
            <!-- FIN DE FORMULARIO DE BUSQUEDA -->
            <?php 
              if($filas_count==0){
                  echo '<div class="text-center"><img nonce="'._SYSTEM_NONCE_.' src="images/sin-resultados.png"/></div>';
              }        
            ?>
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
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/bootbox.min.js"></script>

  <!-- JQuery Map Plugin -->
  <!--
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.gmap.min.js"></script>
  -->

  <!-- Masonary Plugin -->
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.cubeportfolio.min.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/masonary-custom.js"></script>
  

  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/site-custom.js"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/code.js"></script>   
  </body>
</html>