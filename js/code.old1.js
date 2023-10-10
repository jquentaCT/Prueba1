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
         var valor = parseInt($('#ca'+ipd).html()) + 1;
         valor = $.trim(valor);       
         $('#ca'+ipd).html(valor);       
         $.post("js/process-cantidad.php",{
           cantidad: valor, ope: "1", id: ipd
         },
         function(data, status){
             /*alert("Data: " + data + "\nStatus: " + status);*/
             $('#im'+ipd).html(data);
         });
    });

    $(".btn_menos").click(function(){      
         var ipd = $(this).attr('rel'); 
         var valor = parseInt($('#ca'+ipd).html()) - 1;
         valor = $.trim(valor);
         $('#ca'+ipd).html(valor);       
         if(valor==0){
            alert("La cantidad solicitada no puede ser CERO");
            $('#ca'+ipd).html('1');
            valor = 1;    
         }
         $.post("js/process-cantidad.php", {
           cantidad: valor, ope: "2", id: ipd
         },
         function(data, status){
             /*alert("Data: " + data + "\nStatus: " + status);*/
             $('#im'+ipd).html(data);
         });
    });

    $(".btn_delete").click(function(){      
         var ipd = $.trim($(this).attr('rel')); 
         $('#bp'+ipd).removeClass("boxpedido");          
         $('#bp'+ipd).html('');       
         $.post("js/process-delete.php", {vpd: ipd});
    });

    $('#blogCarousel').carousel({
        interval: 5000
    });

}); 

function refreshCaptcha() {
    $("#code_captcha").attr("src","captcha.php");
}     