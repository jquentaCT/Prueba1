<?php
include '../../class/class_process.php';
$conectdata = new Proceso();
$conectdata::start();
$conectdata->start_default();
$conectdata->session_interna();

$variable = !empty($_POST['variable']) ? $_POST['variable'] : '';
$variable = clear_space(not_html_script(limpiar($variable)));

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

        if(!empty($variable)){

            $variable = utf8_decode($variable);
            $encontro = 0;       
            
            $sql = "select *, match (nombre, resumen, url) against ('".$variable."'') ";
            $sql.= "from ".TABLE_PREFIX._TAB_VIDE_SYS_." ";
            $sql.= "where match (nombre, resumen, url) against ('".$variable."'') ";
            $sql.= "order by nombre asc";

            if($encontro == 0){
               $row = $conectdata->set_list_table($sql);
               if(count($row)==0){
                  $sql = "select * ";
                  $sql.= "from ".TABLE_PREFIX._TAB_VIDE_SYS_." ";
                  $sql.= "where nombre like '%".$variable."%' or resumen like '%".$variable."%' or url like '%".$variable."%' ";
                  $sql.= "order by nombre asc";
                  $row = $conectdata->set_list_table($sql); 
               }
            }

            $row = $conectdata->set_list_table($sql);
            foreach($row as $key => $valor){
                echo '<option value="'.$row[$key]['idv'].'">'.utf8_encode($row[$key]['nombre']).'</option>';
                $encontro++;
            }

            if($encontro==0){
               echo '<option value="0">SIN RESULTADOS</option>';
            }

    	}

}
else{
    echo 'Proceso no Admitido, su IP fue registrada : '.getIP();
    exit();
} 
?>
