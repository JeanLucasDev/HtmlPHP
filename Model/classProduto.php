<?php
require "classProdutoDAO.php";
class classProduto {
    private $id;
    private $codigo;
    private $nome;
    private $foto;
    private $preco;
    private $blocked;


    public function getid(){
        return $this->id;
    }
    public function getcodigo(){
        return $this->codigo;
    }
    public function getnome(){
        return $this->nome;
    }
    public function getfoto(){
        return $this->foto;
    }
    public function getpreco(){
        return $this->preco;
    }
    public function getblocked(){
        return $this->blocked;
    }

    public function setid($id){
        $this->id = $id;
    }


    public function setcodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setnome($nome){
        $this->nome = $nome;
    }
    public function setfoto($foto){
        $this->foto = $foto;
    }
    public function setpreco($preco){
        $this->preco = $preco;
    }
    public function setblocked($blocked){
        $this->blocked = $blocked;
    }


    //function DAO 

    
    public function listarProdutos(){
        $ProdutoDAO = new classProdutoDAO();
        return $ProdutoDAO->listarProdutos();
    }

}

?>