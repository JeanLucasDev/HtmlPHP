<?php
require "classResponsavelDAO.php";
require_once "classUsuario.php";
class classResponsavel extends classUsuario{
    private $cpf;

    public function getcpf(){
        return $this->cpf;
    }
    public function setcpf($cpf){
        $this->cpf = $cpf;
    }
    
    //Function DAO
    public function incluirResponsavel(){
        $ResponsavelDAO = new classResponsavelDAO();
        $ResponsavelDAO->incluirResponsavel($this);
    }

    public function loginResponsavel(){
        $ResponsavelDAO = new classResponsavelDAO();
        $ResponsavelDAO->loginResponsavel($this);
    }

    public function listarResponsavel(){
        $ResponsavelDAO = new classResponsavelDAO();
        $ResponsavelDAO->listarResponsavel($this);
    }
}

?>