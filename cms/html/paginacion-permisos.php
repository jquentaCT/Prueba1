<div class="card">
    <div class="card-body">
        <h4 class="card-title">Exportaci&oacute;n de datos</h4>
        <h6 class="card-subtitle">Copiar, CSV, Excel, PDF e imprimir</h6>
        <div class="table-responsive m-t-40">

            <!-- LISTADO -->
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Item</th>                 
                        <th>Nombre</th>                                                                                                                   
                    </tr>
                </thead>
                <tfoot>
                    <tr>                      
                        <th>Item</th>                       
                        <th>Nombre</th>                                              
                    </tr>
                </tfoot>
                <tbody>
                <?php
                 $_item_ = 1;

                 $sql = "select tb1.idpe as col1,
                                tb1.nombre as col2 ";
                 $sql.= "from ".TABLE_PREFIX._TAB_PERM_SYS_." tb1 ";                                      
                 $sql.= "order by tb1.idpe asc";
                
                 $row = $conectdata->set_list_table($sql);
                 foreach($row as $key => $valor){
                   $_codigo_ = $row[$key]['col1'];
                   $_nombre_ = ucname(utf8_encode($row[$key]['col2']));                                                                                                
                ?>  
                    <tr>
                        <td>
                            <a href="./proceso-permisos.php?v=editar&cod=<?php echo $_codigo_; ?>" title="MODIFICAR"><i class="fa fa-edit"></i></a>                            
                            <a href="javascript:void(0)" class="btndelprocess" rel="<?php echo $_codigo_; ?>-usuarios" title="ELIMINAR"><i class="fa fa-eraser text-danger"></i></a>&nbsp;&nbsp;
                            <?php echo $_item_; ?>
                        </td>
                        <td><?php echo $_nombre_; ?></td>                                                                                       
                    </tr>
                <?php
                    $_item_++;  
                 }
                ?>    
                </tbody>
            </table>
            <!-- ./ LISTADO -->

        </div>
    </div>
</div>