<?php
require_once "IControlador.php";
class ControladorEscola implements IControlador{
    
    public function processaRequisicao(){
        require_once "View/tela_escola_principal.php";
    }
}
    
    
?>