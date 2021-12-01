<?php
require "classBebidaDAO.php";
require "classProduto.php";
class classBebida extends classProduto{
    private $id;
    private $fornecedor;


    public function getid(){
        return $this->id;
    }

    public function getfornecedor(){
        return $this->fornecedor;
    }

    public function setid($id){
        $this->id = $id;
    }

    public function setfornecedor($fornecedor){
        $this->fornecedor = $fornecedor;
    }


//function DAO 

public function incluirBebida(){
    $BebidaDAO = new classBebidaDAO();
    $BebidaDAO->incluirBebida($this);
}

public function editarBebida(){
    $BebidaDAO = new classBebidaDAO();
    $BebidaDAO->editarBebida($this);
}
}

?>