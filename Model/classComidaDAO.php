<?php
require_once "Conexao.php";
class classComidaDAO{


    public function incluirComida($cmd){
        echo "Testando".$_SESSION['id'];
        try{    
            echo "CHEGOU ATE AQUI -3";
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_cantinaon.food inner join bd_cantinaon.product on food.idProduct = product.id inner join bd_cantinaon.employee on product.idSchool = employee.idSchool where employee.id = :id and product.code = :code;");
            $sql->bindParam("id",$id);
            $sql->bindParam("code",$code);
            $id = $_SESSION['id'];
            $code = $cmd->getcodigo();
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
                $name = $cmd->getnome();
                $code = $cmd->getcodigo();
                $price = $cmd->getpreco();
                $blocked = true;
                $idSchool = $idEscola['idSchool'];
                $sql3->execute();
                $last_id = $minhaConexao->lastInsertId();
                echo "LAST ID: ".$last_id;
                $imagem = $cmd->getfoto();  
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

                echo "Last id: ".$last_id;
                echo "CHEGOU ATE AQUI 2";
                $sql4 = $minhaConexao->prepare("select * from bd_cantinaon.school inner join bd_cantinaon.employee on employee.idSchool = school.id inner join bd_cantinaon.product on product.idSchool = school.id where product.id = :idUser;");
                $sql4->bindParam("idUser",$idUser);
                echo "ID: ".$last_id;
                $idUser = $last_id;
                $sql4->execute();
                echo "CHEGOU ATE AQUI 3";
                $idProduct = $sql4->fetch();
                echo "CHEGOU ATE AQUI 4";
                $sql = $minhaConexao->prepare("insert into bd_cantinaon.food (idProduct, ingredients) values (:idProduct, :ingredients);");
                $sql->bindParam("idProduct",$idProduto);
                $sql->bindParam("ingredients",$ingredients);
                $ingredients = $cmd->getingredientes();
                $idProduto = $idProduct['id'];
                $sql->execute();
                echo "ID DO PRODUTO: ".$idProduto;
                return $id;
            }
         }
         catch(PDOException $e){
             echo "entrou no catch".$e->getmessage();
             return 0;
         }
     }
   

    public function editarComida($cmd){
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("update bd_cantinaon.product set name=:name,code=:code, price=:price where product.id=:id;
            update bd_cantinaon.food set ingredients=:ingredients where food.idProduct =: id;");
            $sql->bindParam("id",$id);
            $sql->bindParam("name",$name);
            $sql->bindParam("code",$codigo);
            $sql->bindParam("price",$preco);
            $sql->bindParam("ingredients",$ingredientes);
            $id =  $cmd->getId();
            $name = $cmd->getnome();
            $codigo = $cmd->getcodigo();
            $preco = $cmd->getpreco();
            $ingredientes = $cmd->getingredientes();
            $sql->execute(); 
            $sql = $minhaConexao->prepare("select product.id from bd_cantinaon.food inner join bd_cantinaon.product on food.idProduct = product.id where food.idProduct = :id");
            $sql->bindParam("id",$id);
            $id = $cmd->getId();
            $sql->execute();
            $idProduct = $sql->fetch();
            $imagem = $cmd->getfoto(); 
            $last_id = $idProduct['id'];
            echo "ID: ".$last_id;
            echo "ID FOOD: ".$cmd->getId();
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
         }
         catch(PDOException $e){
             //echo "entrou no catch".$e->getmessage();
         }
     }

}

?>