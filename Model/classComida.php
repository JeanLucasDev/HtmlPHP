<?php

class comida extends produto{
    private $ingredientes;


    function __construct($ingredientes){
        $this->ingredientes = $ingredientes;
    }
    
    public function getingredientes(){
        return $this->ingredientes;
    }

    public function setingredientes($ingredientes){
        $this->ingredientes = $ingredientes;
    }
}

?>