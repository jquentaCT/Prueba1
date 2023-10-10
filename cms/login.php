<?php
ob_start();
include '../class/class_process.php';
no_cache();
no_ataques_xss();
$conectdata = new Proceso();
$conectdata::start();
$conectdata->start_default();
$conectdata->verificar_session();

$login = !empty($_POST['login']) ? $_POST['login'] : '';
$clave = !empty($_POST['clave']) ? $_POST['clave'] : '';
$recordar = !empty($_POST['recordar']) ? $_POST['recordar'] : '';
$action = !empty($_POST['action']) ? $_POST['action'] : '';

$login = clear_space(not_html_script(limpiar($login)));
$clave = clear_space(not_html_script(limpiar($clave)));
$recordar = clear_space(not_html_script(limpiar($recordar)));

$login = sanatize_var($login);
$clave = sanatize_var($clave);
$recordar = sanatize_var($recordar);

$encontro = 0;
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

<body>

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">

                <?php
                    if( !empty($action) ){

                        if( strlen($login) < 2 ){ $e1 = '<small class="form-control-feedback">(*) Ingrese su LOGIN correctamente.</small>'; $encontro = 1; }
                        else{ 
                            if( alfanumber($login) == '_INCORRECTO_' ){ $e1 = '<small class="form-control-feedback">(*) El formato alfanumerico es incorrecto.</small>'; $encontro = 1; }
                        }

                        if( strlen($clave) < 2 ){ $e2 = '<small class="form-control-feedback">(*) Ingrese correctamente su clave.</small>'; $encontro = 1; }
                        else{ if( strange_password($clave)=='_INCORRECTO_' ){ $e2 = '<small class="form-control-feedback">(*) Prohibido caracteres extra&ntilde;os.</small>'; $encontro = 1; } }

                        if($encontro == 0){

                               $resultado = $conectdata->control_user($login,$clave);
                        
                               if($resultado == true){

                                  if( !empty($recordar) ){
                                      // Estableciendo cookies por 7 dias
                                      setcookie(SEYCO_PREFIX."sys_logi_MKD@@", $login, time () + (3600)*168 );
                                      setcookie(SEYCO_PREFIX."sys_pass_MKD@@", $clave, time () + (3600)*168 );
                                  }else{
                                      // Limpiando cookies establecidos
                                      unset($_COOKIE[SEYCO_PREFIX."sys_logi_MKD@@"]);
                                      unset($_COOKIE[SEYCO_PREFIX."sys_pass_MKD@@"]);
                                      setcookie(SEYCO_PREFIX."sys_logi_MKD@@", null, -1);
                                      setcookie(SEYCO_PREFIX."sys_pass_MKD@@", null, -1);
                                  }

                                  header("Location:index.php");

                               }
                               else{
                                  echo '<div class="alert alert-danger">';
                                  echo '<strong>MENSAJE DE ERROR</strong><p>Los accesos son incorrectos o su cuenta no ha sido aún activada.</p>';
                                  echo '</div>';
                               }

                        }

                    }
                ?>

                <form method="post" class="form-horizontal form-material" id="loginform" action="login.php">
                    <a href="./login.php" class="text-center db mb10"><img src="../images/logotipo-2.png" alt="Home" /></a>
                    
                    <div class="form-group m-t-40<?php if(!empty($e1)){echo ' has-danger';} ?>">
                        <div class="col-xs-12">
                          <input class="form-control<?php if(!empty($e1)){echo ' form-control-danger';} ?>" name="login" type="text" required placeholder="Usuario" maxlength="40" value="<?php echo isset($_COOKIE[SEYCO_PREFIX.'sys_logi_MKD@@']) ? $_COOKIE[SEYCO_PREFIX.'sys_logi_MKD@@'] : ''; ?>"/>
                          <?php echo !empty($e1)? $e1 : ''; ?>
                        </div>
                    </div>
                    <div class="form-group<?php if(!empty($e2)){echo ' has-danger';} ?>">
                        <div class="col-xs-12">
                          <input class="form-control<?php if(!empty($e2)){echo ' form-control-danger';} ?>" name="clave" type="password" required placeholder="Contraseña" maxlength="50" value="<?php echo isset($_COOKIE[SEYCO_PREFIX.'sys_pass_MKD@@']) ? $_COOKIE[SEYCO_PREFIX.'sys_pass_MKD@@'] : ''; ?>"/>
                          <?php echo !empty($e2)? $e2 : ''; ?>
                        </div>
                    </div>
                        
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="hidden" name="action" value="send">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Iniciar sesi&oacute;n</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

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

    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
