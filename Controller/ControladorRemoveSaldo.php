<?php
require_once "Model/classAluno.php"; 
require_once "IControlador.php";
class ControladorRemoveSaldo implements IControlador{
    private $aln;

    public function __construct(){
        $this->aln = new classAluno();
    }

    public function processaRequisicao(){
         $this->aln->setId($_SESSION['id']);
         $valor = $_POST['qtd'];
         $this->aln->removeSaldo($valor);
         unserialize($_SESSION['carrinho2']);
         unset($_SESSION['carrinho2']);
         require "View/tela_aluno_carrinho.php";
    }
}
    
?>
