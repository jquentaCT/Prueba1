<section class="wide-tb-100 bg-light-gray pt-0">
  <div id="close_modal" class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-8 offset-lg-2 wow fadeInUp" data-wow-duration="0" data-wow-delay="0s">
        <div class="free-quote-form contact-page pre">            
            <span id="result_productos"></span> 
            <h1 class="heading-main mb-4">Realiza tu pedido del producto</h1>
            <form id="form_otros_productos" novalidate="novalidate" class="col rounded-field">                
                <div class="form-row mb-4">
                      <div class="col">
                          <input type="text" name="nombreproducto" id="nombreproducto" class="form-control" placeholder="Nombre del Producto" maxlength="80">
                      </div>
                      <div class="col">
                          <input type="text" name="marcaproducto" id="marcaproducto" class="form-control" placeholder="Marca" maxlength="80">
                      </div>
                </div>
                <div class="form-row mb-4">
                      <div class="col">
                          <input type="text" name="codigoproducto" id="codigoproducto" class="form-control" placeholder="Código del Producto" maxlength="15">
                      </div>
                      <div class="col">
                          <input type="text" name="cantidadproducto" id="cantidadproducto" class="form-control" placeholder="Cantidad" maxlength="5" onkeypress="return valnumero(event)">
                      </div>
                </div>                              
                <div class="form-row text-center">
                    <input type="hidden" name="tipo_producto" id="tipo_producto" value="<?php echo !empty($tipo_producto) ? $tipo_producto : ''; ?>">
                    <button name="contactForm" id="send_otros_productos" type="button" class="form-btn mx-auto btn-theme bg-blue-light">Añadir a mi lista de pedidos <i class="icofont-rounded-right"></i></button>
                </div>
            </form>

          </div>
      </div>
    </div>
  </div>
</section>