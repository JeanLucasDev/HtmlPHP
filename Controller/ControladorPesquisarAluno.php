<?php
    require_once "Model/classAluno.php";
    require_once "IControlador.php";
    class ControladorPesquisarAluno implements IControlador{
        private $aluno;

        public function __construct(){
            $this->aluno = new classAluno();
        }

        public function processaRequisicao(){ 
            echo "MATRIUCLA: ".$_POST['matricula'];
            $this->aluno->setmatricula($_POST['matricula']);
            $aluno = $this->aluno->pesquisarAluno();
            require "View/tela_funcionario_alunos.php";
        }
        
    }
?>