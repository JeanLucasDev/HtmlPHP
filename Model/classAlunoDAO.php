<?php
require_once "Conexao.php";
class classAlunoDAO{

    public function listarAlunos(){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select student.id, user.login, student.class,student.registration, student.balance from bd_cantinaon.student inner join bd_cantinaon.user on user.id = student.idUser inner join bd_cantinaon.parents on parents.id = student.idParents where parents.idUser = :idUser;");
            $sql->bindParam("idUser",$idUser);
            $idUser = $_SESSION['id']; 
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            $listaAln=array();
            $i=0;
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC) ) {
                $aln = new classAluno();
                $aln->setId($linha['id']);
                $aln->setLogin($linha['login']);
                $aln->setmatricula($linha['registration']);
                $aln->setturma($linha['class']);
                $aln->setsaldo($linha['balance']);
                $listaAln[$i] = $aln;
                $i++;
            }
            return $listaAln;
        }
       catch(PDOException $e){
        return array();
       }
    }

    public function pesquisarAluno($aln){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select student.id, user.login, student.registration, student.balance from bd_cantinaon.student inner join bd_cantinaon.user on student.idUser = user.id where registration=:registration");
            $sql->bindParam("registration",$matricula);
            $matricula = $aln->getmatricula();
            $sql->execute();
            echo "EXECUTOU";
            $res = $sql->rowcount();
            if($res > 0){
                echo "CHEGOU AQUI 1";
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "ENTROU AQUI 2";
                    $aln = new classAluno();
                    $aln->setid($linha['id']);
                    $aln->setLogin($linha['login']);
                    $aln->setmatricula($linha['registration']);
                    $aln->setsaldo($linha['balance']);
                    $aluno = $aln;
                }
                return $aluno;
            
            }
            else{
                $aln = new classAluno();
                $aluno = $aln;
                return $aluno;
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
                echo "OIFI".$_SESSION['id'];
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
                $sql = $minhaConexao->prepare("select parents.idSchool, parents.id from bd_cantinaon.school inner join bd_cantinaon.user inner join bd_cantinaon.parents on parents.idUser = user.id where user.id = :idUser;");
                $sql->bindParam("idUser",$idUser);
                $idUser = $_SESSION['id'];
                $sql->execute();
                $idSchool = $sql->fetch();
                $sql2 = $minhaConexao->prepare("insert into bd_cantinaon.student (class, registration, idUser, idParents, idSchool, balance) values (:class, :registration, :idUsuario, :idParents, :idEscola, :balance);");
                $sql2->bindParam("class",$class);
                $sql2->bindParam("idParents",$idParents);
                $sql2->bindParam("registration",$registration);
                $sql2->bindParam("idUsuario",$idUsuario);
                $sql2->bindParam("idEscola",$idEscola);
                $sql2->bindParam("balance",$balance);
                $idUsuario = $last_id;
                $idEscola = $idSchool['idSchool'];
                $idParents = $idSchool['id'];
                $class = $aln->getturma();
                $registration = $aln->getmatricula();
                $balance = $aln->getsaldo();
                $sql2->execute();
                $sql3 = $minhaConexao->prepare("select student.id from bd_cantinaon.student inner join bd_cantinaon.parents on student.idParents = parents.id where parents.id = :idParents and student.idUser = :idUser ;");
                $sql3->bindParam("idParents",$idResponsavel);
                $sql3->bindParam("idUser",$idUser);
                $idUser = $idUsuario;
                $idResponsavel = $idParents;
                echo " USUARIO: ".$idUser;
                echo "PARENTE: ".$idResponsavel;
                $sql3->execute();
                $idAluno = $sql3->fetch();
                $id = $idAluno['id'];
                echo "Aqui".$id;
                echo "ID ALUNO: ".$idAluno['id'];
                echo " USUARIO:".$idUsuario;
                echo " ESCOLA:".$idEscola;
                echo " PARENTE:".$idParents;
                echo " CLASS:".$class;
                echo " MATRICULA:".$registration;
                echo "Amamammama: ".$id;
                return $id;
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

    public function editarAluno($aln){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("update bd_cantinaon.student set registration=:registration, class=:class where student.id=:id;
            update bd_cantinaon.user inner join bd_cantinaon.student on student.idUser = user.id set email=:email, password=:password, login=:login, phone=:phone where student.id=:id; ");
            $sql->bindParam("id",$id);
            $sql->bindParam("registration",$matricula);
            $sql->bindParam("class",$turma);
            $sql->bindParam("login",$login);
            $sql->bindParam("email",$email);
            $sql->bindParam("password",$password);
            $sql->bindParam("phone",$phone);
            $id =  $aln->getId();
            $login = $aln->getLogin();
            $matricula = $aln->getmatricula();
            $turma = $aln->getturma();
            $email = $aln->getEmail();
            $password = $aln->getPassword();
            $phone= $aln->getPhone();
            $sql->execute();
         }
         catch(PDOException $e){
             //echo "entrou no catch".$e->getmessage();
         }
     }

     public function removerAluno($aln){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select student.id,student.idUser from bd_cantinaon.student where student.id=:id");
            $sql->bindParam("id",$id);
            $id = $aln->getId();
            $sql->execute();
            $idEstudante = $sql->fetch();
            $sql = $minhaConexao->prepare("
            delete user from bd_cantinaon.user inner join bd_cantinaon.student on student.idUser = user.id where student.id=:id;
            delete from bd_cantinaon.student where student.id=:id;");
            $sql->bindParam("id",$id);
            $id= $aln->getId();
            $sql->execute(); 
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
             exit();
         }
     }



     public function AddSaldo($aln){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select student.balance from bd_cantinaon.student where id=:id;");
            $sql->bindParam("id",$id);
            $id = $aln->getId(); 
            $sql->execute();
            echo "ENTROU AQUI 2";
            $saldoAtual = $sql->fetch();
            $sql = $minhaConexao->prepare("update bd_cantinaon.student set balance=:balance where student.id=:id;");
            $sql->bindParam("id",$id);
            $sql->bindParam("balance",$balance);
            $id = $aln->getId();
            $balance = $saldoAtual['balance'] + $aln->getsaldo();
            echo "CALCULOU";
            $sql->execute();
            echo "RETORNO: ".$balance;
            return $balance;
        }
        catch(PDOException $e){
          return 0;
        }
    }

    public function removeSaldo($aln, $valor){
        try{
            echo "VALOR: ".$valor;
            echo "ID ALUNO: ".$aln->getId();
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select student.balance from bd_cantinaon.student where idUser=:id;");
            $sql->bindParam("id",$id);
            $id = $aln->getId(); 
            $sql->execute();
            echo "ENTROU AQUI 2";
            $saldoAtual = $sql->fetch();
            echo "O saldo atual é: ".$saldoAtual['balance'];
            if($valor < $saldoAtual['balance']){
                echo "VALOR É MENOR QUE O SALDO";
                $balance = $saldoAtual['balance'] - $valor;
                $_SESSION['balance'] = $balance;
                $sql = $minhaConexao->prepare("update bd_cantinaon.student set balance=:balance where student.idUser=:id;");
                $sql->bindParam("id",$id);
                $sql->bindParam("balance",$balance);
                $id = $aln->getId();
                $sql->execute();
            }
        }
        catch(PDOException $e){
          return 0;
        }
    }
     
     


}

?>