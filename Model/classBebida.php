<?php
require "classBebidaDAO.php";
require "classProduto.php";
class classBebida extends classProduto{
    private $fornecedor;

    public function getfornecedor(){
        return $this->fornecedor;
    }

    public function setfornecedor($fornecedor){
        $this->fornecedor = $fornecedor;
    }


//function DAO 

public function incluirBebida(){
    $BebidaDAO = new classBebidaDAO();
    $BebidaDAO->incluirBebida($this);
}
}

?>