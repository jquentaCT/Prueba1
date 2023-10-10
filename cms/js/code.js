$(document).ready(function() {
    
    $('#input_nombre').keyup(function(){
        var valor = $.trim($('#input_nombre').val());
        $.ajax({
          url: 'js/set-alias.php',
          type: 'POST',
          data: 'variable='+valor,
          success: function(data) {
             $('#input_alias').val(data);
          }/*,
          error: function(e) {
            alert("Hubo un error en la ejecucion del PROCESO AGREGAR");
          }*/
        });
    });

    $('#input_alias').blur(function() {
        var valor = $.trim($('#input_alias').val());
        $.ajax({
          url: 'js/set-alias.php',
          type: 'POST',
          data: 'variable='+valor,
          success: function(data) {
             $('#input_alias').val(data);
          }/*,
          error: function(e) {
            alert("Hubo un error en la ejecucion del PROCESO AGREGAR");
          }*/
        });
    });
		
  	$("#orden").keyup(function(){
  	   var valor = $("#orden").val();
  	   if(valor>20){$("#orden").val('20');}
         else if(valor<0){$("#orden").val('0');}
         else if(valor=='e' || valor=='E'){$("#orden").val('0');}
  	});

    $('#val_results').keyup(function() {
        var valor = $.trim($('#val_results').val());
        $('#resultado_anime').html('<div class="text-center"><img src="images/loading.gif"/></div>');
        $.ajax({
          url: 'js/search_anime.php',
          type: 'POST',
          data: 'variable='+valor,
          success: function(data) {
             $('#resultado_anime').html(data);
          }/*,
          error: function(e) {
            alert("Hubo un error en la ejecucion del PROCESO AGREGAR");
          }*/
        });
    });

    $('#btn_results').click(function() {
        var valor = $.trim($('#val_results').val());
        $('#resultado_anime').html('<div class="text-center"><img src="images/loading.gif"/></div>');
        $.ajax({
          url: 'js/search_anime.php',
          type: 'POST',
          data: 'variable='+valor,
          success: function(data) {
             $('#resultado_anime').html(data);
          }/*,
          error: function(e) {
            alert("Hubo un error en la ejecucion del PROCESO AGREGAR");
          }*/
        });
    });

    $('#list_temporada').keyup(function() {
        var valor = $.trim($('#list_temporada').val());
      
        $.ajax({
          url: 'js/search_anime_temporadas.php',
          type: 'POST',
          data: 'variable='+valor,
          success: function(data) {
             $('#list_temporada1').html(data);
          }/*,
          error: function(e) {
            alert("Hubo un error en la ejecucion del PROCESO AGREGAR");
          }*/
        });
    });

    $('#list_voces').keyup(function() {
        var valor = $.trim($('#list_voces').val());
      
        $.ajax({
          url: 'js/search_reparto_voces.php',
          type: 'POST',
          data: 'variable='+valor,
          success: function(data) {
             $('#list_voces1').html(data);
          }/*,
          error: function(e) {
            alert("Hubo un error en la ejecucion del PROCESO AGREGAR");
          }*/
        });
    });
        

    $("#modal_anime").on("hidden.bs.modal", function (e) {
       $('#val_results').val('');            
       $('#resultado_anime').html('<div class="text-center"><img src="images/icon-search.jpg" alt="SEARCH" /></div>'); 
    });

    $("input[type=text],input[type=email],input[type=tel]").keyup(function() {
       var valor = $(this).val();
       $(this).val(cod_ascii(strip_tags(valor)));
    });

    $("input[type=text],input[type=email],input[type=tel]").blur(function(){
       var valor = $(this).val();
       $(this).val(cod_ascii($.trim(strip_tags(valor))));
    });

    $('.btndelprocess').click(function(){
        var rel = $.trim($(this).attr('rel'));
        var part = rel.split("-");
        bootbox.confirm({
            message: "¿ESTÁ SEGURO QUE DESEA ELIMINAR ESTE REGISTRO?",
            buttons: {
                confirm: {label: 'SI DESEO',className: 'btn-info'},
                cancel: {label: 'NO DESEO',className: 'btn-danger'}
            },
            callback: function (result){
                if(result==true){
                   if(part[1]=='productos'){ var archivo = 'proceso-productos.php'; }
                   else if(part[1]=='categorias'){ var archivo = 'proceso-categoria.php'; }
                   else if(part[1]=='subcategorias'){ var archivo = 'proceso-subcategoria.php'; }
                   else if(part[1]=='clientes'){ var archivo = 'proceso-clientes.php'; }
                   else if(part[1]=='satisfechos'){ var archivo = 'proceso-satisfechos.php'; }
                   else if(part[1]=='marcas'){ var archivo = 'proceso-marcas.php'; }
                   else if(part[1]=='usuarios'){ var archivo = 'proceso-usuarios.php'; }                
                   $(location).attr('href', './'+archivo+'?v=borrar&cod='+part[0]);                 
                }
            }
        });
    });

    $('#list_voces1').click(function(){
        var val = $(this).val();
        var nombre = $.trim($('#list_voces1 option:selected').text());       
        if (nombre.length > 0){

             var detector = nombre.split('-->');
             if(detector[1]){

                bootbox.prompt("PERSONAJE a representar por "+nombre.toUpperCase(), function(result){             
                    if(result.length > 0){
                       $('#list_voces1 option:selected').text(detector[0]+'-->'+result.toUpperCase());
                    } 
                });

             }else{ 

                bootbox.prompt("PERSONAJE a representar por "+nombre.toUpperCase(), function(result){             
                    if(result.length > 0){
                       $('#list_voces1 option:selected').text(nombre+'-->'+result.toUpperCase());
                    } 
                });

             }       
                
        }  

    });

    $("#input_codigogd").keyup(function () {  
       $(this).val($(this).val().toUpperCase());  
    });

    /*
    $("input[id^=externa]").click(function(){
        alert($(this).val());
    });

    $("input[name='externa']").click(function(){
        alert($(this).val());
    });
    */

});

