<?php
/* CONFIGURACION BASE DE DATOS */
define('DB_HOST','localhost');//mysql7.websitelive.net
define('DB_USER','root');// pss_user
define('DB_PASS',''); // @A77000_##@
define('DB_NAME','pss_db');
define('DB_CHARSET','utf8mb4'); //utf-8

define('URL_SITE','https://jhhinversiones.com/jhhinversiones');

/* CONTENT SECURITY POLICY - NONCE */
$_unique_ = substr(base64_encode(md5(mt_rand())), 0, 20);
$_nonce_ = base64_encode($_unique_);
define('_SYSTEM_NONCE_',$_nonce_);

/* ENVIO de CORREO */
define('MAIL_HOST','smtp.WebSiteLive.net');
define('MAIL_PORT','587');
define('MAIL_USERNAME','sistema@cpss.com.pe');
define('MAIL_PASSWORD','@_Pass3000_##@');

/* PREFIJO de TABLAS */
define('TABLE_PREFIX','xtbm_');

/* PREFIJO de SESION y COOKIES */
define('SEYCO_PREFIX','xxss_');

/* TABLAS */
define('_TAB_USER_SYS_', 'usuarios');
define('_TAB_PERM_SYS_', 'permisos');
define('_TAB_PROD_SYS_', 'productos');
define('_TAB_CATP_SYS_', 'categoria');
define('_TAB_SCTP_SYS_', 'subcategoria');
define('_TAB_CLIE_SYS_', 'clientes');
define('_TAB_MARC_SYS_', 'marcas');
define('_TAB_CSAT_SYS_', 'satisfechos');
define('_TAB_PAIS_SYS_', 'pais');
define('_TAB_USTB_SYS_', 'user_trabajadores');
define('_TAB_HYST_SYS_', 'historial');
?>