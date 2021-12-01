<?php
    require_once "Model/classResponsavel.php";
    require_once "IControlador.php";
    class ControladorPesquisarResponsavel implements IControlador{
        private $responsavel;

        public function __construct(){
            $this->responsavel = new classResponsavel();
        }

        public function processaRequisicao(){ 
            $this->responsavel->setcpf($_POST['cpf']);
            $responsavel = $this->responsavel->pesquisarResponsavel();
            require "View/tela_funcionario_responsaveis.php";
        }
        
    }
?>