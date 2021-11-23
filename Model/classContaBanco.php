<?php

class contaBanco {
    private $numconta;
    private $saldo;
    private $status;
    private $limite;


    function __construct($numconta,$saldo,$status,$limite){
        $this->numconta = $numconta;
        $this->saldo = 0;
        $this->status = $status;
        $this->limite = $limite;
    }

    public function getNumConta(){
        return $this->numconta;
    }

    public function getSaldo(){
        return $this->saldo;
    }
    
    public function getStatus(){
        return $this->status;
    }
    
    public function getLimite(){
        return $this->limite;
    }

    public function setNumConta($numconta){
        $this->numconta = $numconta;
    }
    
    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function setLimite($limite){
        $this->limite = $limite;
    }


    public function deposito($valor){
        $this->setSaldo($this->getSaldo()+$valor);
    }

    public function saque($valor){
        if($this->saldo >= $valor){
            $this->setSaldo($this->getSaldo()-$valor);
        }
        else{
            echo "invalido";
        }
        
    }

}



?>