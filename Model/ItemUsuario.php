<?php
//classe que representa os itens do carrinho
//cada item é formado pelo produto e a quantidade comprada
require_once "classUsuario.php";
class ItemUsuario{
   private $user;

   
   public function __construct($id){
       $this->user = new classUsuario();
       $this->user->setId($id);
       $this->user->pesquisarLivro();
   }
   
   public function getUser(){
       return $this->user;
   }

   public function setUser($user){
       $this->user = $user;
   }
}
?>