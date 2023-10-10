<div class="card">
    <div class="card-body">
        <h4 class="card-title">Exportaci&oacute;n de datos</h4>
        <h6 class="card-subtitle">Copiar, CSV, Excel, PDF e imprimir</h6>
        <div class="table-responsive m-t-5">

            <!-- LISTADO -->
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Código</th>
                        <th>Nombre</th>                       
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Destacado</th>
                        <th>Publicado</th>                                                          
                    </tr>
                </thead>
                <tfoot>
                    <tr>   
                        <th>Item</th>
                        <th>Código</th>                 
                        <th>Nombre</th>                      
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Destacado</th>
                        <th>Publicado</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                 $item = 1;
                 $sql = "select * ";
                 $sql.= "from ".TABLE_PREFIX._TAB_PROD_SYS_." ";                                      
                 $sql.= "order by nombre asc";
                
                 $row = $conectdata->set_list_table($sql);
                 foreach($row as $key => $valor){
                   $_id_ = $row[$key]['idp'];
                   $_codigo_ = utf8_encode($row[$key]['codigo']);
                   $_nombre_ = utf8_encode($row[$key]['nombre']);
                   $_categoria_ = '';
                   $_precio_ = utf8_encode($row[$key]['precio']);
                   $_stock_ = utf8_encode($row[$key]['stock']);                 
                   $_mostrar_ = trim($row[$key]['mostrar']);
                   if($_mostrar_=='1'){ $m = 'SI'; }
                   elseif($_mostrar_=='2'){ $m = 'NO'; }

                   $_home_ = trim($row[$key]['home']);
                   if($_home_=='1'){ $h = 'SI'; }
                   elseif($_home_=='2'){ $h = 'NO'; }  
                ?>  
                  <tr>
                    <td>
                        <a href="./proceso-productos.php?v=editar&cod=<?php echo $_id_; ?>" title="MODIFICAR"><i class="fa fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btndelprocess" rel="<?php echo $_id_; ?>-productos" title="ELIMINAR"><i class="fa fa-eraser text-danger"></i></a>
                        &nbsp;<?php echo $item; ?>
                    </td>
                    <td><?php echo $_codigo_; ?></td>
                    <td><?php echo $_nombre_; ?></td>                  
                    <td><?php echo $_precio_; ?></td>
                    <td><?php echo $_stock_; ?></td>
                    <td><?php echo $h; ?></td>
                    <td><?php echo $m; ?></td>                                
                  </tr>
                <?php
                  $item++;  
                 }
                ?>    
                </tbody>
            </table>
            <!-- ./ LISTADO -->

        </div>
    </div>
</div>