<?php
require "classFuncionarioDAO.php";
require_once "classUsuario.php";
class classFuncionario extends classUsuario{
    private $cpf;
    private $nome;

    public function getcpf(){
        return $this->cpf;
    }

    public function getnome(){
        return $this->nome;
    }

    public function setcpf($cpf){
        $this->cpf = $cpf;
    }
    
    public function setnome($nome){
        $this->nome = $nome;
    }

    //Function DAO
    public function incluirFuncionario(){
        $FuncionarioDAO = new classFuncionarioDAO();
        $FuncionarioDAO->incluirFuncionario($this);
    }

    public function loginFuncionario(){
        $FuncionarioDAO = new classFuncionarioDAO();
        $FuncionarioDAO->loginFuncionario($this);
    }



}




?>