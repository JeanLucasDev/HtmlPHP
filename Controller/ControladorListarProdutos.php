<?php
require_once "Model/classProduto.php";
require_once "IControlador.php";
class ControladorListarProdutos implements IControlador{
    private $prdt;

    public function __construct(){
        $this->prdt = new classProduto();
    }

    public function processaRequisicao(){
        $listaPrdt = $this->prdt->listarProdutos();   
        require "View/tela_funcionario_produtos.php";
    }
}