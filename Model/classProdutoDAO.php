<?php
require_once "Model/classComida.php";
require_once "Model/classBebida.php";
require_once "Model/itemCarrinho.php";
require_once "Conexao.php";

class classProdutoDAO{
    public function listarProdutos(){
        //vai ao banco de dados e pega todos os livros
        try{
            echo "entoru aqui";
            echo $_SESSION['id'];
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select product.id, product.name, product.photo, product.price,product.code from bd_cantinaon.product inner join bd_cantinaon.school inner join bd_cantinaon.employee on employee.idSchool = school.id where employee.idUser = :idUser;");
            $sql->bindParam("idUser",$idUser);
            $idUser = $_SESSION['id']; 
            $sql->execute();
            echo "Chegou aqui 1";
            echo $_SESSION['id'];
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            $listaPrdt=array();
            $i=0;
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC) ) {
                echo "Echo aqui aqui aqui".$linha['id'];
                $prdt = new classProduto();
                $prdt->setid($linha['id']);
                $prdt->setnome($linha['name']);
                $prdt->setfoto($linha['photo']);
                $prdt->setpreco($linha['price']);
                $prdt->setcodigo($linha['code']);
                echo $prdt->getfoto();
                $listaPrdt[$i] = $prdt;
                $i++;
            }
            return $listaPrdt;
        }
       catch(PDOException $e){
        return array();
       }
    }


    public function listarComidas(){
        //vai ao banco de dados e pega todos os livros
        try{
            echo "entoru aqui";
            echo "ID DO USUARIO LOGADO: ".$_SESSION['id'];
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select product.id, food.ingredients, product.name, product.photo, product.code, product.price from bd_cantinaon.food inner join bd_cantinaon.product on food.idProduct = product.id inner join bd_cantinaon.student inner join bd_cantinaon.user on student.idUser = user.id inner join bd_cantinaon.school on student.idSchool = school.id where user.id = :id;");
            $sql->bindParam("id",$idUser);
            $idUser = $_SESSION['id']; 
            $sql->execute();
            $listaComida=array();
            $i=0;
            while ($Produto = $sql->fetch(PDO::FETCH_ASSOC) ) {
                $food = new classComida();
                $food->setid($Produto['id']);
                $food->setnome($Produto['name']);
                $food->setfoto($Produto['photo']);
                $food->setpreco($Produto['price']);
                $food->setcodigo($Produto['code']);
                $food->setingredientes($Produto['ingredients']);
                $listaComida[$i] = $food;
                $i++;
            }
            return $listaComida;
        }
       catch(PDOException $e){
        return array();
       }
    }

    public function listarBebidas(){
        //vai ao banco de dados e pega todos os livros
        try{
            echo "entoru aqui";
            echo "ID DO USUARIO LOGADO: ".$_SESSION['id'];
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select product.id, drink.provider, product.name, product.photo, product.code, product.price from bd_cantinaon.drink inner join bd_cantinaon.product on drink.idProduct = product.id inner join bd_cantinaon.student inner join bd_cantinaon.user on student.idUser = user.id inner join bd_cantinaon.school on student.idSchool = school.id where user.id = :id;");
            $sql->bindParam("id",$idUser);
            $idUser = $_SESSION['id']; 
            $sql->execute();
            $listaBebida=array();
            $i=0;
            while ($Produto = $sql->fetch(PDO::FETCH_ASSOC) ) {
                $bebida = new classBebida();
                $bebida->setid($Produto['id']);
                $bebida->setnome($Produto['name']);
                $bebida->setfoto($Produto['photo']);
                $bebida->setpreco($Produto['price']);
                $bebida->setcodigo($Produto['code']);
                $bebida->setfornecedor($Produto['provider']);
                $listaBebida[$i] = $bebida;
                $i++;
            }
            return $listaBebida;
        }
       catch(PDOException $e){
        return array();
       }
    }

    public function pesquisarProduto($prdt){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.product where id=:id");
            $sql->bindParam("id",$id);
            $id = $prdt->getid();
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $prdt->setnome($linha['name']);
                $prdt->setfoto($linha['photo']);
                $prdt->setpreco($linha['price']);
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

     public function editarProdutos($prdt){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.food inner join bd_cantinaon.product on food.idProduct = product.id where product.id=:id;");
            $sql->bindParam("id",$id);
            $id = $prdt->getId();
            $sql->execute(); 
            $res = $sql->rowcount();
            if($res > 0){
                echo "entrou comida";
                return 1;
            }
            else{
                echo "entrou bebida";
                return 0;
            }            
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
            
         }
     }



    public function removerProduto($prdt){
        try{
            echo "CODIGO: ".$prdt->getcodigo();
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select food.id from bd_cantinaon.food inner join bd_cantinaon.product on food.idProduct = product.id where product.code=:code");
            $sql->bindParam("code",$codigo);
            $codigo = $prdt->getcodigo();
            $sql->execute();
            $res = $sql->rowcount();
            echo "CHEGOU AQUI".$res; 

            if($res > 0){
                echo "CHEGOU AQUI 2";
                $idComida = $sql->fetch();
                echo "ID DA COMIDA: ".$idComida['id'];
                $sql = $minhaConexao->prepare("delete from bd_cantinaon.product where code=:code; 
                delete from bd_cantinaon.food where id=:id;
                ");
                $sql->bindParam("code",$codigo);
                $sql->bindParam("id",$id);
                $codigo = $prdt->getcodigo();
                echo "ID DA COMIDA: ".$idComida['id'];
                $id = $idComida['id'];
                $sql->execute();
            }
            else{
                $sql = $minhaConexao->prepare("select drink.id from bd_cantinaon.drink inner join bd_cantinaon.product on drink.idProduct = product.id where product.code=:code");
                $sql->bindParam("code",$codigo);
                $codigo = $prdt->getcodigo();
                $sql->execute();
                $idBebida = $sql->fetch();
                $sql = $minhaConexao->prepare("delete from bd_cantinaon.product where code=:code; 
                delete from bd_cantinaon.drink where id=:id;
                ");
                $sql->bindParam("code",$codigo);
                $sql->bindParam("id",$id);
                $codigo = $prdt->getcodigo();
                $id = $idBebida['id'];
                $sql->execute();
            }
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
             exit();
         }
     }


}

?>