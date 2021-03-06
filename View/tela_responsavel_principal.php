<?php
if($_SESSION['logged'] == false || $_SESSION['type'] != 'R'){
    header('Location: Restrict');
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Principal</title>
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
            <a href="responsavel">
                <img src="img/logo_menu.png" class="Logo" alt="Logotipo da nossa empresa">
            </a>
            <ul>
                <li><a href="responsavel">Inicio</a></li>
                <li><a href="responsavel">Informações</a></li>
                <li><a href="listarAlunos">Filhos</a></li>
                <li><a href="logout" >Sair</a>
            </ul>
        </div>
        <div class="menu_mobile">
            <i class="fa fa-bars" id="open_menu"></i>
            <div class="mobile">
                <i class="fas fa-times" id="exit_menu"></i>
                <a href="tela_responsavel_principal.php">
                    <img src="img/logo_menu.png" class="Logo" alt="Logotipo da nossa empresa">
                </a>
                <ul>
                    <li><a href="responsavel">Inicio</a></li>
                    <li><a href="responsavel">Informações</a></li>
                    <li><a href="listarAlunos">Filhos</a></li>
                    <li><a href="logout" >Sair</a>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <section class="informações_section">
            <div class="title">
                <h2>Informações pessoais</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/Responsavel.png" width="100%" height=""alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="text_informacao">
                            <p>Nome: <?php echo $_SESSION['login'] ?></p>
                            <p>Email: <?php echo $_SESSION['email'] ?></p>
                            <p>CPF: <?php echo $_SESSION['cpf'] ?> </p>
                            <p>Telefone: <?php echo $_SESSION['phone'] ?></p>
                            <h4 class="text-center" style="margin-top:2vh;">Escola filiada</h4>
                            <p>Email: <?php echo $_SESSION['sch_email'] ?> </p> 
                            <p>Telefone: <?php echo $_SESSION['sch_phone'] ?> </p>
                            <p>Localização: <?php echo $_SESSION['sch_location'] ?> </p>                    
                        </div>
                    </div>                     
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container" style="padding:5vh 2vh;">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-center">Sobre nós</h4>
                    <p> Somos a CantinaON, empresa baiana voltada ao ramo da merenda escolar, nós cumprimos com a obrigação de entregar praticidade e agilidade aos pais e alunos. Em um ambiente totalmente digital e ao alcançe de apenas um clique do seu filho.</p>
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