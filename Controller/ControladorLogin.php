<?php
    require_once "Model/classUsuario.php";
    require_once "IControlador.php";
    class ControladorLogin implements IControlador{
        private $user;

        public function __construct(){
            $this->user = new classUsuario();
        }

        public function processaRequisicao(){    
            $this->user->setLogin($_POST['name']);
            $this->user->setPassword($_POST['password']);
            $this->user->setType($_POST['type']);
            $this->user->loginUsuario();
        }
        
    }
?>
