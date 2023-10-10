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

$PanelModulo = 'm7';
include 'html/html-modulo.php';

$v = !empty($_GET['v']) ? $_GET['v'] : '';
$cod = !empty($_GET['cod']) ? $_GET['cod'] : '';
$v = clear_space(not_html_script(limpiar($v)));
$cod = clear_space(not_html_script(limpiar($cod)));
$cod = (int)$cod;

$nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = !empty($_POST['apellido']) ? $_POST['apellido'] : '';
$email = !empty($_POST['email']) ? $_POST['email'] : '';
$permisos = !empty($_POST['permisos']) ? $_POST['permisos'] : '';
$login = !empty($_POST['login']) ? $_POST['login'] : '';
$pwd1 = !empty($_POST['pwd1']) ? $_POST['pwd1'] : '';
$pwd2 = !empty($_POST['pwd2']) ? $_POST['pwd2'] : '';
$activar = !empty($_POST['activar']) ? $_POST['activar'] : '';
$tmp_name = !empty($_FILES['imagen']['tmp_name']) ? $_FILES['imagen']['tmp_name'] : '';
$name = !empty($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : '';
$size = !empty($_FILES['imagen']['size']) ? $_FILES['imagen']['size'] : '';
$type = !empty($_FILES['imagen']['type']) ? $_FILES['imagen']['type'] : '';
$error = !empty($_FILES['imagen']['error']) ? $_FILES['imagen']['error'] : '';
$action = !empty($_POST['action']) ? $_POST['action'] : '';

$nombre = clear_space(not_html_script(limpiar($nombre)));
$apellido = clear_space(not_html_script(limpiar($apellido)));
$email = clear_space(not_html_script(limpiar($email)));
$permisos = clear_space(not_html_script(limpiar($permisos)));
$login = clear_space(not_html_script(limpiar($login)));
$pwd1 = clear_space(not_html_script(limpiar($pwd1)));
$pwd2 = clear_space(not_html_script(limpiar($pwd2)));
$activar = clear_space(not_html_script(limpiar($activar)));
$action = clear_space(not_html_script(limpiar($action)));

$encontro = '0';

if( !empty($action) ){

      if( strlen($nombre) <=2 ){ $e1 = '(*) Ingrese su nombre completo.'; $encontro = 1; }
      else{
          if(caracteres($nombre) == '_INCORRECTO_'){ $e1 = '(*) Prohibido caracteres extra&ntilde;os.'; $encontro = 1; }
      }

      if( strlen($apellido) <=2 ){ $e2 = '(*) Ingrese su nombre y apellido completo.'; $encontro = 1; }
      else{
          if(caracteres($apellido) == '_INCORRECTO_'){ $e2 = '(*) Prohibido caracteres extra&ntilde;os.'; $encontro = 1; }
      }    

      if( $permisos == '0' or $permisos == 0){ $e3 = '(*) Establecer permisos.'; $encontro = 1; }
      
      if( comprobar_email($email) == 0 ){ $e4 = '(*) El formato es incorrecto.'; $encontro = 1; }
      
      if( strlen($login) <=4 ){ $e8 = '(*) Ingrese su login, mayor a ( 4 ) caracteres.'; $encontro = 1; }
      else{
        if(alfanumber($login) == '_INCORRECTO_'){ $e8 = '(*) Se admiten solo a-z / 0-9 / -'; $encontro = 1; }
      }

      if( strlen(trim($pwd1)) > 0 or strlen(trim($pwd2)) > 0 ){
         if( strange_password($pwd1)=='_INCORRECTO_' ){ $e5 = '(*) Prohibido caracteres extra&ntilde;os.'; $encontro = '1'; }
         if( strange_password($pwd2)=='_INCORRECTO_' ){ $e6 = '(*) Prohibido caracteres extra&ntilde;os.'; $encontro = '1'; }
         elseif($pwd1!=$pwd2){ $e6 = '(*) Las claves no son iguales.'; $encontro = '1'; }
      }      

      $new_file = '';
      if( strlen(trim($name)) > 0 ){
          if ($error != UPLOAD_ERR_NO_FILE){
            if( ver_archivo($size,$type) == '_CORRECTO_' ){
               $ext = explode(".",mb_strtolower($name));
               $ext = end($ext);
               $new_file = uniqid().'.'.$ext;
            }else{
               $e7 = '(*) La imagen NO cumple con el formato establecido.';
               $encontro = '1';
            }
          }
      }

      if(empty($activar) or $activar!='Y'){ $activar = 'N'; }  

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
    <title>Lista de usuarios - Professional Service Support S.A.C.</title>

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
    <link href="assets/plugins/multiselect/css/multi-select.css" />

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
                    <h3 class="text-themecolor">MODIFICAR USUARIOS</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">M&oacute;dulos</li>
                        <li class="breadcrumb-item active">Usuarios internos</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>

<?php
  if($v=='borrar' && !empty($cod)){
     
     $info = $conectdata->get_data_user($cod);

     $xmod = $PanelModulo;
     $xid = $datauser['idu']; 
     $xdes = "Eliminación de USUARIO INTERNO: ".ucname(utf8_encode($info['nombre'].' '.$info['apellido']));
     $xip = getIP();
     $xnav = my_browser();
     $xsis = my_system_pc();
     //$xurl = obtener_url();

     $conectdata->set_grabar_historial($xmod,$xid,$xdes,$xip,$xnav,$xsis,$xurl);
     $conectdata->set_delete_user($cod);

     echo '<div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-check"></i> Confirmado</h4>
     Los datos fueron eliminados correctamente.
     </div>';
     echo "<script>
     alert('LOS DATOS FUERON ELIMINADOS CORRECTAMENTE');
     window.location.href = './lista-usuarios.php';
     </script>";
     
  }
  elseif($v=='editar' && !empty($cod)){
?>
            <!-- CONTENIDO -->
            <div class="container-fluid">

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-5">
                        <a href="./lista-usuarios.php" class="btn waves-effect waves-light btn-rounded btn-sm btn-outline-info mb10 plr" role="button">REGISTRAR USUARIO &nbsp;<i class="icon-control-forward"></i></a>
                        <div class="card card-outline-info">

                            <div class="card-header">
                              <h4 class="m-b-0 text-white">Formulario</h4>
                            </div>

                            <div class="card-body">
                                <?php 
                                if( !empty($action) ){
                                    
                                    if($encontro == '0'){

                                         /*
                                         echo 'NOMBRE: '.$nombre.'<br>';
                                         echo 'APELLIDO: '.$apellido.'<br>';
                                         echo 'EMAIL: '.$email.'<br>';
                                         echo 'LOGIN: '.$login.'<br>';
                                         echo 'CLAVE: '.$pwd1.'<br>';
                                         echo 'PERMISO: '.$permisos.'<br>';
                                         echo 'IMAGEN: '.$new_file.'<br>';
                                         echo 'ACTIVAR: '.$activar.'<br>';
                                         */
                                                    
                                         $p = $conectdata->set_update_user($cod,$nombre,$apellido,$email,$login,$pwd1,$permisos,$new_file,$activar);
                                         if($p==true){

                                              if(!empty($new_file)){
                                                   $ruta = 'images/users';
                                                   move_uploaded_file($tmp_name,$ruta.'/'.$new_file);
                                                   crear_miniaturas( $ruta."/".$new_file, "200", "0", $ruta."/tb_".$new_file);
                                                   list($w1, $h1, $type1, $attr1) = getimagesize($ruta.'/'.$new_file);
                                                   if( $w1 > 500 ){
                                                     crear_miniaturas( $ruta."/".$new_file, "500", "0", $ruta."/".$new_file);
                                                   }
                                              }

                                              echo '<div class="alert alert-success">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                              <h4><i class="fa fa-check-circle"></i> Confirmado</h4>
                                              Los datos fueron actualizados correctamente.
                                              </div>';
                                              
                                         }elseif($p==false){
                                              echo '<div class="alert alert-danger">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                              <h4><i class="icon fa fa-ban"></i> Mensaje de alerta</h4>
                                              Los nombres y apellidos o email ya se encuentran registrados, por favor verificar.
                                              </div>';
                                         }                                       

                                    }


                                 } 

                                 $data = $conectdata->get_data_user($cod);     
                                ?>
                                <h4 class="card-title">Importante:</h4>
                                <h6 class="card-subtitle">No conectarse a trav&eacute;s de Wifi compartido al p&uacute;blico</h6>

                                <form class="form p-t-20" action="./proceso-usuarios.php?v=editar&cod=<?php echo $cod; ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                                  <div class="form-group<?php if(!empty($e1)){echo ' has-danger';} ?>">
                                      <label for="input_nombre">Nombre: <span class="text-danger">(*)</span></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">
                                                  <i class="ti-user"></i>
                                              </span>
                                          </div>
                                          <input type="text" name="nombre" class="form-control" id="input_nombre" maxlength="80" value="<?php echo $data['nombre']; ?>" placeholder="Nombre completo">                                          
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e1) ? $e1 : ''; ?></small>
                                  </div>

                                  <div class="form-group<?php if(!empty($e2)){echo ' has-danger';} ?>">
                                      <label for="input_apellido">Apellido: <span class="text-danger">(*)</span></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">
                                                  <i class="ti-user"></i>
                                              </span>
                                          </div>
                                          <input type="text" name="apellido" class="form-control" id="input_apellido" maxlength="80" value="<?php echo $data['apellido']; ?>" placeholder="Apellido completo">
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e2) ? $e2 : ''; ?></small>
                                  </div>
                                  

                                  <div class="form-group<?php if(!empty($e3)){echo ' has-danger';} ?>">
                                      <label for="select_perm">Permisos: <span class="text-danger">(*)</span></label>
                                      <div class="input-group">
                                          <select name="permisos" class="selectpicker m-b-20 m-r-10" id="select_perm" data-style="btn-danger">
                                              <option data-tokens="seleccionar" value="0">- Seleccionar tipo de permiso -</option>
                                              <?php                                              
                                                $conectdata->set_listar('select idpe, nombre from '.TABLE_PREFIX._TAB_PERM_SYS_.' order by nombre asc',$data['permisos']); 
                                              ?>                                             
                                          </select>
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e3) ? $e3 : ''; ?></small>
                                  </div>                                  

                                  <div class="form-group<?php if(!empty($e4)){echo ' has-danger';} ?>">
                                      <label for="input_email">Email: <span class="text-danger">(*)</span></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">
                                                  <i class="ti-email"></i>
                                              </span>
                                          </div>
                                          <input type="email" name="email" class="form-control" id="input_email" maxlength="100" value="<?php echo $data['email']; ?>" placeholder="Ingrese su email">
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e4) ? $e4 : ''; ?></small>
                                  </div>

                                  <div class="form-group<?php if(!empty($e8)){echo ' has-danger';} ?>">
                                      <label for="input_login">Login: <span class="text-danger">(*)</span></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">
                                                  <i class="ti-star"></i>
                                              </span>
                                          </div>
                                          <input type="text" name="login" class="form-control" id="input_login" maxlength="40" value="<?php echo $data['login']; ?>" placeholder="Login">
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e8) ? $e8 : ''; ?></small>
                                  </div>

                                  <div class="form-group<?php if(!empty($e5)){echo ' has-danger';} ?>">
                                      <label for="pwd1">Clave: <span class="text-danger">(*)</span></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">
                                                  <i class="ti-lock"></i>
                                              </span>
                                          </div>
                                          <input type="password" name="pwd1" class="form-control" id="pwd1" maxlength="60" value="<?php echo $pwd1; ?>" placeholder="Ingrese su clave">
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e5) ? $e5 : ''; ?></small>
                                  </div>

                                  <div class="form-group<?php if(!empty($e6)){echo ' has-danger';} ?>">
                                      <label for="pwd2">Confirmar su clave: <span class="text-danger">(*)</span></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">
                                                  <i class="ti-lock"></i>
                                              </span>
                                          </div>
                                          <input type="password" name="pwd2" class="form-control" id="pwd2" maxlength="60" value="<?php echo $pwd2; ?>" placeholder="Reingrese su clave">
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e6) ? $e6 : ''; ?></small>
                                  </div>

                                  <label for="pwd2">Activar cuenta:</label>
                                  <div class="switchery-demo m-b-30">
                                      <input type="checkbox" name="activar" class="js-switch" value="Y" data-color="#ef5350"<?php if($data['activado']=='Y'){ echo ' checked'; } ?>/>
                                  </div>

                                  <div class="card form-group<?php if(!empty($e7)){echo ' has-danger';} ?>">
                                      <div class="card-body" style="padding: 0px">
                                          <label for="file_img">Imagen:</label>
                                          <input type="file" name="imagen" id="file_img" class="dropify" />
                                      </div>
                                      <small class="form-control-feedback"><?php echo !empty($e7) ? $e7 : '';; ?></small>
                                  </div>

                                  <div class="text-center">
                                      <?php if(!empty($data['imagen'])){ $_img_ = 'tb_'.$data['imagen']; }else{ $_img_ = 'no-disponible.jpg'; } ?>
                                      <img src="images/users/<?php echo $_img_; ?>" class="img-fluid" alt="USUARIO"/>
                                  </div>
                                  <br>

                                  <input type="hidden" name="action" value="send"/>
                                  <button type="submit" class="btn btn-info waves-effect waves-light m-r-10"><i class="fa fa-check"></i> Modificar</button>
                                 
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <?php include 'html/paginacion-usuarios.php'; ?>
                    </div>
                </div>
                <!-- Row -->

                <!-- .right-sidebar -->
                <?php include 'html/html-right-sidebar.php'; ?>

            </div>
            <!-- ./ CONTENIDO -->
<?php  
  }
?>

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

    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
</body>

</html>
