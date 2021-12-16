<?php
require_once "db.php";
class insertar extends DataBase{
    private $link = null;
    public function __construct(){
        $this->link = DataBase::getInstance();
    }
    public function cargarDatos(){
        $nombre = $_POST['nombre'] ? $_POST['nombre']:null;
        $apellido = $_POST['apellido'] ? $_POST['apellido']:null;
        $user = $_POST['user'] ? $_POST['user']:null;
        $pas = $_POST['pas'] ? $_POST['pas']:null;
        $cor = $_POST['cor'] ? $_POST['cor']:null;
        $imagen = $_FILES['imagen'] ? $_FILES['imagen']:null;
        
        

        //SUBIDA DE ARCHIVOS
        $carpetaImagens = 'imagenes';
        if(!is_dir($carpetaImagens)){
            mkdir($carpetaImagens, 0777, TRUE);
        }
        $nombreImagen = md5(uniqid(rand(),true));
        if(move_uploaded_file($imagen['tmp_name'],$carpetaImagens."/".$nombreImagen.".jpg")){
            chmod($carpetaImagens,0777);
            $check= $this->link->exec("INSERT INTO usuario (Usuario,Password,Nombre,Apellido,Correo,Imagen) VALUES('".$user."','".$pas."','".$nombre."','".$apellido."','".$cor."','".$nombreImagen."')");
            if($check){
                $message['status']=200;
                $message['mensaje']= "Evento registrado";
            }else{
                $message['status']=207;
                $message['mensaje']= "Error Al Guardar el Registro";
            }
            
            // echo json_encode($message);
        }else{
            $message['status']=207;
            $message['mensaje']= "Error Al Cargar La Imagen";
        }
        echo json_encode($message);

    }
    public function __destruct(){
        $this->link = null;
    }
}
$obj = new insertar();
$obj->cargarDatos();
?>
