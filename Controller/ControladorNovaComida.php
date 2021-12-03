<?php
    require_once "Model/classComida.php";
    require_once "IControlador.php";
    class ControladorNovaComida implements IControlador{
        private $food;

        public function __construct(){
            $this->food = new classComida();
        }

        public function processaRequisicao(){   
            $this->food->setnome($_POST['name']);
            $this->food->setcodigo($_POST['codigo']);
            $this->food->setpreco($_POST['preco']);
            $this->food->setingredientes($_POST['ingredientes']);
            $this->food->setfoto($_FILES["imagem"]);
            $this->food->incluirComida();
            require "View/tela_funcionario_principal.php";
        }
    }
?>
