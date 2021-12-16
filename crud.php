<?php
    session_start();
    require_once "db.php";
    class crud extends DataBase{
        private $link = null;
        public function __construct()
        {
            $this-> link = DataBase::getInstance();
        }
        public function getAccion(){
            $idUsuario = $_SESSION['iduser'];
            $accion = $_POST['accion'] ? $_POST['accion']:null;
            $idEvento = $_POST['idEvento'] ? $_POST['idEvento']:null;
            $title = $_POST['title'] ? $_POST['title']:null;
            $start = $_POST['start'] ? $_POST['start']:null;
            $end = $_POST['end'] ? $_POST['end']:null;
            $descripcion = $_POST['descripcion'] ? $_POST['descripcion']:null;
            if($accion === "Insertar"){
                $bandera = $this->link->exec("INSERT INTO evento(id_usuario,title,descripcion,start,end) VALUES('".$idUsuario."','".$title."','".$descripcion."','".$start."','".$end."')");
                if($bandera){
                    $message['status']=200;
                    $message['mensaje']= "Evento registrado";
                }else{ 
                    $message['status']=201;
                }
            }
            if($accion === "Modificar"){
                $bandera = $this->link->exec("UPDATE evento SET title='".$title."',descripcion='".$descripcion."',start='".$start."',end='".$end."' WHERE idEvento='".$idEvento."'");
                if($bandera){
                    $message['status']=200;
                    $message['mensaje']= "Registro Modificado";
                }else{
                    $message['status']=201;
                }
            }
            if($accion === "Eliminar"){
                $bandera = $this->link->exec("DELETE FROM evento WHERE idEvento='".$idEvento."'");
                if($bandera){
                    $message['status']=200;
                    $message['mensaje']= "Registro Eliminado";
                }else{
                    $message['status']=201;
                }
            }
            echo json_encode($message);
            //Recuperando los eventos
        }
        public function __destruct(){
            $this->link = null;
        }
    }
    $obj = new crud();
    $obj -> getAccion();
?>