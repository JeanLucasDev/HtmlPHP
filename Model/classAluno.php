<?php
require "classAlunoDAO.php";
require "classUsuario.php";
class classAluno extends classUsuario{
    private $matricula;
    private $turma;
    private $saldo;

    public function __contruct(){
        if($this->saldo != 0){
            $this->saldo = 0;
        }
    }

    public function getmatricula(){
        return $this->matricula;
    }

    public function getturma(){
        return $this->turma;
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

    public function setturma($turma){
        $this->turma = $turma;
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

    public function listarAlunos(){
        $AlunoDAO = new classAlunoDAO();
        return $AlunoDAO->listarAlunos();
    }

    public function AddSaldo(){
        $AlunoDAO = new ClassAlunoDAO();
        return $AlunoDAO->AddSaldo($this);
    }


    public function loginAluno(){
        $AlunoDAO = new classAlunoDAO();
        $AlunoDAO->loginAluno($this);
    }
}

?>