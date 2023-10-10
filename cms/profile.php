<?php
ob_start();
include '../class/class_process.php';
no_cache();
no_ataques_xss();
$conectdata = new Proceso();
$conectdata::start();
$conectdata->start_default();
$conectdata->session_interna();
include 'html/html-modulo.php';
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
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
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
                    <h3 class="text-themecolor">Perfil</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">M&oacute;dulos</li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>

            <div class="container-fluid">

                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="images/users/<?php echo $_img_; ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $datauser['nombre'].' '.$datauser['apellido']; ?></h4>
                                    <?php
                                        $nombre_user = $conectdata->get_data_permisos($_SESSION[SEYCO_PREFIX.'user_modules_id']); 
                                    ?>
                                    <h6 class="card-subtitle"><?php echo $nombre_user['nombre']; ?></h6>
                                    <!--<div class="row text-center justify-content-md-center">&nbsp;</div>-->
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body">
                                <small class="text-muted p-t-30 db"><strong>LOGIN</strong></small>
                                <h6><?php echo $datauser['login']; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">                              
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Configuración</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">                                
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form method="post" action="./profile.php" class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>Nombre</strong></label>
                                                <div class="col-md-12">
                                                    <?php echo $datauser['nombre']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>Apellido</strong></label>
                                                <div class="col-md-12">
                                                    <?php echo $datauser['apellido']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12"><strong>Email</strong></label>
                                                <div class="col-md-12">
                                                    <?php echo mb_strtolower($datauser['email']); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>Clave</strong></label>
                                                <div class="col-md-12">
                                                    <input type="password" value="" class="form-control form-control-line">
                                                </div>
                                            </div>                                            
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Actualizar clave</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
