<?php

class bebida extends produto{
    private $fornecedor;



    function __construct($fornecedor){
        $this->fornecedor = $fornecedor;
    }

    public function getfornecedor(){
        return $this->fornecedor;
    }

    public function setfornecedor($fornecedor){
        $this->fornecedor = $fornecedor;
    }
}

?>