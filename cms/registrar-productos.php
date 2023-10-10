<?php
ob_start();
include '../class/class_process.php';
no_cache();
no_ataques_xss();
$conectdata = new Proceso();
$conectdata::start();
$conectdata->start_default();
$conectdata->start_upload();
$conectdata->session_interna();

$PanelModulo = 'm1';
include 'html/html-modulo.php';

$codigogd = !empty($_POST['codigogd']) ? $_POST['codigogd'] : '';
$nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';
$url = !empty($_POST['url']) ? $_POST['url'] : '';
$resumen = !empty($_POST['resumen']) ? $_POST['resumen'] : '';
$contenido = !empty($_POST['contenido']) ? $_POST['contenido'] : '';
$marca = !empty($_POST['marca']) ? $_POST['marca'] : '';
$list_categoria1 = !empty($_POST['list_categoria1']) ? $_POST['list_categoria1'] : '';
$list_categoria2 = !empty($_POST['list_categoria2']) ? $_POST['list_categoria2'] : '';
$precio = !empty($_POST['precio']) ? $_POST['precio'] : '';
$stock = !empty($_POST['stock']) ? $_POST['stock'] : '';
$etiquetas = !empty($_POST['etiquetas']) ? $_POST['etiquetas'] : '';

$tmp_name = !empty($_FILES['imagen1']['tmp_name']) ? $_FILES['imagen1']['tmp_name'] : '';
$name = !empty($_FILES['imagen1']['name']) ? $_FILES['imagen1']['name'] : '';
$size = !empty($_FILES['imagen1']['size']) ? $_FILES['imagen1']['size'] : '';
$type = !empty($_FILES['imagen1']['type']) ? $_FILES['imagen1']['type'] : '';
$error = !empty($_FILES['imagen1']['error']) ? $_FILES['imagen1']['error'] : '';

$mostrar = !empty($_POST['mostrar']) ? $_POST['mostrar'] : '';
$carrusel = !empty($_POST['carrusel']) ? $_POST['carrusel'] : '';
$externa = !empty($_POST['externa']) ? $_POST['externa'] : '';
$url_externa = !empty($_POST['url_externa']) ? $_POST['url_externa'] : '';
$action = !empty($_POST['action']) ? $_POST['action'] : '';

$codigogd = htmlspecialchars(clear_space(not_html_script($codigogd)));
$codigogd = mb_strtoupper($codigogd);
$nombre = htmlspecialchars(clear_space(not_html_script($nombre)));
$url = clear_space(not_html_script(limpiar($url)));
$url = clear_string_ii($url);
$resumen = htmlspecialchars(clear_space(not_html_script($resumen)));
$contenido = not_script($contenido);
$marca = clear_space(not_html_script(limpiar($marca)));
if(empty($list_categoria1)){ $list_categoria1 = array(); }
if(empty($list_categoria2)){ $list_categoria2 = array(); }
$precio = clear_space(not_html_script(limpiar($precio)));
$stock = clear_space(not_html_script(limpiar($stock)));
$etiquetas = clear_space(not_html_script(limpiar($etiquetas)));
$mostrar = clear_space(not_html_script(limpiar($mostrar)));
$carrusel = clear_space(not_html_script(limpiar($carrusel)));
$externa = clear_space(not_html_script(limpiar($externa)));
$url_externa = clear_space(not_html_script(limpiar($url_externa)));
$action = clear_space(not_html_script(limpiar($action)));
$encontro = '0';

