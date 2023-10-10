<?php
require_once 'config.php';
abstract class Conexion{

   protected $conectar;

   public function __construct(){
        try{
            $this->conectar = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
            $this->conectar->exec("set names ".DB_CHARSET);
        }catch(PDOException $ex){
            echo 'Error de conexion: ', $ex->getMessage();
            die();
        }
   } 

   abstract public function set_listar($line,$box);   
   abstract public function control_user($login,$clave);  
   abstract public function set_item_page($codigo,$item);
   abstract public function set_mostrar();
   abstract public function set_paginacion();  
}
?>