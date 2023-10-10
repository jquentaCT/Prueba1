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
    
    <title>Servicios - Professional Service Support S.A.C. (PSS)</title>    
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
    
    <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="js/jquery.character-counter.min.js"></script>

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
        <h1>Servicios</h1>
        Mantenimiento Preventivo / Mantenimiento Correctivo / Calibracion Certificada
      </div>
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- Welcome To Cargo Start -->
    <section class="bg-white wide-tb-50">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
            <h1 class="heading-main">            
              NUESTROS SERVICIOS
            </h1>
          </div>
          <div class="col-sm-12">
              <h5 class="ct_3 ff_mb">Mantenimiento Predictivo y Preventivo</h5>
              <p><strong>Predictivo:</strong> Realizamos la constante supervisión del equipo en funcionamiento y en la prevención de averías.</p>
              <p><strong>Preventivo:</strong> Realizamos el Mantenimiento regular de acuerdo a calendario definido, independientemente de la condición del equipo.</p>

              <h5 class="ct_3 ff_mb">Mantenimiento Correctivo</h5>
              <p>Realizamos la reparación Técnica de equipos ante una avería, a fin de restaurar el activo a una condición en la que puede funcionar óptimamente por el servicio o la sustitución del mismo.</p>
              
              <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modal_lista_1">Ver listado</a> 
              <p>&nbsp;</p>

              <h5 class="ct_3 ff_mb">Calibración Certificada</h5>
              <p>Ajustamos los rangos y delegamos la calibración como proceso comparativo de los valores obtenidos por un patrón de medida certificada.</p>

              <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modal_lista_2">Ver listado</a>
          </div>          
        </div>
        <br>

        <div class="row"> 
         
          <div class="col-md-4 wow fadeInUp" data-wow-duration="0" data-wow-delay="0.1s">    
            <a href="javascript:void(0)">          
              <div class="icon-box-1">
                <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="images/entrega-via-terrestre.jpg" alt="">
                <div class="text">
                  <i class="icofont-vehicle-delivery-van"></i>
                  Entrega vía terrestre
                </div>
              </div>              
            </a>
          </div>
          
          <div class="col-md-4 wow fadeInUp" data-wow-duration="0" data-wow-delay="0.4s">
            <a href="javascript:void(0)">
              <div class="icon-box-1">
                <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="images/entrega-via-aerea.jpg" alt="">
                <div class="text">
                  <i class="icofont-airplane-alt"></i>
                  Entrega vía aérea
                </div>
              </div>
            </a>              
          </div>
          
          <div class="col-md-4 wow fadeInUp" data-wow-duration="0" data-wow-delay="0.6s">
            <a href="javascript:void(0)">          
              <div class="icon-box-1">
                <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="images/entrega-via-maritima.jpg" alt="">
                <div class="text">
                  <i class="icofont-ship"></i>
                  Entrega vía marítima
                </div>
              </div>    
            </a>          
          </div>

        </div>
      </div>
    </section>

    <p>&nbsp;</p>

    <?php include 'html/form-pedido-servicios.php'; ?>
   
    <p>&nbsp;</p>

    <section class="wide-tb-50 bg-gris pos-rel">
      <div class="container">
        <div class="row"> 
            <div class="col-sm-12 wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
              <h2 class="heading-main">NUESTROS CLIENTES</h2>
            </div>
            <div class="col-sm-12">
              <div class="owl-carousel owl-theme" id="home-clients">
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
                <div class="item bg-white">
                  <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/<?php echo $img_cli; ?>" alt="<?php echo $nom_cli; ?>">
                </div>
                <?php  
                    }
                ?>
              </div>
            </div>
        </div>
      </div>        
    </section>
    <!-- Clients End -->
  
  </main>

  <?php include 'html/footer-html.php'; ?>

  <?php include 'html/bottom-html.php'; ?>