function get_personaje(){
   var n1 = $.trim($('#list_voces1 option:selected').text());
   var n2 = $.trim($('#list_voces1 option:selected').val());
   var detector = n1.split('-->');
   if(detector[1]){
      var textarea = $('#lista_voces').val();
      $('#lista_voces').val(n2+'-->'+detector[1]+':::'+textarea);
   }
}

function set_personaje(){
   $('#list_voces2 :selected').each(function(i, sel){
      var n1 = $.trim($(sel).text());
      var n2 = n1.split('-->');
      if(n2[1]){$(sel).text(n2[0]);}
      else{         
         var res = n1.substring(n1.length - 3, n1.length);
         if(res=='-->'){$(sel).text(n2[0]);}
      }
   });   
   
   var textarea = '';
   $('#list_voces2 option').each(function() {
      var n1 = $.trim($(this).text());
      var n2 = $.trim($(this).val());
      var n3 = n1.split('-->');
      if ($(this).prop("selected") == false){
         textarea+= n2+'-->'+n3[1]+':::';
      }
   });

   $('#lista_voces').val(textarea);  
}

function count_personaje(){  
   var i = 0; 
     
   $('#list_voces2 :selected').each(function(i, sel){
      if($(sel).val().length == 0 && $(sel).text().length == 0){ 
          i++;
      }
   });

   if(i>0){ $('#lista_voces').val(''); }   
}

function slvi(id){    
    var name = $.trim($('#cc'+id).val());
    var url = $.trim($('#vv'+id).val()); 
    $('#video').val(id);
    $('#url_anime').val(url);
    $('#vd').html(url);
    $('#namevideo').val(name); 
    $("#modal_anime").modal('hide');       
}   

function valnumero(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==0) return true; // firefox al tab y shift+tab lo toma como 0
    if (tecla==8) return true; // 3
    patron =/[0123456789]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function strip_tags(str) {
    str = str.toString();
    return str.replace(/<\/?[^>]+>/gi, '');
}

function cod_ascii(txt){

    txt = txt.replace('&amp;', '&');
    txt = txt.replace('&iquest;', '¿');
    txt = txt.replace('&iexcl;', '¡');
    txt = txt.replace('&lt;', '<');
    txt = txt.replace('&gt;', '>');
    txt = txt.replace('&quot;', '"');
    txt = txt.replace("&apos;", "'");
    txt = txt.replace('&aacute;', 'á');
    txt = txt.replace('&eacute;', 'é');
    txt = txt.replace('&iacute;', 'í');
    txt = txt.replace('&oacute;', 'ó');
    txt = txt.replace('&uacute;', 'ú');
    txt = txt.replace('&ntilde;', 'ñ');
    txt = txt.replace('&Aacute;', 'Á');
    txt = txt.replace('&Eacute;', 'É');
    txt = txt.replace('&Iacute;', 'Í');
    txt = txt.replace('&Oacute;', 'Ó');
    txt = txt.replace('&Uacute;', 'Ú');
    txt = txt.replace('&Ntilde;', 'Ñ');
    txt = txt.replace('&auml;', 'ä');
    txt = txt.replace('&euml;', 'ë');
    txt = txt.replace('&iuml;', 'ï');
    txt = txt.replace('&ouml;', 'ö');
    txt = txt.replace('&uuml;', 'ü');
    txt = txt.replace('&Auml;', 'Ä');
    txt = txt.replace('&Euml;', 'Ë');
    txt = txt.replace('&Iuml;', 'Ï');
    txt = txt.replace('&Ouml;', 'Ö');
    txt = txt.replace('&Uuml;', 'Ñ');
    return txt;

}

function confirmar(mensaje) {
   return confirm(mensaje);
}

var openedWindow;

function openWindow(ventana){
  openedWindow = window.open(ventana);
}

function closeOpenedWindow(){
  openedWindow.close();
}


/**
 * Function : dump()
 * Arguments: The data - array,hash(associative array),object
 *    The level - OPTIONAL
 * Returns  : The textual representation of the array.
 * This function was inspired by the print_r function of PHP.
 * This will accept some data as the argument and return a
 * text that will be a more readable version of the
 * array/hash/object that is given.
 * Docs: http://www.openjs.com/scripts/others/dump_function_php_print_r.php
 */
function dump(arr,level) {
  var dumped_text = "";
  if(!level) level = 0;
  
  //The padding given at the beginning of the line.
  var level_padding = "";
  for(var j=0;j<level+1;j++) level_padding += "    ";
  
  if(typeof(arr) == 'object') { //Array/Hashes/Objects 
    for(var item in arr) {
      var value = arr[item];
      
      if(typeof(value) == 'object') { //If it is an array,
        dumped_text += level_padding + "'" + item + "' ...\n";
        dumped_text += dump(value,level+1);
      } else {
        dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
      }
    }
  } else { //Stings/Chars/Numbers etc.
    dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
  }
  return dumped_text;
}