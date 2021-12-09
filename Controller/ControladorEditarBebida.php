<?php
    require_once "Model/classBebida.php";
    require_once "IControlador.php";
    class ControladorEditarBebida implements IControlador{
        private $drink;

        public function __construct(){
            $this->drink = new classBebida();
        }

        public function processaRequisicao(){   
            $this->drink->setId($_POST['id']);
            $this->drink->setnome($_POST['name']);
            $this->drink->setcodigo($_POST['codigo']);
            $this->drink->setpreco($_POST['preco']);
            $this->drink->setfornecedor($_POST['fornecedor']);
            $this->drink->setfoto($_FILES['imagem']);
            $this->drink->editarBebida();
            require "View/tela_funcionario_principal.php";
        }
    }
?>
