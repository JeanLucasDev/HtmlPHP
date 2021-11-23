<?php
require "Model/classAluno.php";
require_once "IControlador.php";
class ControladorFormAluno implements IControlador{
    
    public function processaRequisicao(){
        require "View/cadastro_Aluno.php";
    }
}
    
    
?>