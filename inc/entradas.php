<?php
  require_once('dataset.php');

  class Entradas extends DBClass{
    protected $datos =array(
      "idEntrada" => "",
      "titulo" => "",
      "cuerpo" => "",
      "fecha" => "",
      "usuario" => "",
      "foto" => ""
    );

     function getEntrada($id){
      global $conection;
      $consulta = "SELECT * FROM entradas where idEntrada = '$id'";
      $sentencia = $conection->prepare($consulta);
      try{
        $sentencia->execute();
        $entradas=$conection->query($consulta);
        return $entradas;
      }catch (PDOException $e) {
        echo "Consulta fallida: $consulta" .$e -> getMessage();
      }
    }

    function getUserEntrada($id){
      global $conection;
      $consulta = "SELECT * FROM entradas where usuario = '$id' ORDER BY fecha desc";
      $sentencia = $conection->prepare($consulta);
      try{
        $sentencia->execute();
        $entradas=$conection->query($consulta);
        return $entradas;
      }catch (PDOException $e) {
        echo "Consulta fallida: $consulta" .$e -> getMessage();
      }
    }

    function getAllEntradas(){
      global $conection;
      $consulta = "SELECT * FROM entradas ORDER BY fecha desc";
      $sentencia = $conection -> prepare($consulta);
      try{
        $sentencia -> execute();
        $entradas=$conection->query($consulta);
        return $entradas;
      }catch (PDOException $e) {
        echo "Consulta fallida: " .$e -> getMessage();
      }
    }

    function aniadirEntrada($titulo, $cuerpo, $usuario){
      global $conection;
      $id = $usuario."_".date("Ymd"."_"."hi");
      $consulta = "INSERT INTO entradas(idEntrada, titulo, cuerpo, fecha, usuario)
        VALUES ('$id', :titulo, :cuerpo, NOW(), :usuario)";
      $sentencia = $conection->prepare($consulta);
      try{
        $sentencia->bindValue(":titulo", $titulo);
        $sentencia->bindValue(":cuerpo", $cuerpo);
        $sentencia->bindValue(":usuario", $usuario);
        $sentencia ->execute();
        return $consulta;
      }catch(PDOException $e){
        echo "Consulta fallida: " .$e -> getMessage();
        return consulta;
      }
    }
  }

 ?>
