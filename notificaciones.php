<?php
    session_start();
    
    // obtenemos los datos $_SESSION['iduser'];
    require_once "db.php";
    class notificaciones extends DataBase{
        private $link = null;
        public function __construct()
        {
            $this-> link = DataBase::getInstance();
        }
        public function getHora(){
            $instruccion = $_POST['indicador'] ? $_POST['indicador']:null;
            $idEvento = $_POST['idE'] ? $_POST['idE']:null;
            $idUsuario = $_SESSION['iduser'];
            if($instruccion === "true"){
                $allEventos = $this->link->getOnlyRow("SELECT end,idEvento FROM evento INNER JOIN usuario ON evento.id_usuario=usuario.IdUsuario WHERE usuario.IdUsuario='".$idUsuario."' ORDER BY end ASC");
                $out = array_values($allEventos);
            }else{
                $allEventos = $this->link->getOnlyRow("DELETE FROM evento WHERE idEvento='".$idEvento."'");
                $out = array_values($allEventos);
            }
            echo json_encode($out);
            //Recuperando los eventos
        }
        public function __destruct(){
            $this->link = null;
        }
    }
    $obj = new notificaciones();
    $obj -> getHora();
?>