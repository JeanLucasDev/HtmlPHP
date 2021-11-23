<?php
session_start();
require_once "Conexao.php";
class classAlunoDAO{

    public function listarTodos(){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.student ");
        
                
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           $listaAln=array();
           $i=0;

           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $aluno = new Livro();
            $aluno->setnome($linha['name']);
            $aluno->setmatricula($linha['registration']);
            $listaAln[$i] = $aluno;
            $i++;
          }
        return $listaAln;
       }
       catch(PDOException $e){
        return array();
       }
    }

    public function pesquisaLivro($aln){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.student where codigo=:codigo");
            $sql->bindParam("codigo",$codigo);
            $codigo = $aln->getCodigo();
                
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $aln->setTitulo($linha['nome']);
            $aln->setEdicao($linha['edicao']);
            $aln->setAno($linha['ano']);
          }
        
       }
       catch(PDOException $e){
        
       }
    }

    public function incluirAluno($aln){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user where login =:login");
            $sql->bindParam("login",$login);
            $login = $aln->getLogin();
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
                $login = $aln->getLogin();
                $email = $aln->getEmail();
                $password = $aln->getPassword();
                $phone = $aln->getPhone(); 
                $type = 'A';
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

     public function loginAluno($aln){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user where login =:login and password =:password and type =:type ");
            $sql->bindParam("login",$login);
            $sql->bindParam("password",$password);
            $sql->bindParam("type",$type);
            $login = $aln->getLogin();
            $password = $aln->getPassword();
            $type = 'A';
            $sql->execute();
            $res = $sql->rowcount();
            if($res > 0){
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
                header('location:tela_aluno_principal.php');
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

    public function alterarLivro($aln){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("update bd_cantinaon.student set nome=:nome, edicao=:edicao, ano=:ano where codigo=:codigo");
            $sql->bindParam("codigo",$codigo);
            $sql->bindParam("nome",$nome);
            $sql->bindParam("edicao",$edicao);
            $sql->bindParam("ano",$ano);
            $codigo = $aln->getCodigo();
            $nome = $aln->getTitulo();
            $edicao = $aln->getEdicao();
            $ano = $aln->getAno();
            $sql->execute();
            
         }
         catch(PDOException $e){
             //echo "entrou no catch".$e->getmessage();
            
         }
     }

    public function excluirLivro($aln){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("delete from bd_cantinaon.student where codigo=:codigo");
            $sql->bindParam("codigo",$codigo);
            $codigo = $aln->getCodigo();
            $sql->execute();
            
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
             exit();
         }
     }


}

?>