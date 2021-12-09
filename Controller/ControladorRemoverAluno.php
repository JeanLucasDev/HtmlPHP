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
            require "View/tela_responsavel_meus_filhos.php";

        }
    }
?>
