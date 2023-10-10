<?php  
$paispedido = !empty($_POST['paispedido']) ? $_POST['paispedido'] : '';
$ciudadpedido = !empty($_POST['ciudadpedido']) ? $_POST['ciudadpedido'] : '';
$enviopedido = !empty($_POST['enviopedido']) ? $_POST['enviopedido'] : '';
$nombre_empresa = !empty($_POST['nombre_empresa']) ? $_POST['nombre_empresa'] : '';
$direccion_registro = !empty($_POST['direccion_registro']) ? $_POST['direccion_registro'] : '';
$cargo_empresa = !empty($_POST['cargo_empresa']) ? $_POST['cargo_empresa'] : '';
$documento_ruc = !empty($_POST['documento_ruc']) ? $_POST['documento_ruc'] : '';
$nombre_contacto = !empty($_POST['nombre_contacto']) ? $_POST['nombre_contacto'] : '';
$telefono_pedido = !empty($_POST['telefono_pedido']) ? $_POST['telefono_pedido'] : '';
$email_pedido = !empty($_POST['email_pedido']) ? $_POST['email_pedido'] : '';
$actionpedido = !empty($_POST['actionpedido']) ? $_POST['actionpedido'] : '';

$paispedido = htmlspecialchars(clear_space(limpiar(not_html_script($paispedido))));
$ciudadpedido = htmlspecialchars(clear_space(limpiar(not_html_script($ciudadpedido))));
$enviopedido = htmlspecialchars(clear_space(limpiar(not_html_script($enviopedido))));
$nombre_empresa = htmlspecialchars(clear_space(limpiar(not_html_script($nombre_empresa))));
$direccion_registro = htmlspecialchars(clear_space(limpiar(not_html_script($direccion_registro))));
$cargo_empresa = htmlspecialchars(clear_space(limpiar(not_html_script($cargo_empresa))));
$documento_ruc = htmlspecialchars(strip_tags(not_script($documento_ruc)));
$nombre_contacto = htmlspecialchars(clear_space(limpiar(not_html_script($nombre_contacto))));
$telefono_pedido = htmlspecialchars(clear_space(limpiar(not_html_script($telefono_pedido))));
$email_pedido = htmlspecialchars(strip_tags(not_script($email_pedido))); 
$actionpedido = htmlspecialchars(strip_tags(not_script($actionpedido))); 

$paispedido = sanatize_var($paispedido);
$ciudadpedido = sanatize_var($ciudadpedido);
$enviopedido = sanatize_var($enviopedido);
$nombre_empresa = sanatize_var($nombre_empresa);
$direccion_registro = sanatize_var($direccion_registro);
$cargo_empresa = sanatize_var($cargo_empresa);
$documento_ruc = sanatize_var($documento_ruc);
$nombre_contacto = sanatize_var($nombre_contacto);
$telefono_pedido = sanatize_var($telefono_pedido);
$email_pedido = sanatize_var($email_pedido);

$encontro = 0; 
?>