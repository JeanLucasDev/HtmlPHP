<?php
    require_once "Model/classResponsavel.php";
    require_once "IControlador.php";
    class ControladorRemoverResponsavel implements IControlador{
        private $resp;

        public function __construct(){
            $this->resp = new classResponsavel();
        }

        public function processaRequisicao(){
            $this->resp->setid($_POST['id']);
            $this->resp->removerResponsavel();
            header('Location: tela_funcionario_principal.php');

        }
    }
?>
