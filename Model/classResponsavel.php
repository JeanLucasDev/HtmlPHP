<?php
require "classResponsavelDAO.php";
require_once "classUsuario.php";
class classResponsavel extends classUsuario{
    private $id;
    private $cpf;

    public function getcpf(){
        return $this->cpf;
    }
    public function setcpf($cpf){
        $this->cpf = $cpf;
    }

    public function getid(){
        return $this->id;
    }
    public function setid($id){
        $this->id = $id;
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

    public function editarResponsavel(){
        $ResponsavelDAO = new classResponsavelDAO();
        return $ResponsavelDAO->editarResponsavel($this);
    }

    public function listarResponsavel(){
        $ResponsavelDAO = new classResponsavelDAO();
        $ResponsavelDAO->listarResponsavel($this);
    }

    public function pesquisarResponsavel(){
        $ResponsavelDAO = new classResponsavelDAO();
        return $ResponsavelDAO->pesquisarResponsavel($this);
    }

    public function removerResponsavel(){
        $ResponsavelDAO = new classResponsavelDAO();
        $ResponsavelDAO->removerResponsavel($this);
    }
}

?>