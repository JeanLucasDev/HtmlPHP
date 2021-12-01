<?php
require "classComidaDAO.php";
require "classProduto.php";
class classComida extends classProduto{
    private $id;
    private $ingredientes;

    public function getid(){
        return $this->id;
    }
    
    public function getingredientes(){
        return $this->ingredientes;
    }

    public function setingredientes($ingredientes){
        $this->ingredientes = $ingredientes;
    }

    public function setid ($id){
        $this->id = $id;
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

    public function editarComida(){
        $AlunoDAO = new classComidaDAO();
        $AlunoDAO->editarComida($this);
    }

}
?>