<?php
require_once "IControlador.php";
class ControladorEditFuncionario implements IControlador{
    
    public function processaRequisicao(){
        require_once "View/editar_funcionario.php";
    }
}
    
    
?>