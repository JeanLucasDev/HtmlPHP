<?php
require_once "IControlador.php";
class ControladorEditEscola implements IControlador{
    
    public function processaRequisicao(){
        require_once "View/editar_escola.php";
    }
}
    
    
?>