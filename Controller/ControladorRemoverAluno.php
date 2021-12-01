<?php
    require_once "Model/classAluno.php";
    require_once "IControlador.php";
    class ControladorRemoverAluno implements IControlador{
        private $aln;

        public function __construct(){
            $this->aln = new classAluno();
        }

        public function processaRequisicao(){
            $this->aln->setid($_POST['id']);
            $this->aln->removerAluno();
            header('Location: tela_responsavel_principal.php');

        }
    }
?>
