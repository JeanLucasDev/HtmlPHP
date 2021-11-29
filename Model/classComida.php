<?php
require "classComidaDAO.php";
require "classProduto.php";
class classComida extends classProduto{
    private $ingredientes;


    
    public function getingredientes(){
        return $this->ingredientes;
    }

    public function setingredientes($ingredientes){
        $this->ingredientes = $ingredientes;
    }


    //function DAO 
    public function incluirComida(){
        $ComidaDAO = new classComidaDAO();
        $ComidaDAO->incluirComida($this);
    }

    public function excluirComida(){
        $AlunoDAO = new classComidaDAO();
        $AlunoDAO->excluirComida($this);
    }

}
?>