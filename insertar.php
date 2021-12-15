<?php

class insertar {
    public function cargarDatos(){
        $imagen = $_FILES['imagen'] ? $_FILES['imagen']:null;
        $message['status']=207;
        $message['mensaje']= $imagen['tmp_name'];
        

        //SUBIDA DE ARCHIVOS
        $carpetaImagens = 'imagenes';
        if(!is_dir($carpetaImagens)){
            mkdir($carpetaImagens, 0777, TRUE);
        }
        $nombreImagen = md5(uniqid(rand(),true));
        if(move_uploaded_file($imagen['tmp_name'],$carpetaImagens."/".$nombreImagen.".jpg")){
            chmod($carpetaImagens,0777);
            echo json_encode($message);
        }else{

        }


        
    }
}
$obj = new insertar();
$obj->cargarDatos();
?>