<div class="modal fade" id="modal_lista_1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 90%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">MANTENIMIENTO PREVENTIVO / CORRECTIVO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
       <div class="row">
          <div class="col-lg-4">
            <ul>             
               <li>Abrasión</li>
               <li>Clasificación</li>
               <li>Tamizadores y Tamices</li>
               <li>Análisis de la Humedad</li>
               <li>Spliters Cortadores</li>
               <li>Gravedad Especifica</li>
               <li>Taladros</li>
               <li>Prueba de CBR</li>
               <li>Prueba de Color</li>
               <li>Compactación y Densidad</li>
               <li>Análisis de Humedad</li>
               <li>Cono Dinámico</li>
               <li>Penetrometro</li>
               <li>Prueba de carga de Placa</li>
               <li>Sondas</li>
               <li>Muestredores</li>
               <li>Paletas de Corte</li> 
               <li>Análisis de Agua</li>
               <li>Densímetro nuclear</li>
               <li>Densímetro Eléctrico</li>
               <li>Deflectómetro</li>
               <li>Triaxial Estático</li>
               <li>Triaxial Dinámico</li>
               <li>Equipo de Corte Directo</li>
               <li>Consolidometro</li>
               <li>Celdas de Carga</li>
               <li>Software</li>
               <li>Medidores de Aire</li>
               <li>Resistencia de Uniones y pruebas de Anclaje</li>
               <li>Corrosión</li>
               <li>Monitores de Grietas</li>
               <li>Pruebas de Cubo</li>
               <li>Pruebas de Cilindro</li>
               <li>Pruebas de Flexión</li>
               <li>Pruebas de Congelamiento y Descongelamiento</li>
               <li>Georadar</li>
               <li>Prueba de Farguado</li>
               <li>Blane</li>
               <li>Mezcladores</li>
               <li>Localizadores de barras de esfuerzo</li>
               <li>Resistividad</li>
               <li>Hormigón autoconsolidante</li>
               <li>Prueba de fijación del tiempo</li>
               <li>Prueba de Fuerza</li>
               <li>Prueba de Ultrasonido</li>
               <li>Unidad de Peso</li>
               <li>Impermeabilidad</li>
               <li>Calorímetro</li>
               <li>Máquina de Ensayo Universal</li>
               <li>Máquina de Ensayo Universal Hidráulica</li>
               <li>Máquina de Prueba de Impacto</li>
               <li>Máquina de Fluencia y Ruptura</li>
               <li>Máquina de Compresión</li> 
               <li>Máquina de Prueba Mecánica</li>
               <li>Máquina de Torsión</li>
               <li>Máquina de doblado</li>
               <li>Máquina de Ahuecamiento</li>
               <li>Máquina de Fricción</li>
               <li>Probadores de Dureza</li>
               <li>Extensómetros - Personalizados, Axiales, de roca, concreto, transversales</li>
               <li>Deflectómetros</li>
               <li>Mecanismo de Clip-on</li>
               <li>Probadores de dureza</li>
            </ul>
            <ol>
                <li>Reactividad Alcalina</li>
                <li>Blaine</li>
                <li>Calorímetro</li>
                <li>Autoclaves de Cemento</li>
                <li>Tiempo de Fraguado</li>
                <li>Mezcladora de Mortero</li>
                <li>Abrasión de Ruedas</li>
                <li>Prueba de Arena</li>
                <li>Retención de Agua de cemento</li>
                <li>Extracción de Aglutinante</li>
                <li>Extracción de Solventes</li>
                <li>Reciclaje de Solventes</li>
            </ol>
            <ul>
                <li>Balanzas</li> 
                <li>Sistema automatizado de extracción en fase sólida</li>
                <li>Cromatografía de Gases</li>
                <li>GC-MS</li>
                <li>HPLC</li>
                <li>Hidrómetros</li>
                <li>Cromatografía de Ion</li>
                <li>Sistema Kjendahl</li>
                <li>LC-MS</li>
                <li>Cromatografía de Líquidos</li>
                <li>Contador de Partículas</li>
                <li>Analizador de Tamaño de Particulas</li>
                <li>Polarímetro</li>                                
            </ul>    
          </div>
          <div class="col-lg-4">              
            <ul>
                <li>Refractómetro</li>
                <li>Extractor de partículas Solidas</li>
                <li>Analizador TOC</li>
                <li>Extractor de partículas Solidas</li>
                <li>Analizador TOC</li>
                <li>Espectro meter</li>
                <li>Espectro fotómetro</li>
                <li>Analizador de Aire</li>
                <li>Analizadores de Mezcla</li>
                <li>Analizadores de Azufre</li>
                <li>Fijadores de Gases</li>
                <li>Fijadores de gases Infrarrojos</li>
                <li>Detectores de Gases</li>
                <li>Analizadores Halógenos de Humedad</li>
                <li>Analizadores Multi- de Gases</li>
                <li>Evaporador de Nitrógeno</li>
                <li>Analizadores de Nitrógeno y Oxigeno</li>
                <li>Analizadores de Minerales</li>
                <li>Bomba Peristáltica</li>
                <li>Analizadores de metales preciosos</li>
                <li>Analizadores de RoHS</li>
                <li>Cabinas de Seguridad de contaminantes</li>
                <li>Analizador portátil de Gases</li>
                <li>Analizador de Metales Solidos</li>
                <li>Cámara de Pruebas</li>
                <li>Analizador de Gases de pared</li>
                <li>Cabina de Bioseguridad</li>
                <li>Cabina de lavado por flujo de aire</li>
                <li>Extractor de Humo</li>
                <li>Cabinas Extractoras de Gases</li>
                <li>Caja de Guantes</li>
                <li>Cabina de Flujo Laminar</li>
                <li>Sistema exclusa</li>
                <li>Cabina de distribución de muestras</li>
                <li>Autoclaves de Frontera</li>
                <li>Baño Maria recirculante</li>
                <li>Aparato de Digestión</li>
                <li>Hornos</li>
                <li>Manta de Calentamiento</li>
                <li>Plato de Calentamiento</li>
                <li>Plato de Calentamiento con agitador magnético</li>
                <li>Incubadoras</li>
            </ul>
            <ol>
              <li>Muflas</li>
              <li>Batería de mantas Soxhlet de agua</li>
              <li>Esterilizador</li>
              <li>Batería térmica de Aceite</li>
            </ol>
            <ul>
               <li>Batería térmica de arena</li>
               <li>Medidor de Monóxido de Carbono</li>
               <li>Termómetro de contacto</li>
               <li>Termo Hidrómetro Digital</li>
               <li>Analizadores Ambientales</li>
               <li>Termómetros IR</li>
               <li>Medidores laser a distancia</li>
               <li>Medidores Ambientales de bolsillo</li>
               <li>Medidores de Humedad</li>
               <li>Analizadores de Humedad</li>
               <li>Banco de Pruebas de Conductividad</li>
               <li>Banco de Pruebas de Turbiedad</li>
               <li>Medidor de Clorinidad</li>
               <li>Termo Reactor COD</li>
               <li>Probador de Salinidad portátil</li>
               <li>Medidor de bolsillo ORP</li>
               <li>PH Metro</li>
               <li>PH Metro de Bolsillo</li>
               <li>Probador de TDS de Bolsillo</li>
               <li>Probador de Turbidez Portátil</li>
               <li>Turbidimetro</li>
               <li>Banco Refrigerado de Sangre</li>
               <li>Congelador de Plasma</li>
               <li>Incubadora de Plaquetas de Sangre</li>
               <li>Enfriador</li>
               <li>Almacén refrigerado</li>
               <li>Baño de frio</li>
               <li>Congelador</li>
               <li>Fábrica de Hielo</li>
               <li>Refrigerador Farmacéutico</li>
               <li>Recirculador Refrigerado</li>
               <li>Tinción de inmunohistoquímica automatizada</li>
               <li>Impresoras de Procesos de Análisis</li>
               <li>Campana Extractora Inteligente</li>
               <li>Micrótomo</li>
               <li>Cortadora perfiladora de bloques de parafina</li>
               <li>Dispensador de Parafina</li>
               <li>Gabinete de almacenamiento de diapositivas de secado de patología</li>
               <li>Gabinete de almacenamiento de bloks de secado de patología</li>
               <li>Gabinete de almacenaje de patología</li>
               <li>Impresora de diapositivas</li>               
            </ul>   
          </div>
          <div class="col-lg-4">
            <ul>
               <li>Sistema Analizador de tejidos, Platina en frio y caliente</li>
               <li>Baño de flotación de tejidos</li>
               <li>Procesador de tejidos de recipientes Giratorios</li>             
               <li>Procesador de análisis de tejido</li>
               <li>Gabinete de muestra de acero inoxidable ventilado</li>
               <li>Baño de agua y secador de diapositivas</li>
               <li>Acelerador de los iones para pruebas de Corrosión</li>
               <li>Pruebas de Emisión de Aire</li>
               <li>Pruebas puntuales de contenido de Anilina</li>
               <li>Prueba de Contenido de la Ceniza</li>
               <li>Probador de Punto de Auto Ignición</li>
               <li>Probador de Niebla y Flujo vertido Automático</li>
               <li>Medidor de puntos de fusión Automático</li>
               <li>Medidor de puntos de acidez del aceite Automático</li>
               <li>Aparato de Residuos de Carbono</li>
               <li>Analizador de Cetano</li>
               <li>Analizador de contenido de cloro</li>
               <li>Medidor del Comportamiento en Frio</li>
               <li>Probador de la Corrosión</li>
               <li>probador de contenido de azufre de petróleo oscuro</li>
               <li>Probador de punto de rocío</li>
               <li>Pruebas de Destilación</li>
               <li>Pruebas de puntos de Caída</li>
               <li>Baterías de prueba de perdida de evaporación</li>
               <li>Pruebas de Existencia de plásticos</li>
               <li>Pruebas de destello</li>
               <li>Aparato indicador de absorción con fluorescencia</li>
               <li>Probador de las características de la espuma</li>
               <li>Probador de Aceites para engranajes</li>
               <li>Tensiómetro Interfasial</li>
               <li>Titulador Karl Fischer</li>
               <li>Baterías para analizar la viscosidad cinemática</li>
               <li>Analizador para Analizar la impureza Mecánica</li>
               <li>Analizador de Multi Procesos</li>
               <li>Analizador de Octanaje</li>
               <li>Pruebas de Octanaje y Cetano</li>
               <li>Probador de Anti Emulsión del Aceite</li>
               <li>Batería de Aceite</li>
               <li>Probador dieléctrico de aceite</li>
               <li>Probador de fusión del aceite</li>
               <li>Probador de la estabilidad de la oxidación</li>
               <li>Calorímetro con bomba de Oxigeno</li>
               <li>Penetro metro</li>
               <li>Probador de densidad del Petróleo</li>
               <li>Batería de prueba de presión de vapor</li> 
               <li>Analizador de contenidos de sales</li>
               <li>Aparato de extracción de sedimentos</li>
               <li>Probador de puntos de Smoke</li>
               <li>Probador de sulfuro</li>
               <li>Probador de TAN y TBN</li>
               <li>Probador de Tribologia</li>
               <li>Sistema automatizado de hemocultivo</li>
               <li>Esterilizador de Azas</li>
               <li>Molino Laminador de Bolas</li>
               <li>Centrifuga</li>
               <li>Contador de Colonias</li>
               <li>Cabina de Secado</li>
               <li>Fermentador</li>
               <li>Reactor de Vidrio</li>
               <li>Sistema de limpieza GPC</li>
               <li>Homogeneizador</li>
               <li>Inspisator</li>
               <li>Pruebas con Jarra 
               <li>Agitadores de Laboratorio</li>
               <li>Muestra de aire microbiano</li>
               <li>Sistema de digestión por microondas</li>
               <li>Reactor por Microondas</li>
               <li>Sintetizador microondas</li>
               <li>Estación de trabajo de microondas</li>
               <li>Mezcladores y Vórtice</li>
               <li>Agitador Aéreo</li>
               <li>Estación de Trabajo para patología</li>
               <li>Muestre ador de polvo portátil</li>
               <li>Evaporador Rotatorio</li>
               <li>Concentrador de Muestras</li>
               <li>Cabina Germinadora</li>
               <li>Mezcladora estomacher</li>
               <li>Analizador de la viscosidad sanguínea</li>
               <li>Medidor de Grasas</li>
               <li>Probador de desintegración</li>
               <li>Pruebas de Disolución</li>
               <li>Analizador de la textura</li>
               <li>Probador de parámetros de las tabletas</li>
               <li>Pruebas de disolución</li>
               <li>Aparato de disolución de la parafina</li>
               <li>Probador de la fiabilidad de las tabletas</li>
               <li>Probador de la dureza de las tabletas</li>
               <li>Mezcladora en V</li>
            </ul>
          </div>
       </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_lista_2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">CALIBRACIONES CERTIFICADAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <strong>Magnitudes</strong><br>
          <ul>
            <li>Masa</li>     
            <li>Presión -Fuerza</li>
            <li>Volumen-Densidad</li>  
            <li>Temperatura</li>
            <li>Electricidad</li>   
            <li>Longitud</li>
            <li>Optica</li>      
            <li>Flujo,  entre otros</li>
          </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>


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

  <!-- JQuery Map Plugin -->
  <!--
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" type="text/javascript" src="<?php echo URL_SITE; ?>/js/jquery.gmap.min.js"></script>
  -->    
  <script nonce="<?php echo _SYSTEM_NONCE_; ?>" src="<?php echo URL_SITE; ?>/js/site-custom.js"></script>  

  </body>
</html>