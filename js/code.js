$(document).ready(function(){ 
         
    $("div.thumb-nos a img").click(function(){    	
      	 var src = $(this).attr('src');
  		   var res = src.replace(/thumb-/gi, "");

      	 $("#tnos").fadeOut(1000, function() {			
    			  $("#tnos").attr('src',res);
    		 }).fadeIn(1000);

  		   return false;	
  	});

  	$('.cotiprod').click(function(){

        var ipd = $(this).attr('rel');         

        $.ajax({
            data:        'ipd='+ipd,
            url:         'js/process-data.php',
            cache:       false,
            async:       true,
            dataType:    'html',
            contentType: "application/x-www-form-urlencoded",
            type:        'post',
            beforeSend: function () {
               $("#suc"+ipd).html('Procesando ...');  
            },
            success:  function(data){                         
               $("#suc"+ipd).html(data);                 
            }
        });

        $.post("js/process-count.php", function(data) {
               var mensaje = '<div class="text-center">';
               mensaje += '<div><img src="images/check-icon.svg" style="margin-bottom:10px"/></div>';
               mensaje += '<p>El producto fue agregado a su</p>';
               mensaje += '<a href="./pedidos.php" class="text-success"><strong>LISTA DE PEDIDOS</strong></a>';
               mensaje += '</div>';
               bootbox.alert(mensaje);              
               $("#count_prod").html(data);
        });
                   
    });

    $(".btn_mas").click(function(){      
         var ipd = $(this).attr('rel');
         var valor = parseInt($('#'+ipd).html()) + 1;
         valor = $.trim(valor);       
         $('#'+ipd).html(valor);       
         $.post("js/process-cantidad.php",{
           cantidad: valor, ope: "1", id: ipd
         },
         function(data, status){
             /*alert("Data: " + data + "\nStatus: " + status);*/            
         });
    });

    $(".btn_menos").click(function(){      
         var ipd = $(this).attr('rel'); 
         var valor = parseInt($('#'+ipd).html()) - 1;
         valor = $.trim(valor);
         $('#'+ipd).html(valor);       
         if(valor==0){
            alert("La cantidad solicitada no puede ser CERO");
            $('#'+ipd).html('1');
            valor = 1;    
         }
         $.post("js/process-cantidad.php", {
           cantidad: valor, ope: "2", id: ipd
         },
         function(data, status){
             /*alert("Data: " + data + "\nStatus: " + status);*/             
         });
    });

    $(".btn_delete").click(function(){      
         var ipd = $.trim($(this).attr('rel')); 
         $('#bp'+ipd).removeClass("boxpedido");          
         $('#bp'+ipd).html('');       
         $.post("js/process-delete.php", {vpd: ipd});
    });

    $('#send_otros_productos').click(function(){
       
        $.ajax({
            data: $('#form_otros_productos').serialize(),
            url:         'js/process-data-productos.php',
            cache:       false,
            async:       true,
            dataType:    'html',
            contentType: "application/x-www-form-urlencoded",
            type:        'post',
            beforeSend: function () {
               $("#result_productos").html('Procesando ...');  
            },
            success:  function(data){                         
               $("#result_productos").html(data);
               var send = data.split("bg-validacion-success");
               if(send[1]){
                 $("#nombreproduct").val('');
                 $("#marcaproducto").val('');
                 $("#codigoproducto").val('');
                 $("#cantidadproducto").val('');
               }
            }
        });

        $.post("js/process-count.php", function(data) {
               var mensaje = '<div class="text-center">';
               mensaje += '<div><img src="images/check-icon.svg" style="margin-bottom:10px"/></div>';
               mensaje += '<p>El producto fue agregado a su</p>';
               mensaje += '<a href="./pedidos.php" class="text-success"><strong>LISTA DE PEDIDOS</strong></a>';
               mensaje += '</div>';
               bootbox.alert(mensaje);              
               $("#count_prod").html(data);
        });
                   
    });

    $('#send_servicios').click(function(){
       
        $.ajax({
            data: $('#form_servicios').serialize(),
            url:         'js/process-data-servicios.php',
            cache:       false,
            async:       true,
            dataType:    'html',
            contentType: "application/x-www-form-urlencoded",
            type:        'post',
            beforeSend: function () {
               $("#result_servicios").html('Procesando ...');  
            },
            success:  function(data){                         
               $("#result_servicios").html(data);
               var send = data.split("bg-validacion-success");
               if(send[1]){
                 $("#ser1").prop("checked", false);
                 $("#ser2").prop("checked", false);
                 $("#ser3").prop("checked", false);
                 $("#nombreproducto").val('');
                 $("#marcaproducto").val('');
                 $("#codigoproducto").val('');
                 $("#serieproducto").val('');
                 $("#text_observaciones").val('');
               }
            }
        });

        $.post("js/process-count.php", function(data) {
               var mensaje = '<div class="text-center">';
               mensaje += '<div><img src="images/check-icon.svg" style="margin-bottom:10px"/></div>';
               mensaje += '<p>El producto fue agregado a su</p>';
               mensaje += '<a href="./pedidos.php" class="text-success"><strong>LISTA DE PEDIDOS</strong></a>';
               mensaje += '</div>';
               bootbox.alert(mensaje);              
               $("#count_prod").html(data);
        });
                   
    });

    $('#blogCarousel').carousel({
        interval: 5000
    });
    
    $("#close_modal").click(function(){      
        $('#result_productos').html('');
        $('#result_servicios').html('');
    });

    $("#backLink").click(function(event) {
        event.preventDefault();
        history.back(1);
    });

}); 

function refreshCaptcha() {
    $("#code_captcha").attr("src","captcha.php");
}

function valnumero(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==0) return true; // firefox al tab y shift+tab lo toma como 0
    if (tecla==8) return true; // 3
    patron =/[0123456789]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function txtuppercase(e) {
    e.value = e.value.toUpperCase();
}

function txtlowercase(e) {
    e.value = e.value.toLowerCase();
}

function close_form(){
           
}    