if( !empty($action) ){
    
    if( strlen($codigogd) <=2 ){ $e0 = '(*) Ingrese el código del producto ( 0-9, A-Z ,- ).'; $encontro = 1; }
    else{
        if(alfanumber_code($codigogd) == '_INCORRECTO_'){ $e0 = '(*) Prohibido caracteres extra&ntilde;os.'; $encontro = 1; }
    }

    if( strlen($nombre) <=2 ){ $e1 = '(*) Ingrese su nombre completo.'; $encontro = 1; }
    else{
        if(caracteres_special($nombre) == '_INCORRECTO_'){ $e1 = '(*) Prohibido caracteres extra&ntilde;os.'; $encontro = 1; }
    }  

    if( strlen($url) <=2 ){ $e2 = '(*) Ingrese la URL'; $encontro = 1; }
    else{
        if(caracteres($url) == '_INCORRECTO_'){ $e2 = '(*) Formato incorrecto.'; $encontro = 1; }
    }
      
    if( strlen($resumen) <=2 ){ $e3 = '(*) Ingrese el resumen del producto.'; $encontro = 1; }
    else{
        if(caracteres_area($resumen) == '_INCORRECTO_'){ $e3 = '(*) Prohibido caracteres extra&ntilde;os.'; $encontro = 1; }
    }

    if( strlen($contenido) <=2 ){ $e4 = '(*) Ingrese el contenido del producto.'; $encontro = 1; }

    if(empty($marca) or $marca=='0'){ $e11 = '(*) Seleccione una MARCA.'; $encontro = 1; }
    
    if(count($list_categoria2)==0){ $e5 = '(*) Seleccione al menos uno.'; $encontro = 1; }
    else{       
        for($i=0;$i<count($list_categoria2);$i++){           
           if(onlynumbers($list_categoria2[$i])=='_INCORRECTO_'){ 
             $e5 = '(*) C&oacute;digo con formato incorrecto'; $encontro = 1;
             break; 
           }
        }
    }    
    
    if( strlen($precio) ==0 ){ $e6 = '(*) Ingrese el precio.'; $encontro = 1; }
    else{
        if(onlydecimal($precio) == false){ $e6 = '(*) Formato incorrecto.'; $encontro = 1; }
    }

    if( strlen($stock) ==0 ){ $e7 = '(*) Ingrese la cantidad.'; $encontro = 1; }
    else{
        if(onlynumbers($stock) == '_INCORRECTO_'){ $e7 = '(*) Formato incorrecto.'; $encontro = 1; }
    }    

    if( strlen($etiquetas) == 0 ){ $e8 = '(*) Ingrese sus etiquetas.'; $encontro = 1; }
    else{
        if(caracteres_special($etiquetas) == '_INCORRECTO_'){ $e8 = '(*) Prohibido caracteres extra&ntilde;os.'; $encontro = 1; }
    }
    
    $new_file = '';
    if( strlen(trim($name)) > 0 ){
        if ($error != UPLOAD_ERR_NO_FILE){
          if( ver_archivo($size,$type) == '_CORRECTO_' ){
             $ext = explode(".",strtolower($name));
             $ext = end($ext);
             $new_file = uniqid().'.'.$ext;
          }else{
             $e9 = '(*) La imagen NO cumple con el formato establecido.';
             $encontro = '1';
          }
        }
    }

    if( $externa == 1 ){ 
        if( strlen($url_externa) < 10 ){ $e10 = '(*) Ingrese la URL externa completa.'; $encontro = 1; }        
    }else{
        $url_externa = '';
    }

}    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Panel Administrativo - Professional Service Support S.A.C. (PSS)</title>

    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">

    <link href="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
   
    <link href="assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/html5-editor/bootstrap-wysihtml5.css" rel="stylesheet" />
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">    

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/jquery.character-counter.min.js"></script>

    <link href="assets/plugins/icheck/skins/all.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header card-no-border">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">

        <?php include 'html/html-header.php'; ?>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
               <?php include 'html/html-user-profile.php'; ?>
               <?php include 'html/html-menu-left.php'; ?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">REGISTRAR PRODUCTO</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item">M&oacute;dulos</li>
                        <li class="breadcrumb-item active">Productos</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>

            <div class="container-fluid">

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">       
                        <a href="./lista-productos.php" class="btn waves-effect waves-light btn-rounded btn-sm btn-outline-info mb10 plr" role="button">VER LISTA DE PRODUCTOS &nbsp;<i class="icon-control-forward"></i></a>
                        <div class="card card-outline-info">

                            <div class="card-header">
                              <h4 class="m-b-0 text-white">Formulario</h4>
                            </div>

                            <div class="card-body">
                                <?php 
                                if( !empty($action) ){
                                    
                                    if($encontro == '0'){  
                                         
                                         sort($list_categoria2);                                       
                                         $valor_categoria = implode(",",$list_categoria2);
                                         
                                         $variables[0] = $codigogd;
                                         $variables[1] = $nombre;
                                         $variables[2] = $url;
                                         $variables[3] = $resumen;
                                         $variables[4] = $contenido;
                                         $variables[5] = $marca;                                       
                                         $variables[6] = $valor_categoria;
                                         $variables[7] = $precio;                                        
                                         $variables[8] = $stock;                                        
                                         $variables[9] = $etiquetas;
                                         $variables[10] = $new_file;
                                         $variables[11] = $mostrar;
                                         $variables[12] = $carrusel;
                                         $variables[13] = $externa;
                                         $variables[14] = $url_externa;                                        
                                                                          
                                         $p = $conectdata->set_grabar_productos($variables);                                                                                 
                                         if($p==true){

                                              if(!empty($new_file)){
                                                   $ruta = '../images/productos';
                                                   move_uploaded_file($tmp_name,$ruta.'/'.$new_file);
                                                   crear_miniaturas($ruta."/".$new_file, "250", "0", $ruta."/tb_".$new_file);
                                                   list($w1, $h1, $type1, $attr1) = getimagesize($ruta.'/'.$new_file);
                                                   if( $w1 > 439 ){
                                                     crear_miniaturas($ruta."/".$new_file, "439", "0", $ruta."/".$new_file);
                                                   }
                                              }
                                              
                                              echo '<div class="alert alert-success">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                              <h4><i class="fa fa-check-circle"></i> Confirmado</h4>
                                              Los datos fueron registrados correctamente.
                                              </div>';

                                              $codigogd = '';
                                              $nombre = '';
                                              $url = '';
                                              $resumen = '';
                                              $contenido = '';
                                              $marca = '0';                                            
                                              unset($list_categoria1);
                                              unset($list_categoria2);
                                              $precio = '';                                              
                                              $stock = ''; 
                                              $etiquetas = '';                                           
                                              $imagen = '';                                              
                                              $mostrar = '1';
                                              $carrusel = '1';
                                              $externa = '1';
                                              $url_externa = '';

                                         }elseif($p==false){
                                              echo '<div class="alert alert-danger">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                              <h4><i class="icon fa fa-ban"></i> Mensaje de alerta</h4>
                                              El nombre o la URL ya se encuentra registrado, por favor verificar.
                                              </div>'; 
                                         } 
                                                                             

                                    }    

                                 }
                                ?>
                                <h4 class="card-title">Importante:</h4>
                                <h6 class="card-subtitle">No conectarse a trav&eacute;s de Wifi compartido al p&uacute;blico</h6>

                                <form class="form p-t-20" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                 
                                  <div class="row">
                                      <div class="col-md-3">
                                        <div class="form-group<?php if(!empty($e0)){echo ' has-danger';} ?>">
                                            <label for="input_codigogd">Código: <span class="text-danger">(*)</span></label>                                          
                                            <input type="text" name="codigogd" class="form-control" id="input_codigogd" maxlength="15" value="<?php echo $codigogd; ?>" placeholder="Código del producto">
                                            <small class="form-control-feedback"><?php echo !empty($e0) ? $e0 : ''; ?></small>
                                        </div>
                                      </div>  
                                  </div>    

                                  <div class="form-group<?php if(!empty($e1)){echo ' has-danger';} ?>">
                                      <label for="input_nombre">Nombre: <span class="text-danger">(*)</span></label>                                          
                                      <input type="text" name="nombre" class="form-control" id="input_nombre" maxlength="80" value="<?php echo $nombre; ?>" placeholder="Nombre completo">
                                      <small class="form-control-feedback"><?php echo !empty($e1) ? $e1 : ''; ?></small>
                                  </div>

                                  <div class="form-group<?php if(!empty($e2)){echo ' has-danger';} ?>">
                                      <label for="input_alias">URL amigable: <span class="text-danger">(*)</span></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1"><?php echo URL_SITE; ?>/</span>
                                          </div>
                                          <input type="text" class="form-control" name="url" value="<?php echo $url; ?>" id="input_alias" aria-describedby="basic-addon3">
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e2) ? $e2 : ''; ?></small>
                                  </div>

                                  <div class="form-group<?php if(!empty($e3)){echo ' has-danger';} ?>">
                                      <label for="text_resumen">Resumen: <span class="text-danger">(*)</span></label>
                                      <textarea name="resumen" class="form-control alert-info" id="text_resumen" rows="5" placeholder="Ingrese el resumen" maxlength="450"><?php echo $resumen; ?></textarea>
                                      <small class="form-control-feedback"><?php echo !empty($e3) ? $e3 : ''; ?></small>
                                      <script type="text/javascript">
                                            $('#text_resumen').characterCounter({
                                                maxlength: 450,
                                                blockextra: true
                                            });
                                      </script>
                                  </div>

                                  <div class="form-group<?php if(!empty($e4)){echo ' has-danger';} ?>">
                                      <label for="text_cont">Contenido: <span class="text-danger">(*)</span></label>
                                      <textarea name="contenido" class="textarea_cont form-control alert-info" id="text_cont" rows="15" placeholder="Ingrese el contenido completo"><?php echo $contenido; ?></textarea>
                                      <small class="form-control-feedback"><?php echo !empty($e4) ? $e4 : ''; ?></small>                                     
                                  </div>

                                  <div class="form-group<?php if(!empty($e11)){echo ' has-danger';} ?>">
                                      <label for="select_marca">Marca: <span class="text-danger">(*)</span></label>
                                      <div class="input-group">
                                          <select name="marca" class="selectpicker m-b-20 m-r-10" id="select_marca" data-style="btn-danger">
                                              <option data-tokens="seleccionar" value="0">- Seleccionar la Marca -</option>
                                              <?php                                              
                                                $conectdata->set_listar('select idm, nombre from '.TABLE_PREFIX._TAB_MARC_SYS_.' order by nombre asc',$marca); 
                                              ?>                                             
                                          </select>
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e11) ? $e11 : ''; ?></small>
                                  </div>
      
                                  <div class="style-select form-group<?php if(!empty($e5)){echo ' has-danger';} ?>">          
                                        <?php if(count($list_categoria2)>0){ $lista = implode(",",$list_categoria2); } ?>
                                        <div class="subject-info-box-1">                
                                          <label class="control-label" for="list_genero1">Categorías: <span class="text-danger">(*)</span></label>
                                          <select name="list_categoria1[]" multiple class="form-control" id="list_categoria1">                  
                                            <?php 
                                                if(count($list_categoria2)==0){ $line = "select * from ".TABLE_PREFIX._TAB_CATP_SYS_." order by nombre asc"; }
                                                else{ $line = "select * from ".TABLE_PREFIX._TAB_CATP_SYS_." where idc not in(".$lista.") order by nombre asc"; }
                                                $row = $conectdata->set_list_array($line); 
                                                foreach($row as $key => $valor){                     
                                                  echo '<option value="'.$row[$key]['0'].'">'.utf8_encode($row[$key]['1']).'</option>';                   
                                                }
                                            ?>               
                                          </select>     
                                        </div>

                                        <div class="subject-info-arrows text-center">
                                            <br /><br />
                                            <input type='button' id='btnAllRight' value='>>' class="btn btn-default" /><br />
                                            <input type='button' id='btnRight' value=' > ' class="btn btn-default" /><br />
                                            <input type='button' id='btnLeft' value=' < ' class="btn btn-default" /><br />
                                            <input type='button' id='btnAllLeft' value='<<' class="btn btn-default" />
                                        </div>

                                        <div class="subject-info-box-2">               
                                            <label>Seleccionados :</label>
                                            <select name="list_categoria2[]" multiple class="form-control" id="list_categoria2">
                                             <?php
                                                if(count($list_categoria2)>0){  
                                                    $sql = "select * from ".TABLE_PREFIX._TAB_CATP_SYS_." where idc in(".$lista.")";                    
                                                    $row = $conectdata->set_list_array($sql); 
                                                    foreach($row as $key => $valor){
                                                      echo '<option value="'.$row[$key]['0'].'" selected>'.utf8_encode($row[$key]['1']).'</option>';                   
                                                    }
                                                }  
                                             ?>
                                            </select>               
                                        </div>
                                        <div class="clearfix"></div>
                                        <small class="form-control-feedback"><?php echo !empty($e5) ? $e5 : ''; ?></small>                                               
                                  </div>                                  

                                  <div class="form-group<?php if(!empty($e6)){echo ' has-danger';} ?>">
                                      <label for="precio">Precio: <span class="text-danger">(*)</span></label>                                          
                                      <input type="text" name="precio" class="form-control" id="precio" maxlength="15" value="<?php echo $precio; ?>" placeholder="0.00">
                                      <small class="form-control-feedback"><?php echo !empty($e6) ? $e6 : ''; ?></small>
                                  </div> 

                                  <div class="form-group<?php if(!empty($e7)){echo ' has-danger';} ?>">
                                      <label class="control-label">Stock actual: <span class="text-danger">(*)</span></label>
                                      <input id="stock" type="text" value="<?php echo $stock; ?>" name="stock" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" maxlength="10" onkeypress="return valnumero(event)" placeholder="0"/>
                                      <small class="form-control-feedback"><?php echo !empty($e7) ? $e7 : ''; ?></small>
                                  </div>
                                  
                                  <div class="form-group<?php if(!empty($e8)){echo ' has-danger';} ?>"> 
                                      <label for="input_tags">Etiquetas: <span class="text-danger">(*) <span style="font-size: 13px;">si adiciona TAGS hacer clic en ENTER</span></span></label><br>
                                      <input type="text" name="etiquetas" value="<?php echo $etiquetas; ?>" id="input_tags" data-role="tagsinput" placeholder="Añadir etiquetas">
                                      <small class="form-control-feedback"><?php echo !empty($e8) ? $e8 : ''; ?></small>
                                  </div>
                                 
                                  <div class="row">
                                      <div class="col-lg-12">                                   
                                          <div class="card form-group<?php if(!empty($e9)){echo ' has-danger';} ?>">
                                              <div class="card-body" style="padding: 0px">
                                                  <label for="file_img1"><strong>Imagen:</strong></label>
                                                  <input type="file" name="imagen1" id="file_img1" class="dropify" />
                                              </div>
                                              <small class="form-control-feedback"><?php echo !empty($e9) ? $e9 : ''; ?></small>
                                              <span class="help-block text-primary"><small><strong>RECOMENDADO: ancho 439px y alto 439px</strong></small></span>
                                          </div> 
                                      </div>
                                  </div>  

                                  <div class="form-group">
                                    <label><strong>Publicar:</strong></label>
                                    <div class="input-group">
                                      <ul class="icheck-list form-check-inline">
                                          <li>
                                              <input type="radio" class="check" id="mostrar1" name="mostrar" value="1" data-radio="iradio_square-red"<?php if(empty($mostrar) or $mostrar=='1'){echo ' checked';} ?>>
                                              <label for="mostrar1"><strong>SI</strong>, deseo que se publique &nbsp;</label>
                                          </li>
                                          <li>
                                              <input type="radio" class="check" id="mostrar2" name="mostrar" value="2" data-radio="iradio_square-red"<?php if($mostrar=='2'){echo ' checked';} ?>>
                                              <label for="mostrar2"><strong>NO</strong>, deseo que se publique &nbsp;</label>
                                          </li>
                                      </ul>
                                     </div>
                                  </div>

                                  <div class="form-group">
                                    <label><strong>Producto destacado:</strong></label>
                                    <div class="input-group">
                                      <ul class="icheck-list form-check-inline">
                                          <li>
                                              <input type="radio" class="check" id="carrusel1" name="carrusel" value="1" data-radio="iradio_square-red"<?php if($carrusel=='1'){echo ' checked';} ?>>
                                              <label for="carrusel1"><strong>SI</strong> &nbsp;</label>
                                          </li>
                                          <li>
                                              <input type="radio" class="check" id="carrusel2" name="carrusel" value="2" data-radio="iradio_square-red"<?php if(empty($carrusel) or $carrusel=='2'){echo ' checked';} ?>>
                                              <label for="carrusel2"><strong>NO</strong> &nbsp;</label>
                                          </li>
                                      </ul>
                                     </div>
                                  </div> 

                                  <div class="form-group">
                                    <label><strong>Mostrar como URL externa:</strong></label>
                                    <div class="input-group">
                                      <ul class="icheck-list form-check-inline">
                                          <li>
                                              <input type="radio" class="check" id="externa1" name="externa" value="1" data-radio="iradio_square-red"<?php if($externa=='1'){echo ' checked';} ?>>
                                              <label for="externa1"><strong>SI</strong> &nbsp;</label>
                                          </li>
                                          <li>
                                              <input type="radio" class="check" id="externa2" name="externa" value="2" data-radio="iradio_square-red"<?php if(empty($externa) or $externa=='2'){echo ' checked';} ?>>
                                              <label for="externa2"><strong>NO</strong> &nbsp;</label>
                                          </li>
                                      </ul>
                                     </div>
                                  </div>

                                  <div class="form-group<?php if(!empty($e10)){echo ' has-danger';} ?>">
                                      <label for="input_externa"><strong>URL externa:</strong></label>                                          
                                      <input type="text" name="url_externa" class="form-control" id="input_externa" maxlength="250" value="<?php echo $url_externa; ?>" placeholder="URL completa">
                                      <small class="form-control-feedback"><?php echo !empty($e10) ? $e10 : ''; ?></small>
                                  </div>                        
                                  
                                  <input type="hidden" name="action" value="send"/>
                                  <button type="submit" class="btn btn-info waves-effect waves-light m-r-10"><i class="fa fa-check"></i> Registrar producto</button>
                                  <button type="reset" class="btn btn-danger waves-effect waves-light"><i class="fa fa-times"></i> Cancelar</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->

                <!-- .right-sidebar -->
                <?php include 'html/html-right-sidebar.php'; ?>

            </div>

            <?php include 'html/html-footer.php'; ?>

        </div>

    </div>
  

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

    <script src="assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script type="text/javascript">
       jQuery(document).ready(function(){
           var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
           $('.js-switch').each(function() {
               new Switchery($(this)[0], $(this).data());
           });

           $('.selectpicker').selectpicker();
       });
    </script>

    <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <!-- imagen -->
    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
    <!-- imagen -->

    <!-- tables -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <!-- tables -->

    <!-- wysuhtml5 Plugin JavaScript -->
    <!--
    <script src="assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
    <script>
    $(document).ready(function() {
        $('#text_cont').wysihtml5();
    });
    </script>
    -->
    <!-- wysuhtml5 Plugin JavaScript -->

    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="assets/plugins/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        if ($("#text_cont").length > 0) {
            tinymce.init({
                selector: "textarea#text_cont",
                theme: "modern",
                height: 400,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>

    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
   
    <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>
    <script src="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- icheck -->
    <script src="assets/plugins/icheck/icheck.min.js"></script>
    <script src="assets/plugins/icheck/icheck.init.js"></script>

    <script type="text/javascript">
    jQuery(document).ready(function() {
        $("input[name='stock']").TouchSpin();                    
    });    
    </script>

    <script src="js/jquery.selectlistactions.js"></script> 
    <script type="text/javascript">
          $('#btnRight').click(function (e) {
             $('select').moveToListAndDelete('#list_categoria1', '#list_categoria2');
             $('#list_categoria2 option').prop('selected', true);
             e.preventDefault();
          });
          $('#btnAllRight').click(function (e) {
             $('select').moveAllToListAndDelete('#list_categoria1', '#list_categoria2');
             $('#list_categoria2 option').prop('selected', true);
             e.preventDefault();
          });
          $('#btnLeft').click(function (e) {
             $('select').moveToListAndDelete('#list_categoria2', '#list_categoria1');
             $('#list_categoria2 option').prop('selected', true);
             e.preventDefault();
          });
          $('#btnAllLeft').click(function (e) {
             $('select').moveAllToListAndDelete('#list_categoria2', '#list_categoria1');
             e.preventDefault();
          });      
    </script>
    
</body>

</html>