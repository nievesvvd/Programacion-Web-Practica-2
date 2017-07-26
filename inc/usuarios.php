<?php
  require_once('dataset.php');

  class Usuarios extends DBClass{
    protected $datos =array(
      "username" => "",
      "nombre" => "",
      "apellidos" => "",
      "passwd" => "",
      "imgPerfil" => "",
      "conectado" => ""
    );

    public function existeUsuario($id, $passwd){
      global $conection;
      $consulta = "SELECT * FROM usuarios WHERE username = :id and passwd = :passwd";
      $sentencia = $conection->prepare($consulta);
      try{
        $sentencia->bindValue(":id", $id, PDO::PARAM_STR);
        $sentencia->bindValue(":passwd", $passwd, PDO::PARAM_STR);
        $sentencia->execute();
        $name = $sentencia->fetch(PDO::FETCH_ASSOC);
        return $name['username'];
      } catch (PDOException $e) {
        echo "Consulta fallida: " .$e -> getMessage();
      }
    }

    public function getNombUsuario($id){
      global $conection;
      $consulta = "SELECT * FROM usuarios WHERE username = :id";
      $sentencia = $conection->prepare($consulta);
      try{
        $sentencia->bindValue(":id", $id, PDO::PARAM_STR);
        $sentencia->execute();
        $name = $sentencia->fetch(PDO::FETCH_ASSOC);
        return $name['nombre'];
      } catch (PDOException $e) {
        echo "Consulta fallida: " .$e -> getMessage();
      }
    }

    public function getInfoUsuario($id){
      global $conection;
      $consulta = "SELECT * FROM usuarios WHERE username = :id";
      $sentencia = $conection->prepare($consulta);
      try{
        $sentencia->bindValue(":id", $id, PDO::PARAM_STR);
        $sentencia->execute();
        $name = $sentencia->fetch(PDO::FETCH_ASSOC);
        return $name;
      } catch (PDOException $e) {
        echo "Consulta fallida: " .$e -> getMessage();
      }
    }

    public function getUsuarios(){
      global $conection;
      $consulta = "SELECT * FROM usuarios";
      $sentencia = $conection->prepare($consulta);
      try{
        $sentencia->execute();
        $users = $conection->query($consulta);
        return $users;
      } catch (PDOException $e) {
        echo "Consulta fallida: " .$e -> getMessage();
      }
    }

    //muestra los usuarios conectados de la red 
    public function usuariosConectados(){
      global $conection;
      $consulta = "SELECT * FROM usuarios WHERE conectado = 'Si'";
      $sentencia = $conection->prepare($consulta);
      try{
        $sentencia -> execute();
        $users = $conection->query($consulta);
        return $users;
      }catch (PDOException $e) {
        echo "Consulta fallida: " .$e->getMessage();
      }
    }
    //permite añadir a usuarios nuevos a la red
    public function aniadirUsuario($username, $nombre, $apellidos, $passwd){
      global $conection;
      $consulta = "INSERT INTO usuarios(username, nombre, apellidos, passwd)
        VALUES (:username, :nombre, :apellidos, :passwd)";
        $sentencia = $conection->prepare($consulta);
      try{
        $sentencia->bindValue(":username", $username);
        $sentencia->bindValue(":nombre", $nombre);
        $sentencia->bindValue(":apellidos", $apellidos);
        $sentencia->bindValue(":passwd", $passwd);
        $sentencia->execute();
        return $consulta;
      }catch(PDOException $e){
        die( $consulta . "/n". $e->getMessage());
        return $consulta;
      }
    }

    public function actualizarDatos($nombre, $apellidos, $username, $passwd){
      global $conection;
      $consulta = "UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, passwd = :passwd
         where username = :username";
        $sentencia = $conection->prepare($consulta);
      try{
        $sentencia->bindValue(":username", $username);
        $sentencia->bindValue(":nombre", $nombre);
        $sentencia->bindValue(":apellidos", $apellidos);
        $sentencia->bindValue(":passwd", $passwd);
        $sentencia->execute();
        return $consulta;
      }catch(PDOException $e){
        die( $consulta . "/n" . $e->getMessage());
        return $consulta;
      }
    }
  }
 ?>
