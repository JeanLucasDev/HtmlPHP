<?php
require_once "IControlador.php";
class ControladorResponsavel implements IControlador{
    
    public function processaRequisicao(){
        require_once "View/tela_responsavel_principal.php";
    }
}
    
    
?>