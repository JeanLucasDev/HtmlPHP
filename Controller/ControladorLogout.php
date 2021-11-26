<?php
    require_once "Model/classUsuario.php";
    require_once "IControlador.php";
    class ControladorLogout implements IControlador{
        private $user;

        public function __construct(){
            $this->user = new classUsuario();
        }

        public function processaRequisicao(){    
            $this->user->logout();
        }
    }
?>
