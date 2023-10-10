<div class="card">
    <div class="card-body">
        <h4 class="card-title">Exportaci&oacute;n de datos</h4>
        <h6 class="card-subtitle">Copiar, CSV, Excel, PDF e imprimir</h6>
        <div class="table-responsive m-t-5">

            <!-- LISTADO -->
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nombre</th>                       
                        <th>Mostrar</th>                                                          
                    </tr>
                </thead>
                <tfoot>
                    <tr>                    
                        <th>Nombre</th>                        
                        <th>Mostrar</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                 $sql = "select * ";
                 $sql.= "from ".TABLE_PREFIX._TAB_CLIE_SYS_." ";                                      
                 $sql.= "order by nombre asc";
                
                 $row = $conectdata->set_list_table($sql);
                 foreach($row as $key => $valor){
                   $_codigo_ = $row[$key]['idc'];
                   $_nombre_ = utf8_encode($row[$key]['nombre']);                  
                   $_mostrar_ = trim($row[$key]['mostrar']);
                   if($_mostrar_=='1'){$m='SI';}
                   elseif($_mostrar_=='2'){$m='NO';}     
                ?>  
                  <tr>
                    <td>
                        <a href="./proceso-clientes.php?v=editar&cod=<?php echo $_codigo_; ?>" title="MODIFICAR"><i class="fa fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btndelprocess" rel="<?php echo $_codigo_; ?>-clientes" title="ELIMINAR"><i class="fa fa-eraser text-danger"></i></a>
                        <?php echo $_nombre_; ?>
                    </td>                    
                    <td><?php echo $m; ?></td>                                
                  </tr>
                <?php  
                 }
                ?>    
                </tbody>
            </table>
            <!-- ./ LISTADO -->

        </div>
    </div>
</div>