<?php
$datauser = $conectdata->get_data_user($_SESSION[SEYCO_PREFIX.'user_id']);
if(empty($datauser['imagen'])){$_img_ = 'user.jpg';}else{ $_img_ = $datauser['imagen']; }
$PanelPermisos = $_SESSION[SEYCO_PREFIX.'user_modules'];

if(enlace()!='index.php' && enlace()!='profile.php'){
	if( modulos($PanelPermisos,$PanelModulo) == 0 ){
	  header("Location: ./index.php");
	  exit();
	}
}
?>
