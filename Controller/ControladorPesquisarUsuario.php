<?php
    require_once "Model/classUsuario.php";
    require_once "IControlador.php";
    class ControladorPesquisarUsuario implements IControlador{
        private $usuario;

        public function __construct(){
            $this->usuario = new classUsuario();
        }

        public function processaRequisicao(){ 
            $this->usuario->setLogin($_SESSION['login']);
            $this->usuario->pesquisarUsuario();
        }
        
    }
?>