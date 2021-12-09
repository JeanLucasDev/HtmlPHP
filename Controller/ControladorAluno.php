<?php
require_once "IControlador.php";
class ControladorAluno implements IControlador{
    
    public function processaRequisicao(){
        require_once "View/tela_aluno_principal.php";
    }
}
    
    
?>