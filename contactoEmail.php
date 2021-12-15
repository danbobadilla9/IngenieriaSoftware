<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Mailer/src/Exception.php';
require 'Mailer/src/PHPMailer.php';
require 'Mailer/src/SMTP.php';
class contactoEmail{
    public function enviar(){
        $nombre = $_POST['nombre'] ? $_POST['nombre']:null;
        $email = $_POST['email'] ? $_POST['email']:null;
        $telefono = $_POST['telefono'] ? $_POST['telefono']:null;
        $mensajes = $_POST['mensaje'] ? $_POST['mensaje']:null;
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
        $mail -> Subject = 'Tienes un nuevo mensaje';
        $mail -> isHTML(true);
        $mail -> CharSet = 'UTF-8';
        //Contenido
        $contenido = '<html>
        <p>Usuario:'.$nombre.'</p>
        <p>Telefono:'.$telefono.'</p>
        <p>Mensajes:'.$mensajes.'</p>
        </html>';
        $mail -> Body = $contenido;
        $mail -> AltBody = 'Esto es texto alternativo sin html';
        //Enviar email
        if($mail -> send()){
            $message['status']=200;
            $message['mensaje']= "inciando sesion";
        }else{
            $message['status']=201;
            $message['mensaje']= "error de sesion";
        }
        echo json_encode($message);
    }
}
$obj = new contactoEmail();
$obj->enviar();
?>