<?php
require_once "Model/classProduto.php";
require_once "IControlador.php";
class ControladorListarLoja implements IControlador{
    private $prdt;

    public function __construct(){
        $this->prdt = new classProduto();
    }

    public function processaRequisicao(){
        $listaComida = $this->prdt->listarComidas();
        $listaBebida = $this->prdt->listarBebidas();
        require "View/tela_aluno_loja.php";
    }
}