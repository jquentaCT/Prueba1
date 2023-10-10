<?php
require_once 'class_conexion.php';
include 'function.php';

class Proceso extends Conexion{

     private $sql;
     private $per_page_html;
     private $result;
     private $result_2;

     public function __construct(){
        parent::__construct();
     }

     public static function start(){
        if (session_id() == false){
            session_cache_limiter('private_no_expire');
            session_start();
            //session_regenerate_id();
            session_id();
        }
     }

     public static function destroy(){
  	    if (session_id() == true){
  		      session_unset();
  		      session_destroy();
  	    }
     }

     public static function dump(){
  	    if (session_id() == true){
  		      echo '<pre>';
  		      print_r($_SESSION);
  		      echo '</pre>';
  	    }
     }

     public function start_default(){		        
        @ini_set ('session.cookie_httponly',true);
        @ini_set ('session.cookie_secure',true);
        @ini_set ('session.use_only_cookies',true);        
        //@ini_set ('display_errors', '0');
        //@ini_set ('display_startup_errors', '0');        

        date_default_timezone_set('America/Lima');

        if(!headers_sent()){
            header('X-UA-Compatible: IE=edge,chrome=1');
            header('Content-Type: text/html; charset=utf-8');            
        }
        //error_reporting(0);       
     }

     public function start_upload(){
        set_time_limit(0); 
        @ini_set('upload_max_filesize', '500M'); 
        @ini_set('post_max_size', '500M'); 
        @ini_set('max_input_time', 4000);
     } 

     public function content_security_policy(){ 
        $headerCSP = "Content-Security-Policy:";
        $headerCSP.= "connect-src 'self';";
        $headerCSP.= "default-src 'self' * fonts.gstatic.com;";
        $headerCSP.= "frame-ancestors 'self';";
        $headerCSP.= "frame-src 'none';";
        $headerCSP.= "media-src 'self' * youtube.com * vimeo.com;";
        $headerCSP.= "object-src 'none';";               
        $headerCSP.= "base-uri 'none';";
        $headerCSP.= "img-src 'self' ".URL_SITE." data: *;";                 
        $headerCSP.= "report-uri ".URL_SITE."/violationReportForCSP.php;";
        $headerCSP.= "script-src 'strict-dynamic' ".URL_SITE." 'nonce-"._SYSTEM_NONCE_."' 'unsafe-inline' http: https:;";
        //$headerCSP.= "script-src 'strict-dynamic' ".URL_SITE." https://code.jquery.com https://www.google-analytics.com https://www.googletagmanager.com 'nonce-"._SYSTEM_NONCE_."' 'unsafe-inline' http: https:;";
        $headerCSP.= "style-src 'self' * fonts.googleapis.com 'unsafe-inline';";
        header($headerCSP);
        header('X-Frame-Options: SAMEORIGIN');
        header('X-Content-Type-Options: nosniff');
        header('X-XSS-Protection: 1;mode=block');
     }

     public function set_session_time(){

          if(isset($_SESSION['tiempo']) ) {

              $tiempo_inactivo = 3600; // 60 minutos sin actividad
              $vida_session = time() - $_SESSION['tiempo'];

              if($vida_session > $tiempo_inactivo){
                 self::destroy();
                 header("Location: ./login.php");
                 exit();
               }

          }
          $_SESSION['tiempo'] = time();

      }            

      public function set_item_page($codigo,$item){
          $this->codigo = $codigo;
          $this->item_per_page = $item;
      }

      public function set_mostrar(){

          try{
           $contar = preg_replace('/select (.+) from/i','select count(*) from',$this->codigo);
           $this->result = $this->conectar->prepare($contar);
           $this->result->execute();
           $get_total_rows = $this->result->fetch();
           return ceil($get_total_rows[0]/$this->item_per_page);

          }catch(PDOException $e) {
              echo 'Error de conexion: ', $e->getMessage();
              die();
          }

      }

      public function set_paginacion(){

          try{
              if(isset($_POST["page"])){
                 $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
                 if(!is_numeric($page_number)){die('N&uacute,mero de p&aacute;gina invalida!');}
              }else{
                 $page_number = 1;
              }

              $position = (($page_number-1) * $this->item_per_page);
              $this->result = $this->conectar->prepare($this->codigo." LIMIT $position, $this->item_per_page");
              $this->result->execute();
              return $this->result->fetchALL(PDO::FETCH_ASSOC);

           }catch(PDOException $e) {
              echo 'Error de conexion: ', $e->getMessage();
              die();
           }

      }

      public function set_row_pagination($sql,$pagerow,$search_keyword){

          try{
              $this->sql = $sql;
              $this->per_page_html = '';

              $search_keyword = utf8_decode($search_keyword);
              $page = 1;
              $start = 0;

              if(!empty($_POST["page"])){
                $page = trim($_POST["page"]);
                $start = ($page-1) * $pagerow;
              }

              $this->limit = " limit " . $start . "," . $pagerow;
              $pagination_statement = $this->conectar->prepare($this->sql);
              $pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
              $pagination_statement->execute();
              $row_count = $pagination_statement->rowCount();
              $page_count = ceil($row_count/$pagerow);

              if(!empty($row_count)){

                  $this->per_page_html .= '<div class="pagev">';

                  $max_paginas = 7 ;
                  $pag_anterior = $page - 1 ;
                  if($pag_anterior >= 1) {
                     $this->per_page_html .= '<button type="submit" name="page" value="1" class="m2 btn btn-default btn-sm">&laquo;&laquo;</button>';
                     $this->per_page_html .= '<button type="submit" name="page" value="' . $pag_anterior . '" class="m2 btn btn-default btn-sm">&laquo; Anterior</button>';
                  }
                  if($page_count > $max_paginas) {
                    $this->total_pag_mostrar = $max_paginas ;
                  }
                  else {
                    $this->total_pag_mostrar = $page_count ;
                  }
                  if($page < 2){$calc = 1;} else{$calc = 4;}
                  $pag_desde = ceil($page-$max_paginas/$calc) ;
                  if($pag_desde < 1) {
                     $pag_desde = 1 ;
                  }
                  $pag_hasta = ceil($page + $max_paginas/$calc) ;
                  if($pag_hasta > $page_count) {
                    $pag_hasta = $page_count;
                  }
                  for($a = $pag_desde ; $a <= $pag_hasta ; $a++) {
                      if($a==$page){
                        $this->per_page_html .= '<input type="submit" name="page" value="' . $a . '" class="m2 btn btn-default btn-sm current" />';
                      }else{
                        $this->per_page_html .= '<input type="submit" name="page" value="' . $a . '" class="m2 btn btn-default btn-sm" />';
                      }
                  }
                  $pag_siguiente = $page + 1 ;
                  if($pag_siguiente <= $page_count) {
                   $this->per_page_html .= '<button type="submit" name="page" value="' . $pag_siguiente . '" class="m2 btn btn-default btn-sm">Siguiente &raquo;</button>';
                   $this->per_page_html .= '<button type="submit" name="page" value="' . $page_count . '" class="m2 btn btn-default btn-sm">&raquo;&raquo;</button>';
                  }

                  $this->per_page_html .= '<div class="number">P&aacute;gina N&deg;: '.$page.'</div>';
                  $this->per_page_html .= '</div>';

                  if($pagerow>=$row_count){// si solo es una (1) pagina no se mostrara la paginación
                      $this->per_page_html = '';
                  }

              }

              $query = $this->sql.$this->limit;
              $pdo_statement = $this->conectar->prepare($query);
              $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
              $pdo_statement->execute();
              $result = $pdo_statement->fetchAll();
             
              return $result;

          }catch(PDOException $e) {
              echo 'Error de conexion: ', $e->getMessage();
              die();
          }

      }

