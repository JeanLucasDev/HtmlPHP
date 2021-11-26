<?php
require_once "Model/classFuncionario.php";
require_once "IControlador.php";
class ControladorListarFuncionarios implements IControlador{
    private $func;

    public function __construct(){
        $this->func = new classFuncionario();
    }

    public function processaRequisicao(){
        $listaFuncionarios = $this->func->listarFuncionarios();
        require "View/tela_escola_funcionario.php";
    }
}
    
?>
