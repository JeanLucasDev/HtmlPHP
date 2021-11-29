<?php
require_once "Conexao.php";
class classUsuarioDAO{
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

    public function pesquisarUsuario($usr){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user where login=:login");
            $sql->bindParam("login",$login);
            $login = $usr->getLogin();  
            $sql->execute();
            while($escola = $sql->fetch()){
                 $_SESSION['login'] = $escola['login'];
                 $_SESSION['phone'] = $escola['phone'];
                 $_SESSION['email'] = $escola['email'];
            }
        }
        catch(PDOException $e){
            echo "entrou no catch".$e->getmessage();
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
                return $last_id;
            }
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
             return 0;
         }
     }

     public function loginUsuario($usr){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.user where login =:login and password =:password and type =:type;");
            $sql->bindParam("login",$login);
            $sql->bindParam("password",$password);
            $sql->bindParam("type",$type);
            $login = $usr->getLogin();
            $password = $usr->getPassword();
            $type = $usr->getType();
            $sql->execute();
            $res = $sql->rowcount();
            if($res > 0){
                if($type == 'E'){
                    while($user = $sql->fetch()){
                        $sql2 = $minhaConexao->prepare("select * from bd_cantinaon.school where idUser=:idUser");
                        $sql2->bindParam('idUser',$idUser);
                        $idUser = $user['id'];
                        $sql2->execute();
                        while($escola = $sql2->fetch()){
                            $_SESSION['location'] = $escola['location'];
                        }
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['login'] = $user['login'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['phone'] = $user['phone'];
                        $_SESSION['password'] = $user['password'];
                        $_SESSION['type'] = $user['type'];
                        $_SESSION['logged'] = true;
                        header('location:tela_escola_principal.php');
                   }
                }
                else if ($type == 'A'){
                    while($user = $sql->fetch()){
                        $sql = $minhaConexao->prepare("select student.id, student.registration, student.class, student.balance from bd_cantinaon.student inner join bd_cantinaon.user on student.idUser = user.id where user.id = :idUser;");
                        $sql->bindParam('idUser',$idUser);
                        $idUser = $user['id'];
                        $sql->execute();
                        $Student = $sql->fetch(); 
                        $_SESSION['login'] = $user['login'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['phone'] = $user['phone'];
                        $_SESSION['password'] = $user['password'];
                        $_SESSION['type'] = $user['type'];
                        $_SESSION['logged'] = true;
                        $_SESSION['registration'] = $Student['registration'];
                        $_SESSION['class'] = $Student['class'];
                        $_SESSION['balance'] = $Student['balance'];
                        $sql3 = $minhaConexao->prepare("select user.email, user.phone, school.location from bd_cantinaon.user inner join bd_cantinaon.school on user.id = school.idUser inner join bd_cantinaon.student on school.id = student.idSchool WHERE student.idUser =:idUser ;");
                        $sql3->bindParam('idUser',$idUser);
                        $idUser = $user['id'];
                        $sql3->execute();
                        $info = $sql3->fetch();
                        echo $info['email'];
                        $_SESSION['sch_location'] = $info['location'];
                        $_SESSION['sch_phone'] = $info['phone'];
                        $_SESSION['sch_email'] = $info['email'];
                        header('location:tela_aluno_principal.php');
                    }
                }
                else if ($type == 'R'){
                    while($user = $sql->fetch()){
                        $sql2 = $minhaConexao->prepare("select * from bd_cantinaon.parents inner join bd_cantinaon.user on (user.id=:idUser) = (parents.idUser=:idUser) and type=:type inner join bd_cantinaon.school;");
                        $sql2->bindParam('idUser',$idUser);
                        $sql2->bindParam('type',$type);
                        $idUser = $user['id'];
                        $type = 'R';
                        $sql2->execute();
                        while($escola = $sql2->fetch()){
                            echo "ENTROU NO LOOP: ".$escola['cpf'];
                            $_SESSION['cpf'] = $escola['cpf'];
                        }
                        $sql3 = $minhaConexao->prepare("select user.email, user.phone, school.location from bd_cantinaon.user inner join bd_cantinaon.school on user.id = school.idUser inner join bd_cantinaon.parents on school.id = parents.idSchool WHERE parents.idUser =:idUser ;");
                        $sql3->bindParam('idUser',$idUser);
                        $idUser = $user['id'];
                        $sql3->execute();
                        $info = $sql3->fetch();
                        echo $info['email'];
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['login'] = $user['login'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['phone'] = $user['phone'];
                        $_SESSION['password'] = $user['password'];
                        $_SESSION['type'] = $user['type'];
                        $_SESSION['logged'] = true;
                        $_SESSION['sch_location'] = $info['location'];
                        $_SESSION['sch_phone'] = $info['phone'];
                        $_SESSION['sch_email'] = $info['email'];
                        header('location:tela_responsavel_principal.php');
                    }
                }
                else if ($type == 'F') {
                    while($user = $sql->fetch()){
                        $sql2 = $minhaConexao->prepare("select * from bd_cantinaon.employee inner join bd_cantinaon.user on (user.id=:idUser) = (employee.idUser=:idUser) and type=:type inner join bd_cantinaon.school;");
                        $sql2->bindParam('idUser',$idUser);
                        $sql2->bindParam('type',$type);
                        $idUser = $user['id'];
                        $type = 'F';
                        $sql2->execute();
                        while($escola = $sql2->fetch()){
                            $_SESSION['cpf'] = $escola['cpf'];
                        }
                        $sql3 = $minhaConexao->prepare("select user.email, user.phone, school.location from bd_cantinaon.user inner join bd_cantinaon.school on user.id = school.idUser inner join bd_cantinaon.employee on school.id = employee.idSchool WHERE employee.idUser =:idUser ;");
                        $sql3->bindParam('idUser',$idUser);
                        $idUser = $user['id'];
                        $sql3->execute();
                        $info = $sql3->fetch();
                        echo $info['email'];
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['login'] = $user['login'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['phone'] = $user['phone'];
                        $_SESSION['password'] = $user['password'];
                        $_SESSION['type'] = $user['type'];
                        $_SESSION['logged'] = true;
                        $_SESSION['sch_location'] = $info['location'];
                        $_SESSION['sch_phone'] = $info['phone'];
                        $_SESSION['sch_email'] = $info['email'];
                        header('location:tela_funcionario_principal.php');
                    }
                }
            }
            else{
                unset ($_SESSION['login']);
                unset ($_SESSION['password']);
                header('location:login.php');
            }
        }
        catch(PDOException $e){
          echo "entrou no catch".$e->getmessage();
          return 0;
        }
 
    }

    public function logout(){
            $_SESSION = array();
            $_SESSION['logged'] = false;
            session_destroy();
            header('Location: index.php');
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