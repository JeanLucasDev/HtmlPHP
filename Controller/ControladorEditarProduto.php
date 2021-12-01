<?php
    require_once "Model/classProduto.php";
    require_once "IControlador.php";
    class ControladorEditarProduto implements IControlador{
        private $prdt;

        public function __construct(){
            $this->prdt = new classProduto();
        }

        public function processaRequisicao(){
            $this->prdt->setId($_POST['id']);
            $typ = $this->prdt->editarProdutos();
            if($typ == 1){
                $idProduto = $_POST['id'];
                require "View/produto_editar_comida.php";
            }
            else{
                $idProduto = $_POST['id'];
                require "View/produto_editar_bebida.php";
            }
        }
    }
?>
