<?php
    require_once "Model/classResponsavel.php";
    require_once "IControlador.php";
    class ControladorNovoResponsavel implements IControlador{
        private $responsavel;

        public function __construct(){
            $this->responsavel = new classResponsavel();
        }

        public function processaRequisicao(){ 
            $this->responsavel->setLogin($_POST['name']);
            $this->responsavel->setPassword($_POST['password']);
            $this->responsavel->setEmail($_POST['email']);
            $this->responsavel->setPhone($_POST['phone']);
            $this->responsavel->incluirResponsavel();
            header('Location: tela_responsavel_principal.php');
        }
        
    }
?>