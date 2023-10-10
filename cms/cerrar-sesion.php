<?php
ob_start();
include '../class/class_process.php';
$conectdata = new Proceso();
$conectdata::start();
$conectdata->start_default();
$conectdata::destroy();
$conectdata->session_interna();
ob_end_flush();
?>
