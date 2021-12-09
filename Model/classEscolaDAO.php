<?php
require_once "Conexao.php";
class classEscolaDAO{

    
    public function listarEscola(){
        //vai ao banco de dados e pega todos os livros
        echo "entrei aqui";
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user");
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            $escola=array();
            $i=0;
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $escola = new classEscola();
                $escola->setEmail($linha['email']);
                $escola->setPhone($linha['phone']);
                $_SESSION['email'] = $escola->getEmail();
                $_SESSION['phone'] = $escola->getPhone();
                $escola[$i] = $escola;
                $i++;
            }
            return $escola;
        }
        catch(PDOException $e){
        return array();
       }
    }


    public function incluirEscola($sch){
       try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user where login =:login");
            $sql->bindParam("login",$login);
            $login = $sch->getLogin();
            $sql->execute();
            $res = $sql->rowcount();
            if($res > 0){
                echo "já cadastrado";
            }
            else{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("insert into bd_cantinaon.user (email, password, login, phone, type) values (:email, :password, :login, :phone, :type)");
                $sql->bindParam("email",$email);
                $sql->bindParam("password",$password);
                $sql->bindParam("login",$login);
                $sql->bindParam("phone",$phone);
                $sql->bindParam("type",$type);
                $email = $sch->getEmail();
                $login = $sch->getLogin();
                $password = $sch->getPassword();
                $phone = $sch->getPhone(); 
                $type = 'E';
                $sql->execute();
                $last_id = $minhaConexao->lastInsertId();
                $sql2 = $minhaConexao->prepare("insert into bd_cantinaon.school (location, idUser) values (:location, :idUser)");
                $sql2->bindParam("location",$location);
                $sql2->bindParam("idUser",$idUser);
                $location = $sch->getendereco();
                $idUser = $last_id;
                echo "aqui".$last_id;
                $sql2->execute();
                return $last_id;
            }          
        }
        catch(PDOException $e){
            echo "entrou no catch".$e->getmessage();
            return 0;
        }
    }


     public function editarEscola($sch){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("update bd_cantinaon.user set login=:login, email=:email,  password=:password, phone=:phone where id=:id;
            update bd_cantinaon.school set location=:location where idUser=:id");
            $sql->bindParam("login",$login);
            $sql->bindParam("email",$email);
            $sql->bindParam("password",$password);
            $sql->bindParam("phone",$phone);
            $sql->bindParam("location",$location);
            $sql->bindParam("id",$id);
            $id = $_SESSION['id'];
            $login = $sch->getLogin();
            $email = $sch->getEmail();
            $password = $sch->getPassword();
            $phone = $sch->getPhone();
            $location = $sch->getendereco();
            $sql->execute();
            $_SESSION['login'] = $login;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['password'] = $password;
            $_SESSION['location'] = $location;
         }
         catch(PDOException $e){
             //echo "entrou no catch".$e->getmessage();
            
         }
     }

}

?>