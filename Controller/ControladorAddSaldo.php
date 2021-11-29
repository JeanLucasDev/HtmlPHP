<?php
require_once "Model/classAluno.php";
require_once "IControlador.php";
class ControladorAddSaldo implements IControlador{
    private $aln;

    public function __construct(){
        $this->aln = new classAluno();
    }

    public function processaRequisicao(){
         $this->aln->setId($_POST['id']);
         $this->aln->setsaldo($_POST['qtd']);
         $Saldo = $this->aln->AddSaldo();
         require "View/tela_responsavel_add_saldo.php";
    }
}
    
?>
