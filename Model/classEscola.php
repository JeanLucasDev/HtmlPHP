<?php
require "classEscolaDAO.php";
require "classUsuario.php";
class classEscola extends classUsuario{
    private $endereco;

    
    public function getendereco(){
        return $this->endereco;
    }
    public function setendereco($endereco){
        $this->endereco = $endereco;
    }

    // Functions DAO
    public function incluirEscola(){
        $EscolaDAO = new classEscolaDAO();
        $EscolaDAO->incluirEscola($this);
    }

    public function loginEscola(){
        $EscolaDAO = new classEscolaDAO();
        $EscolaDAO->loginEscola($this);
    }

    public function listarEscola(){
        $EscolaDAO = new classEscolaDAO();
        $EscolaDAO->listarEscola($this);
    }

    public function editarEscola(){
        $EscolaDAO = new classEscolaDAO();
        $EscolaDAO->editarEscola($this);
    }
}
?>

