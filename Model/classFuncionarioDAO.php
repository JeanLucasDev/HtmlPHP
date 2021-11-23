<?php
require "Conexao.php";
class classFuncionarioDAO{
    public function listarTodos(){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.school ");
        

           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           $listaSch=array();
           $i=0;

           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $escola = new classEscola();
            $escola->setCodigo($linha['codigo']);
            $escola->setTitulo($linha['nome']);
            $escola->setEdicao($linha['edicao']);
            $escola->setAno($linha['ano']);
            $listaLiv[$i] = $livro;
            $i++;
          }
        return $listaLiv;
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

    public function incluirFuncionario($fun){
        try{    
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user where login =:login");
            $sql->bindParam("login",$login);
            $login = $fun->getLogin();
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
                $login = $fun->getLogin();
                $email = $fun->getEmail();
                $password = $fun->getPassword();
                $phone = $fun->getPhone(); 
                $type = 'F';
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

     public function loginFuncionario($fun){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user where login =:login and password =:password and type =:type ");
            $sql->bindParam("login",$login);
            $sql->bindParam("password",$password);
            $sql->bindParam("type",$type);
            $login = $fun->getLogin();
            $password = $fun->getPassword();
            $type = 'F';
            $sql->execute();
            $res = $sql->rowcount();
            if($res > 0){
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
                header('location:tela_funcionario_principal.php');
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

    public function alterarLivro($liv){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("update bd_livraria.livro set nome=:nome, edicao=:edicao, ano=:ano where codigo=:codigo");
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