<?php
    require_once "Model/classAluno.php";
    require_once "IControlador.php";
    class ControladorEditarAluno implements IControlador{
        private $aln;

        public function __construct(){
            $this->aln = new classAluno();
        }

        public function processaRequisicao(){  
            $this->aln->setId($_POST['id']);
            $this->aln->setLogin($_POST['name']);
            $this->aln->setturma($_POST['turma']);
            $this->aln->setmatricula($_POST['matricula']);
            $this->aln->setPassword($_POST['password']);
            $this->aln->setEmail($_POST['email']);
            $this->aln->setPhone($_POST['phone']);
            $this->aln->editarAluno();
            require "View/tela_funcionario_principal.php";
        }
    }
?>
