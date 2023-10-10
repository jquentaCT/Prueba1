<?php
include '../../class/class_process.php';
$conectdata = new Proceso();
$conectdata::start();
$conectdata->start_default();
$conectdata->session_interna();

$variable = !empty($_POST['variable']) ? $_POST['variable'] : '';
$variable = clear_space(not_html_script(limpiar($variable)));
$variable = clear_string_ii($variable);
$variable = str_replace('×', 'x', $variable);
$variable = str_replace('---', '-', $variable);
$variable = str_replace('--', '-', $variable);

echo $variable; 
?>
