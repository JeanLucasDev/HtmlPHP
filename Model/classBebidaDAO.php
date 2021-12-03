<?php
require_once "Conexao.php";
class classBebidaDAO{

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

    public function incluirBebida($beb){
        echo "Testando".$_SESSION['id'];
        try{    
            echo "CHEGOU ATE AQUI -3";
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.drink inner join bd_cantinaon.product on drink.idProduct = product.id inner join bd_cantinaon.employee on product.idSchool = employee.idSchool where employee.id = :id;");
            $sql->bindParam("id",$id);
            $idFuncionario = $_SESSION['id'];
            echo "CHEGOU ATE AQUI -2";
            $sql->execute();
            echo "CHEGOU ATE AQUI -1";
            $res = $sql->rowcount();
            if($res > 0){
                echo "já cadastrado";
            }
            else{
                $sql2 = $minhaConexao->prepare(" select employee.idSchool from bd_cantinaon.employee where employee.idUser = :id ;");
                $sql2->bindParam("id",$id);
                $id = $_SESSION['id'];
                echo "ID : ".$id; 
                $sql2->execute();
                echo "CHEGOU ATE AQUI 0";
                $idEscola = $sql2->fetch();
                echo "ID DA ESCOLA: ".$idEscola['idSchool'];
                $sql3 = $minhaConexao->prepare("insert into bd_cantinaon.product (name, code, price, blocked, idSchool) values (:name, :code, :price, :blocked, :idSchool);");
                $sql3->bindParam("name",$name);
                $sql3->bindParam("code",$code);
                $sql3->bindParam("price",$price);
                $sql3->bindParam("blocked",$blocked);
                $sql3->bindParam("idSchool",$idSchool);
                $name = $beb->getnome();
                $code = $beb->getcodigo();
                $price = $beb->getpreco();
                $photo = $beb->getfoto(); 
                $blocked = true;
                $idSchool = $idEscola['idSchool'];
                echo "ID ESCOLA: ".$idSchool;
                $sql3->execute();
                $last_id = $minhaConexao->lastInsertId();
                echo "Aaaaaaaaaaaaaaa ".$idSchool;
                $imagem = $beb->getfoto();  
                if($imagem != NULL) {
                  echo "entrou no if da imagem !=null";
                 //defini o nome do novo arquivo, que será o id gerado para o livro
                 $nomeFinal = $last_id.'.jpg';
                 //move o arquivo para a pasta atual com esse novo nome
                 if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
                     echo "Copiou a imagem";
                     echo "Nome final: ".$nomeFinal;
                     echo "ID PRODUTO: ".$last_id;
                     echo "NOME: ".$imagem['tmp_name'];

                   //atualiza o banco de dados para guardar o nome do arquivo gerado.
                    $sql = $minhaConexao->prepare("update bd_cantinaon.product set photo = :photo where id=:id");
                    $sql->bindParam("photo",$nomeFinal);
                    $sql->bindParam("id",$last_id);
                    $sql->execute();
                    echo "atulizou o nome da imagem no bd";
                    
                  }
                }
    
                echo "CHEGOU ATE AQUI 2";
                $sql4 = $minhaConexao->prepare(" select product.id from bd_cantinaon.school inner join bd_cantinaon.user inner join bd_cantinaon.parents inner join bd_cantinaon.product on parents.idUser = user.id where product.id = :idUser;");
                $sql4->bindParam("idUser",$idUser);
                echo "ID: ".$last_id;
                $idUser = $last_id;
                $sql4->execute();
                echo "CHEGOU ATE AQUI 3";
                $idProduct = $sql4->fetch();
                $sql = $minhaConexao->prepare("insert into bd_cantinaon.drink (idProduct, provider) values (:idProduct, :provider);");
                $sql->bindParam("idProduct",$idProduto);
                $sql->bindParam("provider",$provider);
                $provider = $beb->getfornecedor();
                $idProduto = $idProduct['id'];
                $sql->execute();
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

    public function editarComida($cmd){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("update bd_cantinaon.product set name=:name,code=:code, price=:price, photo=:photo where product.id=:id;
            update bd_cantinaon.food set provider=:provider where food.idProduct =: id;");
            $sql->bindParam("id",$id);
            $sql->bindParam("name",$name);
            $sql->bindParam("code",$codigo);
            $sql->bindParam("price",$preco);
            $sql->bindParam("provider",$fornecedor);
            $sql->bindParam("photo",$arquivo);
            $id =  $cmd->getId();
            $name = $cmd->getnome();
            $codigo = $cmd->getcodigo();
            $preco = $cmd->getpreco();
            $fornecedor = $cmd->getfornecedor();
            $arquivo = $cmd->getfoto();
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



     public function AddSaldo($aln){
        try{
            echo "QTD = ".$_POST['qtd'];
            echo "ID = ".$aln->getId();
            echo "SALDO = ".$aln->getsaldo();
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("update bd_cantinaon.student set balance=:balance where id=:id;");
            $sql->bindParam("id",$id);
            $sql->bindParam("balance",$balance);
            $id = $aln->getId(); 
            $aln->setSaldo($aln->getsaldo() + $_POST['qtd']);
            $balance =
            $sql->execute();
            echo "QTD = ".$_POST['qtd'];
            echo "ID = ".$aln->getId();
            echo "BALANCE: ".$balance;
            return $balance;
        }
        catch(PDOException $e){
          return 0;
        }
    }
     


}

?>