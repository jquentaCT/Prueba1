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

$PanelModulo = 'm8';
include 'html/html-modulo.php';

$nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';
$p = !empty($_POST['p']) ? $_POST['p'] : '';
$action = !empty($_POST['action']) ? $_POST['action'] : '';

$nombre = clear_space(not_html_script(limpiar($nombre)));
$p = trim_array($p);
$action = clear_space(not_html_script(limpiar($action)));

$encontro = '0';
$lista = '';
$resultado = '';

if( count($p) > 0 ){
    sort($p, SORT_NATURAL | SORT_FLAG_CASE); // ordenar de forma ascendente
    $lista = implode(',',$p);
}

if( !empty($action) ){

    if( strlen($nombre) <=2 ){ $e1 = 'Ingrese su nombre completo.'; $encontro = 1; }
    else{
        if(caracteres($nombre) == '_INCORRECTO_'){ $e1 = 'Prohibido caracteres extra&ntilde;os.'; $encontro = 1; }
    }

    if( count($p) == 0 ){ $e2 = 'Seleccione alguna de las opciones'; $encontro = 1; }

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
    <title>Lista de perfil de usuarios - Professional Service Support S.A.C.</title>

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
                    <h3 class="text-themecolor">REGISTRAR PERFIL DE USUARIO</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">M&oacute;dulos</li>
                        <li class="breadcrumb-item active">Perfil de usuarios</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>

            <div class="container-fluid">

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card card-outline-info">

                            <div class="card-header">
                              <h4 class="m-b-0 text-white">Formulario</h4>
                            </div>

                            <div class="card-body">
                                <?php 
                                if( !empty($action) ){
                                    
                                    if($encontro == '0'){
                                                                                
                                         $re = $conectdata->set_grabar_permisos($nombre,$lista);
                                         if($re==true){                                             

                                              echo '<div class="alert alert-success">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                              <h4><i class="fa fa-check-circle"></i> Confirmado</h4>
                                              Los datos fueron registrados correctamente.
                                              </div>';

                                              $nombre = '';
                                              $lista = '';
                                              unset($p);
                                              $p = array(); 

                                         }elseif($re==false){
                                              echo '<div class="alert alert-danger">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                              <h4><i class="icon fa fa-ban"></i> Mensaje de alerta</h4>
                                              el nombre ya se encuentra registrado, por favor verificar.
                                              </div>'; 
                                         }                                       

                                    }    

                                 }      
                                ?>
                                <h4 class="card-title">Importante:</h4>
                                <h6 class="card-subtitle">No conectarse a trav&eacute;s de Wifi compartido al p&uacute;blico</h6>

                                <form class="form p-t-20" action="" method="post" enctype="multipart/form-data" autocomplete="off">

                                      <div class="form-group<?php if(isset($e1)){echo ' has-danger';} ?>">
                                         <label for="nombre">Nombre: <span class="text-danger">(*)</span></label>
                                         <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" maxlength="70" value="<?php echo $nombre; ?>"/>
                                         <?php echo !empty($e1) ? $e1 : ''; ?>
                                      </div>

                                      <div class="form-group<?php if(isset($e2)){echo ' has-danger';} ?>">
                                           <label for="nombre">M&oacute;dulos: <span class="text-danger">(*)</span></label>
                                           <?php echo !empty($e2) ? $e2 : ''; ?>
                                          
                                           <div class="clearfix"></div><br>

                                           <div class="row">
                                               <div class="col-md-6 demo-checkbox">
                                                    <input type="checkbox" id="mch_1" class="filled-in chk-col-blue" name="p[]" value="m1"<?php if(modulos($lista,'m1') > 0){echo ' checked';} ?>>                                                
                                                    <label for="mch_1">PRODUCTOS</label>                                                
                                               </div>
                                               <div class="col-md-6 demo-checkbox">
                                                    <input type="checkbox" id="mch_2" class="filled-in chk-col-blue" name="p[]" value="m2"<?php if(modulos($lista,'m2') > 0){echo ' checked';} ?>>                                                
                                                    <label for="mch_2">CATEGORÍAS</label>
                                               </div>
                                           </div>

                                           <div class="row">
                                               <div class="col-md-6 demo-checkbox">
                                                    <input type="checkbox" id="mch_3" class="filled-in chk-col-blue" name="p[]" value="m3"<?php if(modulos($lista,'m3') > 0){echo ' checked';} ?>>                                                
                                                    <label for="mch_3">SUBCATEGORÍAS</label>                                                
                                               </div>
                                               <div class="col-md-6 demo-checkbox">
                                                    <input type="checkbox" id="mch_4" class="filled-in chk-col-blue" name="p[]" value="m4"<?php if(modulos($lista,'m4') > 0){echo ' checked';} ?>>                                                
                                                    <label for="mch_4">CLIENTES</label>
                                               </div>
                                           </div>

                                           <div class="row">
                                               <div class="col-md-6 demo-checkbox">
                                                    <input type="checkbox" id="mch_5" class="filled-in chk-col-blue" name="p[]" value="m5"<?php if(modulos($lista,'m5') > 0){echo ' checked';} ?>>                                                
                                                    <label for="mch_5">CLIENTES SATISFECHOS</label>                                                
                                               </div>
                                               <div class="col-md-6 demo-checkbox">
                                                    <input type="checkbox" id="mch_6" class="filled-in chk-col-blue" name="p[]" value="m6"<?php if(modulos($lista,'m6') > 0){echo ' checked';} ?>>                                                
                                                    <label for="mch_6">MARCAS</label>
                                               </div>
                                           </div>

                                           <div class="row">
                                               <div class="col-md-6 demo-checkbox">
                                                    <input type="checkbox" id="mch_7" class="filled-in chk-col-blue" name="p[]" value="m7"<?php if(modulos($lista,'m7') > 0){echo ' checked';} ?>>                                                
                                                    <label for="mch_7">USUARIOS INTERNOS</label>                                                
                                               </div>
                                               <div class="col-md-6 demo-checkbox">
                                                    <input type="checkbox" id="mch_8" class="filled-in chk-col-blue" name="p[]" value="m8"<?php if(modulos($lista,'m8') > 0){echo ' checked';} ?>>                                                
                                                    <label for="mch_8">PERFIL DE USUARIO</label>
                                               </div>
                                           </div>                                                                            

                                      </div>                                 
                                      
                                      <input type="hidden" name="action" value="send"/>
                                      <button type="submit" class="btn btn-info waves-effect waves-light m-r-10"><i class="fa fa-check"></i> Registrar</button>
                                      <button type="reset" class="btn btn-danger waves-effect waves-light"><i class="fa fa-times"></i> Cancelar</button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <?php include 'html/paginacion-permisos.php'; ?>
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
