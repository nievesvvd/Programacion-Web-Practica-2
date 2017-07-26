<?php
  require_once('dataset.php');

  class Comentarios extends DBClass{
    protected $datos =array(
      "idComentario" => "",
      "comentario" => "",
      "usuario" => "",
      "fecha" => "",
      "entrada" => ""
    );

    public function getComentarios($entrada){
        global $conection;
        $consulta = "SELECT * FROM comentarios WHERE entrada = '$entrada' ORDER BY fecha desc";
        $sentencia = $conection->prepare($consulta);
        try{
          $sentencia->execute();
          $comentario=$conection->query($consulta);
          return $comentario;
        }catch (PDOException $e) {
        echo "Consulta fallida: " .$e -> getMessage();
      }
    }

    public function aniadirComentario($texto, $usuario, $entrada){
      global $conection;
      $consulta="INSERT INTO comentarios(comentario, usuario, fecha, entrada)
        VALUES(:texto, :usuario, NOW(), :entrada)" ;
        $sentencia=$conection->prepare($consulta);
      try{
        $sentencia->bindValue(":texto", $texto, PDO::PARAM_STR);
        $sentencia->bindValue(":usuario", $usuario, PDO::PARAM_STR);
        $sentencia->bindValue(":entrada", $entrada, PDO::PARAM_STR);
        $sentencia->execute();
        return $consulta;
      }catch(PDOException $e) {
        echo "Consulta fallida: " .$e -> getMessage();
        return $consulta;
      }
    }
  }

 ?>
