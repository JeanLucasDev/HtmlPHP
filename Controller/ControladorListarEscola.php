<?php
    require_once "Model/classEscola.php";
    require_once "IControlador.php";
    class ControladorLoginEscola implements IControlador{
        private $escola;

        public function __construct(){
            $this->escola = new classEscola();
        }

        public function processaRequisicao(){  
            $escolas = $this->escola->listarEscola();
            return "view/tela_escola_principal";
        }
        
    }
?>
