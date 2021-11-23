<?php
    require_once "Model/classEscola.php";
    require_once "IControlador.php";
    class ControladorLoginEscola implements IControlador{
        private $escola;

        public function __construct(){
            $this->escola = new classEscola();
        }

        public function processaRequisicao(){    
            $this->escola->setLogin($_POST['name']);
            $this->escola->setPassword($_POST['password']);
            $this->escola->loginEscola();
        }
        
    }
?>
