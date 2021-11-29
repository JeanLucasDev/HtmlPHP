<?php
require_once "Conexao.php";
class classFuncionarioDAO{
    public function listarFuncionarios(){
        //vai ao banco de dados e pega todos os livros
        try{
            echo $_SESSION['id'];
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select employee.id, employee.cpf, user.login, user.phone, user.email from bd_cantinaon.employee right join bd_cantinaon.school on employee.idSchool = school.id inner join bd_cantinaon.user on user.id = employee.idUser where school.idUser = :idUser ;");
            $sql->bindParam("idUser",$idUser);
            $idUser = $_SESSION['id']; 
            $sql->execute();
            echo $_SESSION['id'];
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            $listaFun=array();
            $i=0;
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC) ) {
                echo "Echo aqui aqui aqui".$linha['id'];
                $fun = new classFuncionario();
                $fun->setId($linha['id']);
                $fun->setLogin($linha['login']);
                $fun->setEmail($linha['email']);
                $fun->setPhone($linha['phone']);
                $fun->setcpf($linha['cpf']);
                $listaFun[$i] = $fun;
                $i++;
            }
            return $listaFun;
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
                $sql = $minhaConexao->prepare("select * from bd_cantinaon.school where idUser =:idUser ");
                $sql->bindParam("idUser",$idUser);
                $idUser = $_SESSION['id'];
                $sql->execute();
                $idSchool = $sql->fetch();
                $sql2 = $minhaConexao->prepare("insert into bd_cantinaon.employee (cpf, idUser, idSchool) values (:cpf, :idUser, :idSchool)");
                $sql2->bindParam("cpf",$cpf);
                $sql2->bindParam("idUser",$idUser);
                $sql2->bindParam("idSchool",$School);
                $School = $idSchool['id'];
                $idUser = $last_id;
                $cpf = $fun->getcpf();
                $sql2->execute();
                return $last_id;
            }
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
             return 0;
         }
     }

     public function editarFuncionario($fun){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * FROM bd_cantinaon.employee where employee.id=:id;");
            $sql->bindParam("id",$id);
            $id = $fun->getId();
            $sql->execute(); 
            while($user = $sql->fetch()){
                echo "totototoott";
                $idUser = $user['idUser'];
            }
            $sql = $minhaConexao->prepare("update bd_cantinaon.user INNER JOIN bd_cantinaon.employee ON user.id=idUser SET login=:login, email=:email, password=:password, phone=:phone, cpf=:cpf where employee.idUser=:idUser;
            update bd_cantinaon.employee set cpf=:cpf where id=:id");
            echo $idUser;
            $sql->bindParam("login",$login);
            $sql->bindParam("email",$email);
            $sql->bindParam("password",$password);
            $sql->bindParam("phone",$phone);
            $sql->bindParam("cpf",$cpf);
            $sql->bindParam("idUser",$idUser);
            $sql->bindParam("id",$id);
            $sql->bindParam("Type",$Type);
            $Type = 'F';
            $id = $fun->getId();
            $login = $fun->getLogin();
            $email = $fun->getEmail();
            $password = $fun->getPassword();
            $phone = $fun->getPhone();
            $cpf = $fun->getcpf();
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