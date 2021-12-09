<?php
if($_SESSION['logged'] == false || $_SESSION['type'] != 'A'){
    header('Location: Restrict');
}
else{
    if (isset($_GET['logout']) && $_GET['logout'] == 1){
        $_SESSION = array();
        $_SESSIONG['logged'] = false;
        session_destroy();
        header('Location: index.php');
    }
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style_sistemas.css">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
  </head>
  <body style="background: #101010;">
     <header>
        <div class="menu_desktop">
            <a href="aluno">
                <img src="img/logo_menu.png" class="Logo" alt="Logotipo da nossa empresa">
            </a>
            <ul>
                <li><a href="aluno">Inicio</a></li>
                <li><a href="aluno">Informações</a></li>
                <li><a href="listarLoja">Loja</a></li>
                <li><a href="tela_aluno_historico.php">Historicos</a></li>
                <li><a href="carrinho"><i class="fas fa-shopping-cart"></i></a></li>
                <li><a href="logout" >Sair</a>
            </ul>
        </div>
        <div class="menu_mobile">
            <i class="fa fa-bars" id="open_menu"></i>
            <div class="mobile">
                <i class="fas fa-times" id="exit_menu"></i>
                <a href="aluno">
                    <img src="img/logo_menu.png" class="Logo" alt="Logotipo da nossa empresa">
                </a>
                <ul>
                    <li><a href="aluno">Inicio</a></li>
                    <li><a href="aluno">Informações</a></li>
                    <li><a href="listarLoja">Loja</a></li>
                    <li><a href="tela_aluno_historico.php">Historicos</a></li>
                    <li><a href="carrinho"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="logout" >Sair</a>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <section class="func_produtos_section">
            <div class="title">
                <h2>Carrinho</h2>
            </div>
                <?php if(isset($itensCarrinho)) { ?>
                <? } else { ?>
                <div class ="container">
                        <div class="row" style="padding:5vh 2vh;">
                            <?php foreach($itensCarrinho as $item): ?>
                                    <div class="col-md-3"   >
                                        <div class="media">
                                                <div class="card">
                                                    <img src="../<?php echo $item->getProduto()->getfoto(); ?>" height="200px" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $item->getProduto()->getnome()?></h5>
                                                        <h6 class="card-subtitle mb-2 text-muted ">R$ <?php echo $item->getProduto()->getpreco()?></h6>
                                                        <h6>Subtotal: <?php echo number_format($item->getSubTotal(),2,',','.'); ?> R$</h6>
                                                    </div> 
                                                    <form action="CarrinhoAltQuant" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $item->getProduto()->getid(); ?>">
                                                        <p>Quantidade: <input type="text" name="quantidade" value="<?php echo $item->getQuantidade(); ?>" style="margin-bottom:4px;" > </p>
                                                        <button type="submit" class="btn btn-warning" style="margin:4px">Alterar quantidade</button>
                                                    </form>
                                                    <form method="post" action="ApagaItemCarrinho" >
                                                        <input type="hidden" name="saldo" value="<?php echo $_SESSION['balance']; ?>">
                                                        <input type="hidden" name="id" value="<?php echo $item->getProduto()->getid(); ?>">
                                                        <button type="submit" class="btn btn-danger" style="margin:4px">Remover produto</button>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if($carrinho->getTotal() != 0) { ?>
                        <div style="margin-left:70vh"> 
                            <form name="form_action" method="post" action="" >
                                <input type="hidden" id="saldo" name="saldo" value="<?php echo floatval(number_format($_SESSION['balance'],10,'.',',')); ?>">
                                <input type="hidden" id="qtd" name="qtd" value="<?php echo floatval(number_format($carrinho->getTotal(),10,'.',',')); ?> ">
                                <h4> Total: <?php echo number_format($carrinho->getTotal(),2,',','.'); ?> </h4>
                                <button type="submit" class="btn btn-success" style="margin:4px" onclick="funcao1()"> Confirmar compra</button>
                            </form>
                            <script>
                                function funcao1(){
                                    var saldo = document.getElementById('saldo').value;
                                    var valor = document.getElementById('qtd').value;
                                    if(parseInt(valor) <= parseInt(saldo)){
                                        alert("Compra realizada");
                                        document.form_action.action = "removeSaldo";
                                    }
                                    else{  
                                        alert("Saldo insuficiente");
                                    }
                                }
                            </script>
                        </div>
                        <?php } ?>
                <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container" style="padding:5vh 2vh;">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-center">Sobre nós</h4>
                    <p> Somos a CantinaON, empresa baiana voltada ao ramo da merenda escolar, nós cumprimos com a obrigação de entregar praticidade e agilidade aos pais e alunos. Em um ambiente totalmente digital e ao alcançe de apenas um clique do seu filho. </p>
                    <div class="social_midia">
                        <a href=""><i class="fab fa-facebook-square"></i></a> 
                        <a href=""><i class="fab fa-instagram"></i></a> 
                        <a href=""><i class="fab fa-whatsapp"   ></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 class="text-center">Quick links</h4>
                    <div class="quick_links">
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="#about_us_section">Sobre nós</a></li>
                            <li><a href="#client_section">Clientes</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="#contact_section">Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 class="text-center">Contato</h4>
                    <div class="locale">
                        <div class="item_locale">
                            <i class="fas fa-phone-alt"></i>
                            <p>71 3254 - 3274</p>
                        </div>
                        <div class="item_locale">
                            <i class="fas fa-envelope"></i>
                            <p>teste@gmail.com</p>
                        </div>
                        <div class="item_locale">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Rua teste, Bairro teste, Numero teste</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/script.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>