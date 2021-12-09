<?php
    require_once "Model/classProduto.php";
    require_once "IControlador.php";
    class ControladorRemoverProduto implements IControlador{
        private $prdt;

        public function __construct(){
            $this->prdt = new classProduto();
        }

        public function processaRequisicao(){
            echo "Codigo: ".$_POST['codigo'];
            $this->prdt->setcodigo($_POST['codigo']);
            $this->prdt->removerProduto();
            require "View/produto_remove.php";
        }
    }
?>
