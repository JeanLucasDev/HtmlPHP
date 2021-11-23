<?php
require "Model/classEscola.php";
require_once "IControlador.php";
class ControladorFormEscola implements IControlador{
    
    public function processaRequisicao(){
        require "View/cadastro_escola.php";
    }
}
    
    
?>