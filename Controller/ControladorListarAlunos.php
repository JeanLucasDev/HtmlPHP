<?php
require_once "Model/classAluno.php";
require_once "IControlador.php";
class ControladorListarAlunos implements IControlador{
    private $aln;

    public function __construct(){
        $this->aln = new classAluno();
    }

    public function processaRequisicao(){
        $listaAlunos = $this->aln->listarAlunos();
        require "View/tela_responsavel_meus_filhos.php";
    }
}
    
?>
