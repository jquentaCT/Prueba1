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

        echo '
        <div class="table-responsive" style="width:99%;">
        <table class="table table-bordered table-hover">
        <thead>
          <tr class="bg-primary text-light">
            <th style="width:98%;">NOMBRE</th>           
            <th style="width:2%;" class="text-center">ACCI&Oacute;N</th>
          </tr>
        </thead>
        <tbody>';
        
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

        //echo $sql;

        $row = $conectdata->set_list_table($sql);
        foreach($row as $key => $valor){

          echo '<tr>               
                <td>'.utf8_encode($row[$key]['nombre']).'</td>
                <td class="text-center">
                 <a href="javascript:void(0)" onclick="javascript:slvi('.$row[$key]['idv'].')" class="btn btn-primary" role="button" title="SELECCIONAR"><i class="fa fa-plus-square-o"></i></a>
                 <input type="hidden" id="cc'.$row[$key]['idv'].'" value="'.utf8_encode($row[$key]['nombre']).'">
                 <input type="hidden" id="vv'.$row[$key]['idv'].'" value="'.trim(utf8_encode($row[$key]['url'])).'">               
                </td>
          </tr>';

          $encontro++;

        }

        if($encontro==0){
           echo '<tr>
            <td colspan="2" class="text-center">
              <h3>NO SE ENCONTRO NINGUNA COINCIDENCIA</h3>
              <i class="glyphicon glyphicon-remove-sign fa-mycustomx text-danger"></i>
            </td>
           </tr>';
        }

        echo '</tbody>
        </table>
        </div>';

	}else{
        echo '<div class="text-center"><img src="images/icon-search.jpg" alt="SEARCH" /></div>';
  }

}
else{
    echo 'Proceso no Admitido, su IP fue registrada : '.$conectdata->getIP();
    exit();
} 
?>
