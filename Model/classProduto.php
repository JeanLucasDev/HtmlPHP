<?php

class produto {
    private $codigo;
    private $nome;
    private $foto;
    private $preco;
    private $blocked;

    function __construct($codigo,$nome,$foto,$preco,$blocked){
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->foto = $foto;
        $this->preco = $preco;
        $this->blocked = false;
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

}

?>