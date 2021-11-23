<?php
session_start();
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

    public function pesquisaLivro($liv){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_livraria.livro where codigo=:codigo");
            $sql->bindParam("codigo",$codigo);
            $codigo = $liv->getCodigo();
                
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $liv->setTitulo($linha['nome']);
            $liv->setEdicao($linha['edicao']);
            $liv->setAno($linha['ano']);
          }
        
       }
       catch(PDOException $e){
        
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
                $sql = $minhaConexao->prepare("insert into bd_cantinaon.user (email, password, login, phone, type) values (:email, :password, :login, :phone, :type);
                insert into bd_cantinaon.school (location) values (:location)" );
                $sql->bindParam("email",$email);
                $sql->bindParam("password",$password);
                $sql->bindParam("login",$login);
                $sql->bindParam("phone",$phone);
                $sql->bindParam("location",$location);
                $sql->bindParam("type",$type);
                $email = $sch->getEmail();
                $login = $sch->getLogin();
                $password = $sch->getPassword();
                $phone = $sch->getPhone(); 
                $location = $sch->getendereco();
                $type = 'E';
                $sql->execute();
                $last_id = $minhaConexao->lastInsertId();
                return $last_id;
            }          
        }
        catch(PDOException $e){
            echo "entrou no catch".$e->getmessage();
            return 0;
        }
    }

    public function alterarLivro($liv){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("update bd_cantinaon.user set login=:login, password=:password, ano=:ano where codigo=:codigo");
            $sql->bindParam("codigo",$codigo);
            $sql->bindParam("nome",$nome);
            $sql->bindParam("edicao",$edicao);
            $sql->bindParam("ano",$ano);
            $codigo = $liv->getCodigo();
            $nome = $liv->getTitulo();
            $edicao = $liv->getEdicao();
            $ano = $liv->getAno();
            $sql->execute();
               
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
            
         }
     }

    public function loginEscola($sch){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user where login =:login and password =:password and type =:type ");
            $sql->bindParam("login",$login);
            $sql->bindParam("password",$password);
            $sql->bindParam("type",$type);
            $login = $sch->getLogin();
            $password = $sch->getPassword();
            $type = 'E';
            $sql->execute();
            $res = $sql->rowcount();
            if($res > 0){
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
                header('location:tela_escola_principal.php');
            }
            else{
                unset ($_SESSION['login']);
                unset ($_SESSION['password']);
                header('location:login.php');
            }
        }
        catch(PDOException $e){
          return 0;
        }
 
    }



    public function excluirLivro($liv){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("delete from bd_livraria.livro where codigo=:codigo");
            $sql->bindParam("codigo",$codigo);
            $codigo = $liv->getCodigo();
            
            $sql->execute();
            
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
             exit();
         }
     }
     


}

?>