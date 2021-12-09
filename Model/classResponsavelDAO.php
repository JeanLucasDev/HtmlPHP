<?php
require "Conexao.php";
class classResponsavelDAO{



    public function pesquisarResponsavel($resp){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select parents.id, user.login, parents.cpf, user.email, user.phone from bd_cantinaon.parents inner join bd_cantinaon.user on parents.idUser = user.id where cpf=:cpf");
            $sql->bindParam("cpf",$cpf);
            $cpf = $resp->getcpf();
            $sql->execute();
            $res = $sql->rowcount();
            if($res > 0){
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "ENTROU AQUI 2";
                    $resp = new classResponsavel();
                    $resp->setid($linha['id']);
                    $resp->setLogin($linha['login']);
                    $resp->setcpf($linha['cpf']);
                    $resp->setEmail($linha['email']);
                    $resp->setPhone($linha['phone']);
                    echo "LOGIN: ".$resp->getLogin();
                    $responsavel = $resp;
                }
                return $responsavel;
            
            }
            else{
                $resp = new classResponsavel();
                $responsavel = $resp;
                return $responsavel;
            }
       }
       catch(PDOException $e){
        
       }
    }

    public function incluirResponsavel($rsp){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user where login =:login");
            $sql->bindParam("login",$login);
            $login = $rsp->getLogin();
            $sql->execute();
            $res = $sql->rowcount();
            if($res > 0){
                echo "já cadastrado";
            }
            else{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("insert into bd_cantinaon.user (email, password, login, phone, type) values (:email, :password, :login, :phone, :type)");
                $sql->bindParam("login",$login);
                $sql->bindParam("email",$email);
                $sql->bindParam("password",$password);
                $sql->bindParam("phone",$phone);
                $sql->bindParam("type",$type);
                $login = $rsp->getLogin();
                $email = $rsp->getEmail();
                $password = $rsp->getPassword();
                $phone = $rsp->getPhone(); 
                $type = 'R';
                $sql->execute();
                $last_id = $minhaConexao->lastInsertId();

                echo "IDUSER: ".$_SESSION['id'];
                $sql = $minhaConexao->prepare("select * from bd_cantinaon.user inner join bd_cantinaon.employee on employee.idUser = user.id  where user.id=:idUser;");
                $sql->bindParam("idUser",$idUser);
                $idUser = $_SESSION['id'];
                $sql->execute();
                $idSchool = $sql->fetch();
                $sql2 = $minhaConexao->prepare("insert into bd_cantinaon.parents (cpf, idUser, idSchool) values (:cpf, :idUser, :idSchool)");
                $sql2->bindParam("cpf",$cpf);
                $sql2->bindParam("idUser",$idUser);
                $sql2->bindParam("idSchool",$idEscola);
                $idEscola = $idSchool['idSchool'];
                $idUser = $last_id;
                $cpf = $rsp->getcpf();
                $sql2->execute();
                return $last_id;
            }
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
             return 0;
         }
     }


     public function editarResponsavel($resp){
        try{
            $minhaConexao = Conexao::getConexao();
            echo "ID: ".$resp->getid();
            echo "CPF: ".$resp->getcpf();
            echo "LOGIN: ".$resp->getLogin();
            echo "EMAIL: ".$resp->getEmail();
            echo "PASSWORD: ".$resp->getPassword();
            echo "PHONE: ".$resp->getPhone();
            $sql = $minhaConexao->prepare("update bd_cantinaon.parents set cpf=:cpf where parents.id=:id;
            update bd_cantinaon.user inner join bd_cantinaon.parents on parents.idUser = user.id set email=:email, password=:password, login=:login, phone=:phone where parents.id = :id;");
            $sql->bindParam("id",$id);
            $sql->bindParam("cpf",$cpf);
            $sql->bindParam("login",$login);
            $sql->bindParam("email",$email);
            $sql->bindParam("password",$password);
            $sql->bindParam("phone",$phone);
            $id =  $resp->getid();
            $login = $resp->getLogin();
            $cpf = $resp->getcpf();
            $email = $resp->getEmail();
            $password = $resp->getPassword();
            $phone= $resp->getPhone();
            $sql->execute();
         }
         catch(PDOException $e){
             //echo "entrou no catch".$e->getmessage();
         }
     }

     public function removerResponsavel($resp){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select parents.id,parents.idUser from bd_cantinaon.parents where parents.id=:id");
            $sql->bindParam("id",$id);
            $id = $resp->getid();
            $sql->execute();
            $idParent = $sql->fetch();
            $sql = $minhaConexao->prepare("
            delete user from bd_cantinaon.user inner join bd_cantinaon.student on student.idUser = user.id inner join bd_cantinaon.parents on student.idParents = parents.id where parents.id = :id;
            delete from bd_cantinaon.user where user.id=:idUser; 
            delete from bd_cantinaon.student where student.idParents = :id;
            delete from bd_cantinaon.parents where id=:id; ");
            $sql->bindParam("id",$id);
            $sql->bindParam("idUser",$idUser);
            $id= $resp->getid();
            $idUser = $idParent['idUser'];
            $sql->execute(); 
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
             exit();
         }
     }


}

?>