<?php
    require_once "Model/classFuncionario.php";
    require_once "IControlador.php";
    class ControladorNovoFuncionario implements IControlador{
        private $funcionario;

        public function __construct(){
            $this->funcionario = new classFuncionario();
        }

        public function processaRequisicao(){    
            $this->funcionario->setLogin($_POST['name']);
            $this->funcionario->setPassword($_POST['password']);
            $this->funcionario->setEmail($_POST['email']);
            $this->funcionario->setPhone($_POST['phone']);
            $this->funcionario->incluirFuncionario();
            header('Location: tela_escola_principal.php');
        }
        
    }
?>
