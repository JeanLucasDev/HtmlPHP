<?php
    require_once "Model/classAluno.php";
    require_once "IControlador.php";
    class ControladorNovoAluno implements IControlador{
        private $aluno;

        public function __construct(){
            $this->aluno = new classAluno();
        }

        public function processaRequisicao(){    
            echo "Aqui".$_POST['name'];
            $this->aluno->setLogin($_POST['name']);
            $this->aluno->setPassword($_POST['password']);
            $this->aluno->setEmail($_POST['email']);
            $this->aluno->setPhone($_POST['phone']);
            $this->aluno->setturma($_POST['turma']);
            $this->aluno->setmatricula($_POST['matricula']);
            $this->aluno->setsaldo(0);
            $this->aluno->incluirAluno();
            $id = $this->aluno->incluirAluno();
            echo "SALDO: ".$this->aluno->getsaldo();
            echo "ID returned: ".$id;
            echo "ID: ".$this->aluno->getId();
            header('Location: tela_responsavel_principal.php');
        }
        
    }
?>
