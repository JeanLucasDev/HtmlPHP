<?php
    require_once "Model/classAluno.php";
    require_once "IControlador.php";
    class ControladorLoginAluno implements IControlador{
        private $aluno;

        public function __construct(){
            $this->aluno = new classAluno();
        }

        public function processaRequisicao(){    
            $this->aluno->setLogin($_POST['name']);
            $this->aluno->setPassword($_POST['password']);
            $this->aluno->loginAluno();
        }
        
    }
?>
