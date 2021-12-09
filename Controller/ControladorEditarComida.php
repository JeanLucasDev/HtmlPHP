<?php
    require_once "Model/classComida.php";
    require_once "IControlador.php";
    class ControladorEditarComida implements IControlador{
        private $food;

        public function __construct(){
            $this->food = new classComida();
        }

        public function processaRequisicao(){   
            $this->food->setId($_POST['id']);
            $this->food->setnome($_POST['name']);
            $this->food->setcodigo($_POST['codigo']);
            $this->food->setpreco($_POST['preco']);
            $this->food->setingredientes($_POST['ingredientes']);
            $this->food->setfoto($_FILES["imagem"]);
            $this->food->editarComida();
            require "View/tela_funcionario_principal.php";
        }
    }
?>
