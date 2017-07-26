<?php
  require_once('config.php');
  $conection = null;

  class DB {
    public static function conectar(){
      try{
        global $conection;
        $conection = new PDO(DB_DNS, DB_USER, DB_PASSWD);
        //$conection -> setAttribute(PDO::ATTR_PERSISTENT, true);
        $conection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo ". ";
      }catch(PDOException $e){
        die("No se ha podido conectar \n" + $e->getMessage());
      }
    }

    public static function desconectar(){
      global $conection;
      $conection = null;
    }
  }

  abstract class DBClass{
    protected $datos = array();

    public function __construct(){
      foreach ($this->datos as $key => $value) {
        if(array_key_exists($key, $this->datos)) $this->datos[$key]=$value;
      }
      
    }

    public function getValor($campo){
      if (array_key_exists($campo, $this->datos)){
        return $this->datos[$campo];
      }
      else die("No se ha podido encontrar el campo.");
    }

    
  }//end class
 ?>
