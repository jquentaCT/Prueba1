<!-- Search Popup Start -->
<div class="overlay overlay-hugeinc">    
  <form action="./productos.php" method="post" class="form-inline mt-2 mt-md-0">
    <div class="form-inner">
      <div class="form-inner-div d-inline-flex align-items-center no-gutters">
        <div class="col-md-1">
          <i class="icofont-search"></i>
        </div> 
        <div class="col-10">
          <input name="buscador" class="form-control w-100 p-0" type="text" placeholder="Buscador de productos" aria-label="Search" maxlength="100">
        </div>
        <div class="col-md-1">
          <a href="#" class="overlay-close link-oragne"><i class="icofont-close-line"></i></a>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- Search Popup End -->

<!-- Request Modal -->
<div class="modal fade" id="request_popup" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered request_popup" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <!-- Contact Details Start -->
        <section class="pos-rel bg-light-gray">
          <div class="container-fluid p-0">

            <a href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></a>

            <div class="d-lg-flex justify-content-end no-gutters mb-spacer-md" style="box-shadow: 0px 18px 76px 0px rgba(0, 0, 0, 0.06);">
              <div class="col bg-fixed bg-img-7 request_pag_img">
                  &nbsp;
              </div>

              <div class="col-md-7 col-12">
                  <div class="px-3 m-5">
                    <h2 class="h2-xl mb-4 fw-6 txt-light-blue">Solicitar mi lista de pedidos</h2>

                    <form action="<?php echo URL_SITE; ?>/pedidos.php" method="post" novalidate="novalidate" class="rounded-field">
                        <?php
                          $ItemCotizacion = !empty($_SESSION['ItemCotizacion']) ? $_SESSION['ItemCotizacion'] : '';                                                    
                          if (is_array($ItemCotizacion)) { 
                        ?>
                           <div id="count_prod" class="form-row mb-4">
                              <ul class="text-success">
                                   <li>( <?php echo count($ItemCotizacion); ?> ) productos seleccionados.</li>
                                   <li>Verifique su <a href="./pedidos.php" class="text-success"><strong>LISTA DE PEDIDOS</strong></a>.</li>
                              </ul>                             
                           </div>
                        <?php 
                           }else{ 
                        ?>
                           <div id="count_prod" class="form-row mb-4">
                              <ul class="text-danger">
                                   <li>( 0 ) productos seleccionados.</li>
                                   <li>Visite nuestra sección de <a href="./productos.php" class="text-danger"><strong>PRODUCTOS</strong></a>.</li>
                              </ul>                             
                           </div>
                        <?php
                           }   
                        ?>
                        <div class="form-row mb-4">
                          <div class="col">
                            <?php echo !empty($e1) ? $e1 : ''; ?>
                            <select title="Seleccione una de las opciones" name="paispedido" id ="paispedido" class="custom-select" aria-required="true" aria-invalid="false" required>
                              <option value="0">Seleccione el País a enviar</option>
                              <?php
                                 $conectdata->set_listar('select idp, nombre from '.TABLE_PREFIX._TAB_PAIS_SYS_.' order by nombre asc',$paispedido);
                              ?>
                            </select>
                          </div>
                          <div class="col">
                            <?php echo !empty($e2) ? $e2 : ''; ?>
                            <input type="text" name="ciudadpedido" class="form-control" placeholder="Ciudad" maxlength="80" value="<?php echo $ciudadpedido; ?>" required/>
                          </div>
                        </div>
                        <div class="form-row mb-4">
                          <div class="col">
                            <?php echo !empty($e3) ? $e3 : ''; ?>
                            <select title="Seleccionar al EJECUTIVO DE VENTAS" name="enviopedido" class="custom-select" aria-required="true" aria-invalid="false" required>
                              <option value="0">Seleccionar al EJECUTIVO DE VENTAS</option>
                              <option value="1"<?php if($enviopedido=='1'){echo ' selected';} ?>>Ejecutivo de Ventas 1</option>
                              <option value="2"<?php if($enviopedido=='2'){echo ' selected';} ?>>Ejecutivo de Ventas 2</option>                                                          
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <div class="center-head"><span class="bg-light-gray txt-light-blue">Sus datos</span></div>
                          </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col">
                                <?php echo !empty($e4) ? $e4 : ''; ?>
                                <input type="text" name="nombre_empresa" class="form-control mb-3" placeholder="Nombre / Razón Social de la empresa" maxlength="100" value="<?php echo $nombre_empresa; ?>" required>
                                <?php echo !empty($e5) ? $e5 : ''; ?>
                                <input type="text" name="direccion_registro" class="form-control mb-3" placeholder="Dirección de registro" maxlength="100" value="<?php echo $direccion_registro; ?>" required>
                                <?php echo !empty($e6) ? $e6 : ''; ?>
                                <input type="text" name="cargo_empresa" class="form-control mb-3" placeholder="Cargo en la empresa" maxlength="50" value="<?php echo $cargo_empresa; ?>" required>                              
                            </div>
                            <div class="col">
                                <?php echo !empty($e7) ? $e7 : ''; ?>
                                <input type="text" name="documento_ruc" class="form-control mb-3" placeholder="Documento de identidad R.U.C." maxlength="11" value="<?php echo $documento_ruc; ?>" required>
                                <?php echo !empty($e8) ? $e8 : ''; ?>
                                <input type="text" name="nombre_contacto" class="form-control mb-3" placeholder="Nombre completo del contacto" maxlength="80" value="<?php echo $nombre_contacto; ?>" required>
                                <?php echo !empty($e9) ? $e9 : ''; ?>
                                <input type="tel" name="telefono_pedido" class="form-control mb-3" placeholder="Teléfono móvil o fijo" maxlength="12" value="<?php echo $telefono_pedido; ?>" required>                              
                            </div>
                            <div class="col-lg-12">
                               <input type="email" name="email_pedido" class="form-control" placeholder="Email" maxlength="80" value="<?php echo $email_pedido; ?>" required>
                               <?php echo !empty($e10) ? $e10 : ''; ?>
                            </div>   
                        </div>
                        <div class="form-row">
                          <div class="col pt-3">
                            <button type="submit" class="form-btn btn-theme bg-blue-light">Enviar solicitud <i class="icofont-rounded-right"></i></button>
                          </div>
                        </div>
                        <input type="hidden" name="actionpedido" value="send">
                    </form>  

                  </div>  
              </div>
            </div>
          </div>        
        </section>
        <!-- Contact Details End -->
      </div>
    </div>
  </div>
</div>
<!-- Request Modal -->

<!-- Back To Top Start -->
<a id="mkdf-back-to-top" href="#" class="off"><i class="icofont-rounded-up"></i></a>
<!-- Back To Top End -->