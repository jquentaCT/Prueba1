<section class="wide-tb-100 bg-light-gray pt-0">
  <div id="close_modal" class="container">   
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-8 offset-lg-2 wow fadeInUp" data-wow-duration="0" data-wow-delay="0s">
        <div class="free-quote-form contact-page pre">
            <span id="result_servicios"></span>            
            <h1 class="heading-main mb-4">Solicita nuestros servicios</h1>
            <form id="form_servicios" novalidate="novalidate" class="col rounded-field">
                <div class="form-row mb-4">
                     <div class="col-lg-2">Servicio:</div>
                     <div class="col-lg-10">
                            <input type="checkbox" id="ser1" name="ser1" value="1">
                            <label for="ser1"> Mantenimiento Preventivo</label>
                            &nbsp;&nbsp;
                            <input type="checkbox" id="ser2" name="ser2" value="1">
                            <label for="ser2"> Mantenimiento Correctivo</label>
                            &nbsp;&nbsp;
                            <input type="checkbox" id="ser3" name="ser3" value="1">
                            <label for="ser3"> Calibración</label>
                     </div>                    
                </div>
                <div class="form-row mb-4">
                      <div class="col-lg-12">
                          <input type="text" name="nombreproducto" id="nombreproducto" class="form-control" placeholder="Nombre del Producto a realizar" maxlength="80" required>                  
                      </div>                    
                </div>  
                <div class="form-row mb-4">                     
                      <div class="col-lg-6">
                          <input type="text" name="marcaproducto" id="marcaproducto" class="form-control" placeholder="Marca" maxlength="80" required>                        
                      </div>
                      <div class="col-lg-6">
                          <input type="text" name="codigoproducto" id="codigoproducto" class="form-control" placeholder="Código / Módelo del Producto" maxlength="15" required>                       
                      </div>
                </div>
                <div class="form-row mb-4">                      
                      <div class="col-lg-6">
                          <input type="text" name="serieproducto" id="serieproducto" class="form-control" placeholder="Nro. de serie" maxlength="15" required>                        
                      </div>
                      <div class="col-lg-6"></div>                    
                </div>

                <div class="form-group">
                    <label for="text_resumen">Observaciones:</label>
                    <textarea name="observacionesproducto" class="form-control" id="text_observaciones" rows="8" maxlength="700"></textarea>                
                    <script type="text/javascript" nonce="<?php echo _SYSTEM_NONCE_; ?>">
                          $('#text_observaciones').characterCounter({
                              maxlength: 700,
                              blockextra: true
                          });
                    </script>
                </div>                

                <div class="form-row text-center">                    
                    <button name="contactForm" id="send_servicios" type="button" class="form-btn mx-auto btn-theme bg-blue-light">Añadir a mi lista de pedidos <i class="icofont-rounded-right"></i></button>
                </div>
            </form>

          </div>
      </div>
    </div>
  </div>
</section>