<?php
session_start();
require_once "db.php";
class login extends DataBase{
  private $link = null;

  public function __construct(){
    $this->link = DataBase::getInstance();
  }

  public function logueo (){
    $username = $_POST['usuario'] ? $_POST['usuario']:null;
    $password = $_POST['password'] ? $_POST['password']:null;
    $check= $this->link->getOnlyRow("Select IdUsuario,usuario,password,Nombre,Apellido,Imagen from usuario where usuario='".$username."' and password='".$password."'");
    if($check!=false){
      // initialize session variables
      $_SESSION['iduser'] = $check['IdUsuario'];
      $_SESSION['nombre'] = $check['Nombre']." ".$check['Apellido'];
      $_SESSION['imagen'] = $check['Imagen'];
      $resp="ok";
    }else{
      session_destroy();
      $resp="error";
    }

    if($resp!="error"){
    //  header("Location: view.php");
      $message['status']=200;
      $message['mensaje']= "inciando sesion";
    }else{
      $message['status']=201;
      $message['mensaje']= "error de sesion";

    }
    echo json_encode($message);
  }
  public function __destruct(){
    $this->link = null;
  }
}
$obj = new login();
$obj->logueo();
 ?>
