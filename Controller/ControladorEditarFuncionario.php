<?php
    require_once "Model/classFuncionario.php";
    require_once "IControlador.php";
    class ControladorEditarFuncionario implements IControlador{
        private $func;

        public function __construct(){
            $this->func = new classFuncionario();
        }

        public function processaRequisicao(){  
            $this->func->setId($_POST['id']);
            $this->func->setLogin($_POST['name']);
            $this->func->setPassword($_POST['password']);
            $this->func->setEmail($_POST['email']);
            $this->func->setPhone($_POST['phone']);
            $this->func->setcpf($_POST['cpf']);
            $this->func->editarFuncionario();
            header('Location: tela_escola_principal.php');
        }
    }
?>
