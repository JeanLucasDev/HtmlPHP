<?php
require "classAlunoDAO.php";
require "classUsuario.php";
class classAluno extends classUsuario{
    private $matricula;
    private $saldo;

    public function getmatricula(){
        return $this->matricula;
    }


    public function gettelefone(){
        return $this->telefone;
    }

    public function getsaldo(){
        return $this->saldo;
    }

    public function setmatricula($matricula){
        $this->matricula = $matricula;
    }

    public function setsaldo($saldo){
        $this->saldo = $saldo;
    }


    //Functions DAO 


    public function incluirAluno(){
        $AlunoDAO = new classAlunoDAO();
        $AlunoDAO->incluirAluno($this);
    }

    public function excluirAluno(){
        $AlunoDAO = new classAlunoDAO();
        $AlunoDAO->excluirAluno($this);
    }

    public function pesquisaAluno(){
        $AlunoDAO = new classAlunoDAO();
        $AlunoDAO->pesquisarAluno($this);
    }

    public function alterarAluno(){
        $AlunoDAO = new classAlunoDAO();
        $AlunoDAO->alterarAluno($this);
    }

    public function listarTodos(){
        $AlunoDAO = new classAlunoDAO();
        return $AlunoDAO->listarTodos();
    }

    public function loginAluno(){
        $AlunoDAO = new classAlunoDAO();
        $AlunoDAO->loginAluno($this);
    }
}

?>