      public function set_row_page(){
          return $this->per_page_html;
      }

      public function control_user($login,$clave){

           try{
               $clave = sha1($clave);

               $sql = "select t1.idu,(select modulos from ".TABLE_PREFIX._TAB_PERM_SYS_." where idpe=t1.permisos),t1.permisos ";
               $sql.= "from ".TABLE_PREFIX._TAB_USER_SYS_." t1 ";
               $sql.= "where t1.login=:ema_user and t1.clave=:hash_password and t1.activado='Y'";

               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":ema_user", $login,PDO::PARAM_STR);
               $this->result->bindParam(":hash_password", $clave,PDO::PARAM_STR);
               $this->result->execute();

               $count = $this->result->rowCount();
               $data = $this->result->fetch(PDO::FETCH_BOTH);              
               //$data = $this->result->fetch(PDO::FETCH_OBJ);
               //$this->conectar = null;

               if($count){
                  $_SESSION[SEYCO_PREFIX.'user_id'] = $data['0']; // ID USUARIO
                  $_SESSION[SEYCO_PREFIX.'user_modules'] = $data['1']; // MODULOS DE ACCESO
                  $_SESSION[SEYCO_PREFIX.'user_modules_id'] = $data['2']; // ID MODULOS
                  return true;
               }else{
                  self::destroy();
                  return false;
               }

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function verificar_session(){

          if(isset($_SESSION[SEYCO_PREFIX.'user_id']) && isset($_SESSION[SEYCO_PREFIX.'user_modules'])){
             header("Location: index.php");
             exit();
          }

      }

      public function session_interna(){

          if( empty($_SESSION[SEYCO_PREFIX.'user_id']) && isset($_SESSION[SEYCO_PREFIX.'user_modules'])){
             header("Location: ./login.php");
             exit();
          }
          $this->result = $this->conectar->prepare("SELECT idu FROM ".TABLE_PREFIX._TAB_USER_SYS_." WHERE idu=:id_session and activado='Y'");
          $this->result->bindParam(":id_session", $_SESSION[SEYCO_PREFIX.'user_id'],PDO::PARAM_STR);
          $this->result->execute();
          $data = $this->result->fetch(PDO::FETCH_OBJ);
          //$this->conectar = null;

          if( empty($data->idu) ){
              header("Location: ./login.php");
              self::destroy();
              exit();
          }

      }

      public function set_listar($line,$box){

          try{
              $this->sql = $line;
              $this->result = $this->conectar->prepare($this->sql);
              $this->result->execute();

              while ($row = $this->result->fetch()){
                  echo '<option value="'.$row['0'].'"';
				          if($row['0']==$box){echo ' selected';}
				          echo '>'.utf8_encode($row['1']).'</option>';
              }

          }catch(PDOException $e) {
              echo 'Error de conexion: ', $e->getMessage();
              die();
          }

      }

      public function set_listar_select_array($line,$box){

          try{
              $this->sql = $line;
              $this->result = $this->conectar->prepare($this->sql);
              $this->result->execute();

              while ($row = $this->result->fetch()){
                  echo '<option value="'.$row['0'].'"';
                  $indice = array_search($row['0'], $box);
                  if(isset($indice) && $indice!==false){echo ' selected';}
                  echo '>'.utf8_encode($row['1']).'</option>';
              }

          }catch(PDOException $e) {
              echo 'Error de conexion: ', $e->getMessage();
              die();
          }

      }

      public function set_list_table($xsql){

          $this->sql = $xsql;

          try{
              $this->result = $this->conectar->prepare($this->sql);
              $this->result->execute();
              $data = $this->result->fetchALL(PDO::FETCH_ASSOC);
              return $data;

           }catch(PDOException $e) {
              echo 'Error de conexion: ', $e->getMessage();
              die();
           }

      }

      public function set_list_table_search($xsql,$search_keyword){

          $this->sql = $xsql;

          try{
              $this->result = $this->conectar->prepare($this->sql);
              $this->result->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
              $this->result->execute();
              $data = $this->result->fetchALL(PDO::FETCH_ASSOC);
              return $data;

           }catch(PDOException $e) {
              echo 'Error de conexion: ', $e->getMessage();
              die();
           }

      }

      public function set_list_array($xcen){

         try{
              $this->sql = $xcen;
              $this->result = $this->conectar->prepare($this->sql);
              $this->result->execute();
              return $this->result->fetchALL();
              return $row;

          }catch(PDOException $e) {
              echo 'Error de conexion: ', $e->getMessage();
              die();
          }

      }
      

      public function set_update_perfil($xid,$xlog,$xcla,$xima){

             $xlog = utf8_decode($xlog);
             $xcla = utf8_decode($xcla);

             try{
                 $this->result = $this->conectar->prepare("select idu from ".TABLE_PREFIX._TAB_USER_SYS_." where login=:vlog and idu not in (:user_id)");
                 $this->result->bindParam("user_id", $xid);
                 $this->result->bindParam("vlog", $xlog);
                 $this->result->execute();
                 $count = $this->result->rowCount();

                 if($count>0){ return 1;  }
                 else{

                       if(empty($xcla)){

                          if(!empty($xima)){
                             $this->result_2 = $this->conectar->prepare("select imagen from ".TABLE_PREFIX._TAB_USER_SYS_." where idu=:user_id");
                             $this->result_2->bindParam("user_id", $xid);
                             $this->result_2->execute();
                             $dataimg = $this->result_2->fetch();
                             if(!empty($dataimg['0'])){
                               @unlink("images/users/".$dataimg['0']);
                               @unlink("images/users/tb_".$dataimg['0']);
                             }
                             $this->sql = "update ".TABLE_PREFIX._TAB_USER_SYS_." set login=:vlog,imagen=:vima,modificado=now() where idu=:user_id";
                             $this->result = $this->conectar->prepare($this->sql);
                             $this->result->bindParam("vima", $xima);
                          }else{
                             $this->sql = "update ".TABLE_PREFIX._TAB_USER_SYS_." set login=:vlog,modificado=now() where idu=:user_id";
                             $this->result = $this->conectar->prepare($this->sql);
                          }

                          $this->result->bindParam("user_id", $xid);
                          $this->result->bindParam("vlog", $xlog);

                      }
                      else{

                          if(!empty($xima)){
                             $this->result_2 = $this->conectar->prepare("select imagen from ".TABLE_PREFIX._TAB_USER_SYS_." where idu=:user_id");
                             $this->result_2->bindParam("user_id", $xid);
                             $this->result_2->execute();
                             $dataimg = $this->result_2->fetch();
                             if(!empty($dataimg['0'])){
                               @unlink("images/users/".$dataimg['0']);
                               @unlink("images/users/tb_".$dataimg['0']);
                             }
                             $this->sql = "update ".TABLE_PREFIX._TAB_USER_SYS_." set login=:vlog,clave=:vcla,imagen=:vima,modificado=now() where idu=:user_id";
                             $this->result = $this->conectar->prepare($this->sql);
                             $this->result->bindParam("vima", $xima);
                          }else{
                             $this->sql = "update ".TABLE_PREFIX._TAB_USER_SYS_." set login=:vlog,clave=:vcla,modificado=now() where idu=:user_id";
                             $this->result = $this->conectar->prepare($this->sql);
                          }

                          $this->result->bindParam("user_id", $xid);
                          $this->result->bindParam("vlog", $xlog);
                          $this->result->bindParam("vcla", $xcla);
                     }

                     $this->result->execute();

                     return 2;

                }


            }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
            }

     }

      
      /* USUARIO */
      public function set_grabar_user($xnom,$xape,$xema,$xlog,$xcla,$xper,$xima,$xact){

           $xnom = utf8_decode($xnom);
           $xape = utf8_decode($xape);
           $xema = utf8_decode($xema);
           $xlog = utf8_decode($xlog);
           $xcla = sha1(utf8_decode($xcla));

           try{
               $sql = "select idu from ".TABLE_PREFIX._TAB_USER_SYS_." ";
               $sql.= "where (nombre=:vnom and apellido=:vape) or login=:vlog or email=:vema";

               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":vnom", $xnom);
               $this->result->bindParam(":vape", $xape);
               $this->result->bindParam(":vema", $xema);
               $this->result->bindParam(":vlog", $xlog);
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                   $sql = "insert into ".TABLE_PREFIX._TAB_USER_SYS_."(nombre,apellido,email,login,clave,permisos,imagen,activado,registrado,modificado) ";
                   $sql.= "values(:vnom,:vape,:vema,:vlog,:vcla,:vper,:vima,:vact,now(),now())";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vnom", $xnom);
                   $this->result->bindParam(":vape", $xape);
                   $this->result->bindParam(":vema", $xema);
                   $this->result->bindParam(":vlog", $xlog);
                   $this->result->bindParam(":vcla", $xcla);
                   $this->result->bindParam(":vper", $xper);
                   $this->result->bindParam(":vima", $xima);
                   $this->result->bindParam(":vact", $xact,PDO::PARAM_STR);
                   $this->result->execute();
                   return true;
               }
               else{
                   //$this->conectar = null;
                   return false;
               }


           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_data_user($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $this->sql = "select * from ".TABLE_PREFIX._TAB_USER_SYS_." where idu=:user_id";
                   $this->result = $this->conectar->prepare($this->sql);
                   $this->result->bindParam("user_id", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
             }

      }

