<?php
require_once "IControlador.php";
class ControladorFuncionarioProdutos implements IControlador{
    
    public function processaRequisicao(){
        require_once "View/tela_funcionario_principal.php";
    }
}
    
    
?>