<?php
    require_once "Model/classFuncionario.php";
    require_once "IControlador.php";
    class ControladorLoginFuncionario implements IControlador{
        private $funcionario;

        public function __construct(){
            $this->funcionario = new classFuncionario();
        }

        public function processaRequisicao(){    
            $this->funcionario->setLogin($_POST['name']);
            $this->funcionario->setPassword($_POST['password']);
            $this->funcionario->loginFuncionario();
        }
        
    }
?>