      public function set_update_user($xid,$xnom,$xape,$xema,$xlog,$xcla,$xper,$xima,$xact){

             $xnom = utf8_decode($xnom);
             $xape = utf8_decode($xape);
             $xema = utf8_decode($xema);
             $xlog = utf8_decode($xlog);
             $xcla = utf8_decode($xcla);

             try{
                   $sql = "select idu from ".TABLE_PREFIX._TAB_USER_SYS_." ";
                   $sql.= "where ((nombre=:vnom and apellido=:vape) or login=:vlog or email=:vema) and idu not in (:vid)";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid);
                   $this->result->bindParam(":vnom", $xnom);
                   $this->result->bindParam(":vape", $xape);
                   $this->result->bindParam(":vema", $xema);
                   $this->result->bindParam(":vlog", $xlog);
                   $this->result->execute();
                   $count = $this->result->rowCount();

                   if($count > 0){ return false; }
                   else{

                       if(empty($xcla)){

                            if(!empty($xima)){

                               $this->result_2 = $this->conectar->prepare("select imagen from ".TABLE_PREFIX._TAB_USER_SYS_." where idu=:vid");
                               $this->result_2->bindParam(":vid", $xid);
                               $this->result_2->execute();
                               $dataimg = $this->result_2->fetch();

                               if(!empty($dataimg['0'])){
                                  @unlink("images/users/".$dataimg['0']);
                                  @unlink("images/users/tb_".$dataimg['0']);
                               }

                               $sql = "update ".TABLE_PREFIX._TAB_USER_SYS_." ";
                               $sql.= "set nombre=:vnom,
                                           apellido=:vape,
                                           email=:vema,
                                           login=:vlog,
                                           permisos=:vper,
                                           imagen=:vima,
                                           activado=:vact,
                                           modificado=now() ";
                               $sql.= "where idu=:vid";

                               $this->result = $this->conectar->prepare($sql);
                               $this->result->bindParam(":vima", $xima);

                            }else{

                               $sql = "update ".TABLE_PREFIX._TAB_USER_SYS_." ";
                               $sql.= "set nombre=:vnom,
                                           apellido=:vape,
                                           email=:vema,
                                           login=:vlog,
                                           permisos=:vper,
                                           activado=:vact,
                                           modificado=now() ";
                               $sql.= "where idu=:vid";

                               $this->result = $this->conectar->prepare($sql);
                            }

                            $this->result->bindParam(":vid", $xid);
                            $this->result->bindParam(":vnom", $xnom);
                            $this->result->bindParam(":vape", $xape);
                            $this->result->bindParam(":vema", $xema);
                            $this->result->bindParam(":vlog", $xlog);
                            $this->result->bindParam(":vper", $xper);
                            $this->result->bindParam(":vact", $xact);

                       }
                       else{

                            $xcla = sha1($xcla);

                            if(!empty($xima)){

                               $this->result_2 = $this->conectar->prepare("select imagen from ".TABLE_PREFIX._TAB_USER_SYS_." where idu=:vid");
                               $this->result_2->bindParam(":vid", $xid);
                               $this->result_2->execute();

                               $dataimg = $this->result_2->fetch();
                               if(!empty($dataimg['0'])){
                                 @unlink("images/users/".$dataimg['0']);
                                 @unlink("images/users/tb_".$dataimg['0']);
                               }

                               $sql = "update ".TABLE_PREFIX._TAB_USER_SYS_." ";
                               $sql.= "set nombre=:vnom,
                                           apellido=:vape,
                                           email=:vema,
                                           login=:vlog,
                                           clave=:vcla,
                                           permisos=:vper,
                                           imagen=:vima,
                                           activado=:vact,
                                           modificado=now() ";
                               $sql.= "where idu=:vid";

                               $this->result = $this->conectar->prepare($sql);
                               $this->result->bindParam(":vima", $xima);

                            }else{

                               $sql = "update ".TABLE_PREFIX._TAB_USER_SYS_." ";
                               $sql.= "set nombre=:vnom,
                                           apellido=:vape,
                                           email=:vema,
                                           login=:vlog,
                                           clave=:vcla,
                                           permisos=:vper,
                                           activado=:vact,
                                           modificado=now() ";
                               $sql.= "where idu=:vid";

                               $this->result = $this->conectar->prepare($sql);

                            }

                            $this->result->bindParam(":vid", $xid);
                            $this->result->bindParam(":vnom", $xnom);
                            $this->result->bindParam(":vape", $xape);
                            $this->result->bindParam(":vema", $xema);
                            $this->result->bindParam(":vlog", $xlog);
                            $this->result->bindParam(":vcla", $xcla);
                            $this->result->bindParam(":vper", $xper);
                            $this->result->bindParam(":vact", $xact);

                       }

                       $this->result->execute();

                       return true;

                   }


             }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
             }

      }

      public function set_delete_user($xid){

           try{

               /*
               $this->result_2 = $this->conectar->prepare("select imagen from ".TABLE_PREFIX._TAB_USER_SYS_." where idu=:user_id");
               $this->result_2->bindParam("user_id", $xid);
               $this->result_2->execute();
               $dataimg = $this->result_2->fetch();
               if(!empty($dataimg['0'])){
                 @unlink("images/users/".$dataimg['0']);
                 @unlink("images/users/tb_".$dataimg['0']);
               }
               */

               $this->sql = "delete from ".TABLE_PREFIX._TAB_USER_SYS_." where idu=:user_id";
               $this->result = $this->conectar->prepare($this->sql);
               $this->result->bindParam("user_id", $xid,PDO::PARAM_STR);
               $this->result->execute();
               $this->conectar = null;
               
               return true;

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_rol_user($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $this->sql = "select nombre from ".TABLE_PREFIX._TAB_PERMITS_SYS_." where idpe=:per_id";
                   $this->result = $this->conectar->prepare($this->sql);
                   $this->result->bindParam("per_id", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $utf8 = $this->result->fetch();
                   return $utf8['nombre'];

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
             }

      }

      /* ./ USUARIO */
         

      /* HISTORIAL */
      function set_grabar_historial($xvar){

            $xmod = utf8_decode($xvar[0]);
            $xuse = utf8_decode($xvar[1]);
            $xip  = utf8_decode($xvar[2]);
            $xpan = utf8_decode($xvar[3]);
            $xnav = utf8_decode($xvar[4]);
            $xsis = utf8_decode($xvar[5]);
            $xurl = utf8_decode($xvar[6]);
            $xdes = utf8_decode($xvar[7]);

            try{

                $sql = "insert into ".TABLE_PREFIX._TAB_HYST_SYS_."";
                $sql.= "(modulo,usuario,proceso,pantalla,ip,navegador,sistema,url,registrado) ";
                $sql.= "values(:vmod,:vuse,:vdes,:vpan,:vip,:vnav,:vsis,:vurl, now())";

                $this->result = $this->conectar->prepare($sql);
                $this->result->bindParam(":vmod", $xmod);
                $this->result->bindParam(":vuse", $xuse);
                $this->result->bindParam(":vdes", $xdes);
                $this->result->bindParam(":vpan", $xpan);
                $this->result->bindParam(":vip", $xip);
                $this->result->bindParam(":vnav", $xnav);
                $this->result->bindParam(":vsis", $xsis);
                $this->result->bindParam(":vurl", $xurl);
                $this->result->execute();

            }catch(PDOException $e){
                echo 'Error de conexion: ', $e->getMessage();
                die();
            }
            
      }
      /* ./ HISTORIAL */

      
      /* PERMISOS */
      public function set_grabar_permisos($xnom,$xmod){

           $xnom = utf8_decode($xnom);
           $xmod = utf8_decode($xmod);

           try{
               
               $sql = "select idpe from ".TABLE_PREFIX._TAB_PERM_SYS_." where nombre=:vnom";
               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":vnom", $xnom);
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                  $sql = "insert into ".TABLE_PREFIX._TAB_PERM_SYS_."(nombre,modulos,registrado,modificado) values(:vnom,:vmod,now(),now())";
                  $this->result = $this->conectar->prepare($sql);
                  $this->result->bindParam(":vnom", $xnom);
                  $this->result->bindParam(":vmod", $xmod);
                  $this->result->execute();
                  return true;
               }
               else{
                  //$this->conectar = null;
                  return false;
               }

           }catch(PDOException $e) {
              echo 'Error de conexion: ', $e->getMessage();
              die();
           }

      }

      public function get_data_permisos($xid){

          $xid = (int)$xid;

          if(is_int($xid)){
               try{
                 $sql = "select * from ".TABLE_PREFIX._TAB_PERM_SYS_." where idpe=:per_id";
                 $this->result = $this->conectar->prepare($sql);
                 $this->result->bindParam(":per_id", $xid,PDO::PARAM_STR);
                 $this->result->execute();
                 $count = $this->result->rowCount();
                 $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                 if($count){ return array_map("utf8_encode", $utf8); }
                 else{ return false; }

               }catch(PDOException $e) {
                 echo 'Error de conexion: ', $e->getMessage();
                 die();
               }
           }

      }

      public function set_update_permisos($xid,$xnom,$xmod){

             $xnom = utf8_decode($xnom);
             $xmod = utf8_decode($xmod);

             try{
                 $sql = "select idpe from ".TABLE_PREFIX._TAB_PERM_SYS_." where nombre=:vnom and idpe not in(:id)";
                 $this->result = $this->conectar->prepare($sql);
                 $this->result->bindParam(":id", $xid);
                 $this->result->bindParam(":vnom", $xnom);
                 $this->result->execute();
                 $count = $this->result->rowCount();

                 if($count > 0){
                    return false;
                 }else{
                    $sql = "update ".TABLE_PREFIX._TAB_PERM_SYS_." set nombre=:vnom,modulos=:vmod,modificado=now() where idpe=:id";
                    $this->result = $this->conectar->prepare($sql);
                    $this->result->bindParam(":id", $xid);
                    $this->result->bindParam(":vnom", $xnom);
                    $this->result->bindParam(":vmod", $xmod);
                    $this->result->execute();
                    return true;
                 }

             }catch(PDOException $e) {
                 echo 'Error de conexion: ', $e->getMessage();
                 die();
             }

      }

      public function set_delete_permisos($xid){

             try{
                 $this->sql = "delete from ".TABLE_PREFIX._TAB_PERM_SYS_." where idpe=:per_id";
                 $this->result = $this->conectar->prepare($this->sql);
                 $this->result->bindParam("per_id", $xid,PDO::PARAM_STR);
                 $this->result->execute();
                 $this->conectar = null;
                 return true;

             }catch(PDOException $e) {
                 echo 'Error de conexion: ', $e->getMessage();
                 die();
             }

      }
      /* ./ PERMISOS */


      /* PRODUCTOS */
      public function set_grabar_productos($xvar){
           
           $xcod = utf8_decode($xvar[0]);
           $xnom = utf8_decode($xvar[1]);
           $xurl = utf8_decode($xvar[2]);
           $xres = utf8_decode($xvar[3]);
           $xcon = utf8_decode($xvar[4]);
           $xmar = utf8_decode($xvar[5]);          
           $xcat = utf8_decode($xvar[6]);
           $xpre = utf8_decode($xvar[7]);
           $xsto = utf8_decode($xvar[8]);
           $xeti = utf8_decode($xvar[9]);           
           $xima = trim($xvar[10]);
           $xmos = utf8_decode($xvar[11]);
           $xhom = utf8_decode($xvar[12]);
           $xext = utf8_decode($xvar[13]);
           $xuex = utf8_decode($xvar[14]);          
           
           try{
               $sql = "select idp from ".TABLE_PREFIX._TAB_PROD_SYS_." ";
               $sql.= "where codigo=:vcod or nombre=:vnom or variable=:vurl";

               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":vnom", $xnom);
               $this->result->bindParam(":vurl", $xurl);            
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                   $sql = "insert into ".TABLE_PREFIX._TAB_PROD_SYS_;
                   $sql.= "(codigo,nombre,variable,resumen,descripcion,marcas,categorias,precio,stock,mostrar,home,externo,url_externo,imagen1,etiquetas,registrado,modificado) ";
                   $sql.= "values(:vcod,:vnom,:vurl,:vres,:vcon,:vmar,:vcat,:vpre,:vsto,:vmos,:vhom,:vext,:vuex,:vima,:veti,now(),now())";
                   
                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vcod", $xcod);
                   $this->result->bindParam(":vnom", $xnom);
                   $this->result->bindParam(":vurl", $xurl);
                   $this->result->bindParam(":vres", $xres);
                   $this->result->bindParam(":vcon", $xcon);
                   $this->result->bindParam(":vmar", $xmar);
                   $this->result->bindParam(":vcat", $xcat);
                   $this->result->bindParam(":vpre", $xpre);
                   $this->result->bindParam(":vsto", $xsto);
                   $this->result->bindParam(":vmos", $xmos);
                   $this->result->bindParam(":vhom", $xhom);
                   $this->result->bindParam(":vext", $xext);
                   $this->result->bindParam(":vuex", $xuex);                   
                   $this->result->bindParam(":vima", $xima);                  
                   $this->result->bindParam(":veti", $xeti);                                     
                   $this->result->execute();
                   return true;
               }
               else{                   
                   return false;
               }              


           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_data_producto($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $this->sql = "select * from ".TABLE_PREFIX._TAB_PROD_SYS_." where idp=:vid";
                   $this->result = $this->conectar->prepare($this->sql);
                   $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
            }

      }

      public function get_data_producto_code($xid){

            if(!empty($xid)){
                 try{
                   $this->sql = "select * from ".TABLE_PREFIX._TAB_PROD_SYS_." where codigo=:vid";
                   $this->result = $this->conectar->prepare($this->sql);
                   $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
            }

      }

      public function set_update_producto($xid,$xvar){

             $xcod = utf8_decode($xvar[0]);
             $xnom = utf8_decode($xvar[1]);
             $xurl = utf8_decode($xvar[2]);
             $xres = utf8_decode($xvar[3]);
             $xcon = utf8_decode($xvar[4]);
             $xmar = utf8_decode($xvar[5]);          
             $xcat = utf8_decode($xvar[6]);
             $xpre = utf8_decode($xvar[7]);
             $xsto = utf8_decode($xvar[8]);
             $xeti = utf8_decode($xvar[9]);           
             $xima = trim($xvar[10]);
             $xmos = utf8_decode($xvar[11]);
             $xhom = utf8_decode($xvar[12]);
             $xext = utf8_decode($xvar[13]);
             $xuex = utf8_decode($xvar[14]);           

             try{ 
                   $sql = "select idp from ".TABLE_PREFIX._TAB_PROD_SYS_." ";
                   $sql.= "where (codigo=:vcod or nombre=:vnom or variable=:vurl) and idp not in (:vid)";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid);
                   $this->result->bindParam(":vcod", $xcod);
                   $this->result->bindParam(":vnom", $xnom);
                   $this->result->bindParam(":vurl", $xali);                 
                   $this->result->execute();
                   $count = $this->result->rowCount();

                   if($count > 0){ return false; }
                   else{                  

                      $sql = "update ".TABLE_PREFIX._TAB_PROD_SYS_." ";
                      $sql.= "set codigo=:vcod,
                                  nombre=:vnom,
                                  variable=:vurl,
                                  resumen=:vres,
                                  descripcion=:vcon,
                                  marcas=:vmar,
                                  categorias=:vcat,
                                  precio=:vpre,
                                  stock=:vsto,
                                  mostrar=:vmos,
                                  home=:vhom,
                                  externo=:vext,
                                  url_externo=:vuex,"; 
                      if(!empty($xima)){$sql.= "imagen1=:vima,";}                      
                      $sql.= "etiquetas=:veti,modificado=now() ";
                      $sql.= "where idp=:vid";

                      $this->result = $this->conectar->prepare($sql);
                      $this->result->bindParam(":vid", $xid);
                      $this->result->bindParam(":vcod", $xcod);
                      $this->result->bindParam(":vnom", $xnom);
                      $this->result->bindParam(":vurl", $xurl);
                      $this->result->bindParam(":vres", $xres);
                      $this->result->bindParam(":vcon", $xcon);
                      $this->result->bindParam(":vmar", $xmar);
                      $this->result->bindParam(":vcat", $xcat);
                      $this->result->bindParam(":vpre", $xpre);
                      $this->result->bindParam(":vsto", $xsto);
                      $this->result->bindParam(":vmos", $xmos);
                      $this->result->bindParam(":vhom", $xhom);
                      $this->result->bindParam(":vext", $xext);
                      $this->result->bindParam(":vuex", $xuex);                  
                      if(!empty($xima)){$this->result->bindParam(":vima", $xima);}                  
                      $this->result->bindParam(":veti", $xeti);
                      $this->result->execute();
                      return true;

                   }


             }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
             }

      }

      public function set_delete_producto($xid){

           try{              

               $this->sql = "delete from ".TABLE_PREFIX._TAB_PROD_SYS_." where idp=:vid";
               $this->result = $this->conectar->prepare($this->sql);
               $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
               $this->result->execute();
               //$this->conectar = null;               
               return true;

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }
      /* ./ PRODUCTOS */
            

      public function get_count_rows($xsql){

           try{
             $this->sql = $xsql;
             $this->result = $this->conectar->prepare($this->sql);
             $this->result->execute();
             $count = $this->result->rowCount();
             if($count){ return $count; }
             else{ return '0'; }

           }catch(PDOException $e) {
             echo 'Error de conexion: ', $e->getMessage();
             die();
           }

      }

      /* CATEGORIA */      
      public function set_grabar_categoria($xvar){
           
           $xnom = utf8_decode($xvar[0]);
           $xurl = utf8_decode($xvar[1]);           
           $xmos = utf8_decode($xvar[2]);
                    
           try{
               $sql = "select idc from ".TABLE_PREFIX._TAB_CATP_SYS_." ";
               $sql.= "where nombre=:vnom or variable=:vurl";

               $this->result = $this->conectar->prepare($sql);               
               $this->result->bindParam(":vnom", $xnom);
               $this->result->bindParam(":vurl", $xurl);                        
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                   $sql = "insert into ".TABLE_PREFIX._TAB_CATP_SYS_."(nombre,variable,mostrar,registrado,modificado)";
                   $sql.= " values(:vnom,:vurl,:vmos,now(),now())";

                   $this->result = $this->conectar->prepare($sql);             
                   $this->result->bindParam(":vnom", $xnom);                   
                   $this->result->bindParam(":vurl", $xurl);                  
                   $this->result->bindParam(":vmos", $xmos);                 
                   $this->result->execute();
                   return true;
               }
               else{                   
                   return false;
               }              


           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_data_categoria($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $sql = "select * ";
                   $sql.= "from ".TABLE_PREFIX._TAB_CATP_SYS_." ";
                   $sql.= "where idc=:vid";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
            }

      }

      public function set_update_categoria($xid,$xvar){
             
             $xnom = utf8_decode($xvar[0]);
             $xurl = utf8_decode($xvar[1]);           
             $xmos = utf8_decode($xvar[2]);          

             try{ 
                   $sql = "select idc from ".TABLE_PREFIX._TAB_CATP_SYS_." ";
                   $sql.= "where (nombre=:vnom or variable=:vurl) and idc not in (:vid)";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid);
                   $this->result->bindParam(":vnom", $xnom);                 
                   $this->result->bindParam(":vurl", $xurl);                 
                   $this->result->execute();
                   $count = $this->result->rowCount();

                   if($count > 0){ return false; }
                   else{

                      $sql = "update ".TABLE_PREFIX._TAB_CATP_SYS_." ";
                      $sql.= "set nombre=:vnom,variable=:vurl,mostrar=:vmos,modificado=now() ";
                      $sql.= "where idc=:vid";

                      $this->result = $this->conectar->prepare($sql);
                      $this->result->bindParam(":vid", $xid);
                      $this->result->bindParam(":vnom", $xnom);                   
                      $this->result->bindParam(":vurl", $xurl);                  
                      $this->result->bindParam(":vmos", $xmos);                
                      $this->result->execute();
                      return true;

                   }


             }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
             }

      }

      public function set_delete_categoria($xid){

           try{
               $sql = "delete from ".TABLE_PREFIX._TAB_CATP_SYS_." where idc=:vid";
               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
               $this->result->execute();
               //$this->conectar = null;               
               return true;

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }
      /* ./ CATEGORIA */
      
      /* SUBCATEGORIA */      
      public function set_grabar_subcategoria($xvar){
           
           $xnom = utf8_decode($xvar[0]);
           $xurl = utf8_decode($xvar[1]);
           $xcat = utf8_decode($xvar[2]);           
           $xmos = utf8_decode($xvar[3]);
                    
           try{
               $sql = "select ids from ".TABLE_PREFIX._TAB_SCTP_SYS_." ";
               $sql.= "where nombre=:vnom or variable=:vurl";

               $this->result = $this->conectar->prepare($sql);               
               $this->result->bindParam(":vnom", $xnom);
               $this->result->bindParam(":vurl", $xurl);                        
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                   $sql = "insert into ".TABLE_PREFIX._TAB_SCTP_SYS_."(categoria,nombre,variable,mostrar,registrado,modificado)";
                   $sql.= " values(:vcat,:vnom,:vurl,:vmos,now(),now())";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vcat", $xcat);             
                   $this->result->bindParam(":vnom", $xnom);                   
                   $this->result->bindParam(":vurl", $xurl);                  
                   $this->result->bindParam(":vmos", $xmos);                 
                   $this->result->execute();
                   return true;
               }
               else{                   
                   return false;
               }              


           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_data_subcategoria($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $sql = "select * ";
                   $sql.= "from ".TABLE_PREFIX._TAB_SCTP_SYS_." ";
                   $sql.= "where ids=:vid";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
            }

      }

      public function set_update_subcategoria($xid,$xvar){
             
             $xnom = utf8_decode($xvar[0]);
             $xurl = utf8_decode($xvar[1]);
             $xcat = utf8_decode($xvar[2]);           
             $xmos = utf8_decode($xvar[3]);          

             try{ 
                   $sql = "select ids from ".TABLE_PREFIX._TAB_SCTP_SYS_." ";
                   $sql.= "where (nombre=:vnom or variable=:vurl) and ids not in (:vid)";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid);
                   $this->result->bindParam(":vnom", $xnom);                 
                   $this->result->bindParam(":vurl", $xurl);                 
                   $this->result->execute();
                   $count = $this->result->rowCount();

                   if($count > 0){ return false; }
                   else{

                      $sql = "update ".TABLE_PREFIX._TAB_SCTP_SYS_." ";
                      $sql.= "set categoria=:vcat,nombre=:vnom,variable=:vurl,mostrar=:vmos,modificado=now() ";
                      $sql.= "where ids=:vid";

                      $this->result = $this->conectar->prepare($sql);
                      $this->result->bindParam(":vid", $xid);
                      $this->result->bindParam(":vcat", $xcat);
                      $this->result->bindParam(":vnom", $xnom);                   
                      $this->result->bindParam(":vurl", $xurl);                  
                      $this->result->bindParam(":vmos", $xmos);                
                      $this->result->execute();
                      return true;

                   }


             }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
             }

      }

      public function set_delete_subcategoria($xid){

           try{
               $sql = "delete from ".TABLE_PREFIX._TAB_SCTP_SYS_." where ids=:vid";
               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
               $this->result->execute();
               //$this->conectar = null;               
               return true;

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }
      /* ./ SUBCATEGORIA */
      
      
      /* SLIDER */
      public function set_grabar_slider($xvar){

           $xtit = utf8_decode($xvar[0]);
           $xsti = utf8_decode($xvar[1]);
           $xurl = utf8_decode($xvar[2]);           
           $xima = trim($xvar[3]);
           $xmos = utf8_decode($xvar[4]);           
           
           try{
               $sql = "select ids from ".TABLE_PREFIX._TAB_SLID_SYS_." ";
               $sql.= "where nombre=:vnom";

               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam("vnom", $xnom);                   
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                   $sql = "insert into ".TABLE_PREFIX._TAB_SLID_SYS_;
                   $sql.= "(titulo,subtitulo,imagen,url,mostrar,registrado,modificado) ";
                   $sql.= "values(:vtit,:vsti,:vima,:vurl,:vmos,now(),now())";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam("vtit", $xtit);
                   $this->result->bindParam("vsti", $xsti);
                   $this->result->bindParam("vurl", $xurl);                   
                   $this->result->bindParam("vima", $xima);
                   $this->result->bindParam("vmos", $xmos);                   
                   $this->result->execute();
                   return true;
               }
               else{                   
                   return false;
               }              


           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_data_slider($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $this->sql = "select * from ".TABLE_PREFIX._TAB_SLID_SYS_." where ids=:vid_id";
                   $this->result = $this->conectar->prepare($this->sql);
                   $this->result->bindParam("vid_id", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
             }

      }

      public function set_update_slider($xid,$xvar){

             $xtit = utf8_decode($xvar[0]);
             $xsti = utf8_decode($xvar[1]);
             $xurl = utf8_decode($xvar[2]);           
             $xima = trim($xvar[3]);
             $xmos = utf8_decode($xvar[4]);          

             try{ 
                   $sql = "select ids from ".TABLE_PREFIX._TAB_SLID_SYS_." ";
                   $sql.= "where titulo=:vtit and ids not in (:vid_id)";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam("vid_id", $xid);
                   $this->result->bindParam("vtit", $xtit);                                 
                   $this->result->execute();
                   $count = $this->result->rowCount();

                   if($count > 0){ return false; }
                   else{                  

                      $sql = "update ".TABLE_PREFIX._TAB_SLID_SYS_." ";
                      $sql.= "set titulo=:vtit,subtitulo=:vsub,url=:vurl,"; 
                      if(!empty($xima)){$sql.= "imagen=:vima,";}                 
                      $sql.= "mostrar=:vmos,modificado=now() ";
                      $sql.= "where ids=:vids";

                      $this->result = $this->conectar->prepare($sql);
                      $this->result->bindParam("vids", $xid);                
                      $this->result->bindParam("vtit", $xtit);
                      $this->result->bindParam("vsub", $xsti);
                      $this->result->bindParam("vurl", $xurl); 
                      if(!empty($xima)){$this->result->bindParam("vima", $xima);}
                      $this->result->bindParam("vmos", $xmos);                      
                      $this->result->execute();
                      return true;

                   }


             }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
             }

      }

      public function set_delete_slider($xid){

           try{              

               $this->sql = "delete from ".TABLE_PREFIX._TAB_SLID_SYS_." where ids=:vid_id";
               $this->result = $this->conectar->prepare($this->sql);
               $this->result->bindParam("vid_id", $xid,PDO::PARAM_STR);
               $this->result->execute();
               //$this->conectar = null;               
               return true;

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }
      /* ./ SLIDER */

      /* CLIENTES */
      public function set_grabar_cliente($xvar){

           $xnom = utf8_decode($xvar[0]);
           $xurl = utf8_decode($xvar[1]);                     
           $xim1 = trim($xvar[2]);
           $xim2 = trim($xvar[3]);
           $xmos = utf8_decode($xvar[4]);
           
           try{
               $sql = "select idc from ".TABLE_PREFIX._TAB_CLIE_SYS_." ";
               $sql.= "where nombre=:vnom";

               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":vnom", $xnom);                    
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                   $sql = "insert into ".TABLE_PREFIX._TAB_CLIE_SYS_;
                   $sql.= "(nombre,url,imagen1,imagen2,mostrar,registrado,modificado) ";
                   $sql.= "values(:vnom,:vurl,:vim1,:vim2,:vmos,now(),now())";
                   
                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vnom", $xnom);
                   $this->result->bindParam(":vurl", $xurl);
                   $this->result->bindParam(":vim1", $xim1);
                   $this->result->bindParam(":vim2", $xim2);
                   $this->result->bindParam(":vmos", $xmos);                                                      
                   $this->result->execute();
                   return true;
               }
               else{                   
                   return false;
               }              


           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_data_cliente($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $this->sql = "select * from ".TABLE_PREFIX._TAB_CLIE_SYS_." where idc=:vid";
                   $this->result = $this->conectar->prepare($this->sql);
                   $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
            }

      }

      public function set_update_cliente($xid,$xvar){

             $xnom = utf8_decode($xvar[0]);
             $xurl = utf8_decode($xvar[1]);                     
             $xim1 = trim($xvar[2]);
             $xim2 = trim($xvar[3]);
             $xmos = utf8_decode($xvar[4]);          

             try{ 
                   $sql = "select idc from ".TABLE_PREFIX._TAB_CLIE_SYS_." ";
                   $sql.= "where nombre=:vnom and idc not in (:vid)";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid);
                   $this->result->bindParam(":vnom", $xnom);                              
                   $this->result->execute();
                   $count = $this->result->rowCount();

                   if($count > 0){ return false; }
                   else{                  

                      $sql = "update ".TABLE_PREFIX._TAB_CLIE_SYS_." ";
                      $sql.= "set nombre=:vnom,
                                  url=:vurl,                                  
                                  mostrar=:vmos,"; 
                      if(!empty($xim1)){$sql.= "imagen1=:vim1,";}
                      if(!empty($xim2)){$sql.= "imagen2=:vim2,";}                      
                      $sql.= "modificado=now() ";
                      $sql.= "where idc=:vid";

                      $this->result = $this->conectar->prepare($sql);
                      $this->result->bindParam(":vid", $xid);
                      $this->result->bindParam(":vnom", $xnom);
                      $this->result->bindParam(":vurl", $xurl);
                      $this->result->bindParam(":vmos", $xmos);                   
                      if(!empty($xim1)){$this->result->bindParam(":vim1", $xim1);}                 
                      if(!empty($xim2)){$this->result->bindParam(":vim2", $xim2);}
                      $this->result->execute();
                      return true;

                   }


             }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
             }

      }

      public function set_delete_cliente($xid){

           try{              

               $this->sql = "delete from ".TABLE_PREFIX._TAB_CLIE_SYS_." where idc=:vid";
               $this->result = $this->conectar->prepare($this->sql);
               $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
               $this->result->execute();
               //$this->conectar = null;               
               return true;

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }
      /* ./ CLIENTES */


      /* MARCAS */
      public function set_grabar_marca($xvar){

           $xnom = utf8_decode($xvar[0]);
           $xurl = utf8_decode($xvar[1]);                     
           $xim1 = trim($xvar[2]);      
           $xmos = utf8_decode($xvar[3]);
           
           try{
               $sql = "select idm from ".TABLE_PREFIX._TAB_MARC_SYS_." ";
               $sql.= "where nombre=:vnom";

               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":vnom", $xnom);                    
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                   $sql = "insert into ".TABLE_PREFIX._TAB_MARC_SYS_;
                   $sql.= "(nombre,url,imagen1,mostrar,registrado,modificado) ";
                   $sql.= "values(:vnom,:vurl,:vim1,:vmos,now(),now())";
                   
                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vnom", $xnom);
                   $this->result->bindParam(":vurl", $xurl);
                   $this->result->bindParam(":vim1", $xim1);               
                   $this->result->bindParam(":vmos", $xmos);                                                      
                   $this->result->execute();
                   return true;
               }
               else{                   
                   return false;
               }              


           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_data_marca($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $this->sql = "select * from ".TABLE_PREFIX._TAB_MARC_SYS_." where idm=:vid";
                   $this->result = $this->conectar->prepare($this->sql);
                   $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
            }

      }

      public function set_update_marca($xid,$xvar){

             $xnom = utf8_decode($xvar[0]);
             $xurl = utf8_decode($xvar[1]);                     
             $xim1 = trim($xvar[2]);            
             $xmos = utf8_decode($xvar[3]);          

             try{ 
                   $sql = "select idm from ".TABLE_PREFIX._TAB_MARC_SYS_." ";
                   $sql.= "where nombre=:vnom and idm not in (:vid)";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid);
                   $this->result->bindParam(":vnom", $xnom);                              
                   $this->result->execute();
                   $count = $this->result->rowCount();

                   if($count > 0){ return false; }
                   else{                  

                      $sql = "update ".TABLE_PREFIX._TAB_MARC_SYS_." ";
                      $sql.= "set nombre=:vnom,
                                  url=:vurl,                                  
                                  mostrar=:vmos,"; 
                      if(!empty($xim1)){$sql.= "imagen1=:vim1,";}                                 
                      $sql.= "modificado=now() ";
                      $sql.= "where idm=:vid";

                      $this->result = $this->conectar->prepare($sql);
                      $this->result->bindParam(":vid", $xid);
                      $this->result->bindParam(":vnom", $xnom);
                      $this->result->bindParam(":vurl", $xurl);
                      $this->result->bindParam(":vmos", $xmos);                   
                      if(!empty($xim1)){$this->result->bindParam(":vim1", $xim1);}
                      $this->result->execute();
                      return true;

                   }


             }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
             }

      }

      public function set_delete_marca($xid){

           try{              

               $this->sql = "delete from ".TABLE_PREFIX._TAB_MARC_SYS_." where idm=:vid";
               $this->result = $this->conectar->prepare($this->sql);
               $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
               $this->result->execute();
               //$this->conectar = null;               
               return true;

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }
      /* ./ MARCAS */


      /* TRABAJADORES */
      public function set_grabar_trabajadores($xvar){

           $xnom = utf8_decode($xvar[0]);
           $xape = utf8_decode($xvar[1]);
           $xcar = utf8_decode($xvar[2]);
           $xmos = utf8_decode($xvar[3]);
           
           try{
               $sql = "select idv from ".TABLE_PREFIX._TAB_USTB_SYS_." ";
               $sql.= "where nombre=:vnom";

               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":vnom", $xnom);                    
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                   $sql = "insert into ".TABLE_PREFIX._TAB_USTB_SYS_;
                   $sql.= "(nombre,apellidos,cargo,mostrar,registrado,modificado) ";
                   $sql.= "values(:vnom,:vape,:vcar,:vmos,now(),now())";
                   
                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vnom", $xnom);
                   $this->result->bindParam(":vape", $xape);
                   $this->result->bindParam(":vcar", $xcar);
                   $this->result->bindParam(":vmos", $xmos);                                                      
                   $this->result->execute();
                   return true;
               }
               else{                   
                   return false;
               }              


           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_data_trabajadores($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $this->sql = "select * from ".TABLE_PREFIX._TAB_USTB_SYS_." where idv=:vid";
                   $this->result = $this->conectar->prepare($this->sql);
                   $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
            }

      }

      public function set_update_trabajadores($xid,$xvar){

             $xnom = utf8_decode($xvar[0]);
             $xape = utf8_decode($xvar[1]);
             $xcar = utf8_decode($xvar[2]);
             $xmos = utf8_decode($xvar[3]);          

             try{ 
                   $sql = "select idv from ".TABLE_PREFIX._TAB_USTB_SYS_." ";
                   $sql.= "where nombre=:vnom and idv not in (:vid)";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid);
                   $this->result->bindParam(":vnom", $xnom);                              
                   $this->result->execute();
                   $count = $this->result->rowCount();

                   if($count > 0){ return false; }
                   else{                  

                      $sql = "update ".TABLE_PREFIX._TAB_USTB_SYS_." ";
                      $sql.= "set nombre=:vnom,
                                  apellidos=:vape,                                  
                                  cargo=:vcar,
                                  mostrar=:vmos,
                                  modificado=now() ";
                      $sql.= "where idv=:vid";

                      $this->result = $this->conectar->prepare($sql);
                      $this->result->bindParam(":vid", $xid);
                      $this->result->bindParam(":vnom", $xnom);
                      $this->result->bindParam(":vape", $xape);
                      $this->result->bindParam(":vcar", $xcar);
                      $this->result->bindParam(":vmos", $xmos);
                      $this->result->execute();
                      return true;

                   }


             }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
             }

      }

      public function set_delete_trabajadores($xid){

           try{              

               $this->sql = "delete from ".TABLE_PREFIX._TAB_USTB_SYS_." where idv=:vid";
               $this->result = $this->conectar->prepare($this->sql);
               $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
               $this->result->execute();
               //$this->conectar = null;               
               return true;

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }
      /* ./ TRABAJADORES */

      /* CLIENTES SATISFECHOS */
      public function set_grabar_satisfecho($xvar){

           $xnom = utf8_decode($xvar[0]);           
           $xcom = utf8_decode($xvar[1]);
           $xsex = utf8_decode($xvar[2]);
           $xmos = utf8_decode($xvar[3]);           
           
           try{
               $sql = "select ids from ".TABLE_PREFIX._TAB_CSAT_SYS_." ";
               $sql.= "where nombre=:vnom";

               $this->result = $this->conectar->prepare($sql);
               $this->result->bindParam(":vnom", $xnom);                    
               $this->result->execute();
               $data = $this->result->fetch();

               if(empty($data[0])){
                   $sql = "insert into ".TABLE_PREFIX._TAB_CSAT_SYS_;
                   $sql.= "(nombre,comentarios,sexo,mostrar,registrado,modificado) ";
                   $sql.= "values(:vnom,:vcom,:vsex,:vmos,now(),now())";
                   
                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vnom", $xnom);
                   $this->result->bindParam(":vcom", $xcom);
                   $this->result->bindParam(":vsex", $xsex);
                   $this->result->bindParam(":vmos", $xmos);             
                   $this->result->execute();
                   return true;
               }
               else{                   
                   return false;
               }              


           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }

      public function get_data_satisfecho($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $this->sql = "select * from ".TABLE_PREFIX._TAB_CSAT_SYS_." where ids=:vid";
                   $this->result = $this->conectar->prepare($this->sql);
                   $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
            }

      }

      public function set_update_satisfecho($xid,$xvar){

             $xnom = utf8_decode($xvar[0]);           
             $xcom = utf8_decode($xvar[1]);
             $xsex = utf8_decode($xvar[2]);
             $xmos = utf8_decode($xvar[3]);          

             try{ 
                   $sql = "select ids from ".TABLE_PREFIX._TAB_CSAT_SYS_." ";
                   $sql.= "where nombre=:vnom and ids not in (:vid)";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid);
                   $this->result->bindParam(":vnom", $xnom);                              
                   $this->result->execute();
                   $count = $this->result->rowCount();

                   if($count > 0){ return false; }
                   else{                  

                      $sql = "update ".TABLE_PREFIX._TAB_CSAT_SYS_." ";
                      $sql.= "set nombre=:vnom,
                                  comentarios=:vcom,
                                  sexo=:vsex,                                  
                                  mostrar=:vmos,
                                  modificado=now() ";
                      $sql.= "where ids=:vid";

                      $this->result = $this->conectar->prepare($sql);
                      $this->result->bindParam(":vid", $xid);
                      $this->result->bindParam(":vnom", $xnom);
                      $this->result->bindParam(":vcom", $xcom);
                      $this->result->bindParam(":vsex", $xsex);
                      $this->result->bindParam(":vmos", $xmos);
                      $this->result->execute();
                      return true;

                   }


             }catch(PDOException $e) {
                  echo 'Error de conexion: ', $e->getMessage();
                  die();
             }

      }

      public function set_delete_satisfecho($xid){

           try{              

               $this->sql = "delete from ".TABLE_PREFIX._TAB_CSAT_SYS_." where ids=:vid";
               $this->result = $this->conectar->prepare($this->sql);
               $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
               $this->result->execute();
               //$this->conectar = null;               
               return true;

           }catch(PDOException $e) {
               echo 'Error de conexion: ', $e->getMessage();
               die();
           }

      }
      /* ./ CLIENTES SATISFECHOS */


      public function get_data_pais($xid){

            $xid = (int)$xid;

            if(is_int($xid)){
                 try{
                   $sql = "select * ";
                   $sql.= "from ".TABLE_PREFIX._TAB_PAIS_SYS_." ";
                   $sql.= "where idp=:vid";

                   $this->result = $this->conectar->prepare($sql);
                   $this->result->bindParam(":vid", $xid,PDO::PARAM_STR);
                   $this->result->execute();
                   $count = $this->result->rowCount();
                   $utf8 = $this->result->fetch(PDO::FETCH_ASSOC);

                   if($count){ return array_map("utf8_encode", $utf8); }
                   else{ return false; }

                 }catch(PDOException $e) {
                   echo 'Error de conexion: ', $e->getMessage();
                   die();
                 }
            }

      }       

}
?>
