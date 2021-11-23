<?php

class classUsuario{
    private $login;
    private $password;
    private $phone;
    private $email;
    private $type;

    public function getLogin(){
        return $this->login;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getEmail(){
        return $this->email;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getType(){
        return $this->type;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function setType($type){
        $this->type = $type;
    }

    

}

?>