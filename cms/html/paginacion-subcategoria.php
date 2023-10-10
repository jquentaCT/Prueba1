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
                        <th>Categoría</th>
                        <th>Mostrar</th>                                                          
                    </tr>
                </thead>
                <tfoot>
                    <tr>                    
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Mostrar</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                 $sql = "select tb1.ids as col1,
                                tb1.nombre as col2,
                                tb1.mostrar as col3,
                                tb2.nombre as col4 ";
                 $sql.= "from ".TABLE_PREFIX._TAB_SCTP_SYS_." tb1 ";
                 $sql.= "inner join ".TABLE_PREFIX._TAB_CATP_SYS_." tb2 on tb1.categoria=tb2.idc ";                                      
                 $sql.= "order by tb1.nombre asc";
                
                 $row = $conectdata->set_list_table($sql);
                 foreach($row as $key => $valor){
                   $_id_ = $row[$key]['col1'];
                   $_nombre_ = utf8_encode($row[$key]['col2']);
                   $_mostrar_ = trim($row[$key]['col3']);                  
                   if($_mostrar_=='1'){ $m = 'SI'; }
                   elseif($_mostrar_=='2'){ $m = 'NO'; }
                   $_categoria_ = utf8_encode($row[$key]['col4']);   
                ?>  
                  <tr>
                    <td>
                        <a href="./proceso-subcategoria.php?v=editar&cod=<?php echo $_id_; ?>" title="MODIFICAR"><i class="fa fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btndelprocess" rel="<?php echo $_id_; ?>-subcategorias" title="ELIMINAR"><i class="fa fa-eraser text-danger"></i></a>
                        <?php echo $_nombre_; ?>
                    </td>
                    <td><?php echo $_categoria_; ?></td>
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