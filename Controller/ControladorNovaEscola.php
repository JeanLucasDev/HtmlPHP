<?php
    require_once "Model/classEscola.php";
    require_once "IControlador.php";
    class ControladorNovaEscola implements IControlador{
        private $escola;

        public function __construct(){
            $this->escola = new classEscola();
        }

        public function processaRequisicao(){    
            $this->escola->setLogin($_POST['name']);
            $this->escola->setPassword($_POST['password']);
            $this->escola->setEmail($_POST['email']);
            $this->escola->setPhone($_POST['phone']);
            $this->escola->setendereco($_POST['location']);
            $this->escola->incluirEscola();
            header('Location: index.php');
        }
        
    }
?>
