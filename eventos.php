<?php
    session_start();
    
    // obtenemos los datos $_SESSION['iduser'];
    require_once "db.php";
    class eventos extends DataBase{
        private $link = null;
        public function __construct()
        {
            $this-> link = DataBase::getInstance();
        }
        public function getEventos(){
            $idUsuario = $_SESSION['iduser'];
            $allEventos = $this->link->getAllRow("SELECT idEvento,title,descripcion,start,end FROM evento INNER JOIN usuario ON evento.id_usuario=usuario.IdUsuario WHERE usuario.IdUsuario='".$idUsuario."'");
            $out = array_values($allEventos);
            echo json_encode($out);
            //Recuperando los eventos
        }
        public function __destruct(){
            $this->link = null;
        }
    }
    $obj = new eventos();
    $obj -> getEventos();
?>