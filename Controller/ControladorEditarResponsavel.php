<?php
    require_once "Model/classResponsavel.php";
    require_once "IControlador.php";
    class ControladorEditarResponsavel implements IControlador{
        private $resp;

        public function __construct(){
            $this->resp = new classResponsavel();
        }

        public function processaRequisicao(){  
            echo "ID: ".$_POST['id'];
            $this->resp->setId($_POST['id']);
            $this->resp->setLogin($_POST['name']);
            $this->resp->setcpf($_POST['cpf']);
            $this->resp->setPassword($_POST['password']);
            $this->resp->setEmail($_POST['email']);
            $this->resp->setPhone($_POST['phone']);
            $this->resp->editarResponsavel();
            require "View/tela_funcionario_principal.php";
        }
    }
?>
