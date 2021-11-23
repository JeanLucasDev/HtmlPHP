<?php

require_once "Model/EscolaSession.php";
require_once "Model/classFuncionario.php";
require_once "IControlador.php";

class ControladorAddItemCarrinho implements IControlador{
     private $carrinhoSession; 
     
     public function __construct($carrinhoSession){
         $this->carrinhoSession = $carrinhoSession;
     }

     public function processaRequisicao(){
        if (isset($_POST['id']) && preg_match("/^[0-9]+/",$_POST['id'])){
            //cria o objeto itemCarrinho
            $itemCarrinho = new ItemCarrinho($_POST['id'],1);
            //adiciona o itemCarrinho no carrinho
            $this->carrinhoSession->adicionar($itemCarrinho);
        }
        header('Location:Carrinho', true,302);

     }

}

?>