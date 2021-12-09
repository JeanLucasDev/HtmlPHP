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
            $this->responsavel->setcpf($_POST['cpf']);
            $this->responsavel->setPassword($_POST['password']);
            $this->responsavel->setEmail($_POST['email']);
            $this->responsavel->setPhone($_POST['phone']);
            $this->responsavel->incluirResponsavel();
            require "View/tela_funcionario_principal.php";
        }
        
    }
?>