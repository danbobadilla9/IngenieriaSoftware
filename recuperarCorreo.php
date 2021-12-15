<?php
require_once "db.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Mailer/src/Exception.php';
require 'Mailer/src/PHPMailer.php';
require 'Mailer/src/SMTP.php';
class recuperar extends DataBase{
  private $link = null;

  public function __construct(){
    $this->link = DataBase::getInstance();
  }

  public function sendEmail (){
    $username = $_POST['usuario'] ? $_POST['usuario']:null;
    $check= $this->link->getOnlyRow("Select password from usuario where correo='".$username."'");
    if($check!=false){
      // initialize session variables
        $contrasena = $check['password'];
        $resp="ok";
    }else{
        $resp="error";
    }

    if($resp!="error"){
        $mail = new  PHPMailer();
        //Protocolo
        $mail -> isSMTP();
        $mail -> Host = 'smtp.mailtrap.io';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'aab90049277d07';
        $mail -> Password = 'd88c9496d90a00';
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 2525;

        //Configurando el contenido
        $mail -> setFrom('danbobadilla8@gmail.com');
        $mail -> addAddress('danbobadilla8@gmail.com','My Calendar');
        $mail -> Subject = 'Recuperar Contraseña';
        $mail -> isHTML(true);
        $mail -> CharSet = 'UTF-8';
        //Contenido
        $contenido = '<html>
        <p>Hola Usuario Su Contraseña Es la Siguiente</p>
        <p>Usuario:'.$contrasena.'</p>
        </html>';
        $mail -> Body = $contenido;
        //Enviar email
        //JSON
        if($mail -> send()){
            $message['status']=203;
            $message['mensaje']= "Correo Enviado";
        }else{
            $message['status']=201;
            $message['mensaje']= "Error al enviar el correo";
        }
    }else{
        $message['status']=201;
        $message['mensaje']= "Correo no encontrado";
    }
    echo json_encode($message);
  }
  public function __destruct(){
    $this->link = null;
  }
}
$obj = new recuperar();
$obj->sendEmail();
