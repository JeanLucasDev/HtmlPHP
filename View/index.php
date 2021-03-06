<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CantinaON</title>
</head>

<body>
    <header>
        <div class="menu_desktop">
            <a href="index.php">
                <img src="img/logo_menu.png" class="Logo" alt="Logotipo da nossa empresa">
            </a>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#about_us_section">Sobre nós</a></li>
                <li><a href="#client_section">Clientes</a></li>
                <li><a href="login.php">Login/Cadastro</a></li>
                <li><a href="#contact_section">Contato</a></li>
            </ul>
        </div>
        <div class="menu_mobile">
            <i class="fa fa-bars" id="open_menu"></i>
            <div class="mobile">
                <i class="fas fa-times" id="exit_menu"></i>
                <a href="index.php">
                    <img src="img/logo_menu.png" class="Logo" alt="Logotipo da nossa empresa">
                </a>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#about_us_section">Sobre nós</a></li>
                    <li><a href="#client_section">Clientes</a></li>
                    <li><a href="login.php">Login/Cadastro</a></li>
                    <li><a href="#contact_section">Contato</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <section class="banner_parallax">
            <div class="banner">
                <div class="banner_opacity">
                </div>
            </div>
        </section>
        <section id="about_us_section">
            <div class="about_us">
                <div class="title">
                    <h2>Sobre nós</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img style="margin:auto auto;" width="100%" src="img/cantinaon_logo.png" alt="">
                        </div>
                        <div class="col-md-6" style="padding-top:10vh;margin: 0 auto;color:#e1e1e1;">
                            Somos a CantinaON, empresa baiana voltada ao ramo da merenda escolar, nós cumprimos com a obrigação de entregar praticidade e agilidade aos pais e alunos. Em um ambiente totalmente digital e ao alcançe de apenas um clique do seu filho.
                            <ul>
                                <li>100% digital</li>
                                <li>Personalizavel</li>
                                <li>Interfaces simples</li>
                                <li>Menus separados para cada filho</li>
                            </ul>
                        </div>
                    </div>
                </div>
        </section>
        <section class="banner_parallax_2">
            <div class="banner_2">
                <div class="banner_opacity_2">
                </div>
            </div>
        </section>
        <section class="client_section" id="client_section">
            <div class="title">
                <h2>Nossos clientes</h2>
            </div>
            <div class="container" id="client_container_desktop">
                <div class="row">
                    <div class="col-md-3">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img width='100%' src="img/School (11).png" alt="Escola basica Rainha vitoria">
                                </div>
                                <div class="flip-card-back">
                                    <h5 class="text-center">Muito bom e eficiente</h5>
                                    <p class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i></p>
                                    <p class="text-center" style="text-align:justify;">Os país adoraram o sistemas eles
                                        podem contralar tudo que o filho consomem</p>
                                    <p><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href=""><i
                                                class="fab fa-facebook-square"></i> <a href=""><i class="fa fa-whatsapp"
                                                    aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img width='100%' src="img/School (3).png" alt="Escola basica Rainha vitoria">
                                </div>
                                <div class="flip-card-back">
                                    <h5 class="text-center">Muito bom e eficiente</h5>
                                    <p class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i></p>
                                    <p class="text-center">Os país adoraram o sistemas eles
                                        podem contralar tudo que o filho consomem</p>
                                    <p><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href=""><i
                                                class="fab fa-facebook-square"></i> <a href=""><i class="fa fa-whatsapp"
                                                    aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img width='100%' src="img/School (6).png" alt="Escola basica Rainha vitoria">
                                </div>
                                <div class="flip-card-back">
                                    <h5 class="text-center">Muito bom e eficiente</h5>
                                    <p class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i></p>
                                    <p class="text-center">Os país adoraram o sistemas eles
                                        podem contralar tudo que o filho consomem</p>
                                    <p><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href=""><i
                                                class="fab fa-facebook-square"></i> <a href=""><i class="fa fa-whatsapp"
                                                    aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img width='100%' src="img/School (5).png" alt="Escola basica Rainha vitoria">
                                </div>
                                <div class="flip-card-back">
                                    <h5 class="text-center">Muito bom e eficiente</h5>
                                    <p class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i></p>
                                    <p class="text-center">Os país adoraram o sistemas eles
                                        podem contralar tudo que o filho consomem</p>
                                    <p><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href=""><i
                                                class="fab fa-facebook-square"></i> <a href=""><i class="fa fa-whatsapp"
                                                    aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="client_container_mobile">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-mobile">
                            <img width='100%' src="img/School (11).png" alt="Escola basica Rainha vitoria">
                            <h5 class="text-center">Muito bom e eficiente</h5>
                            <p class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                            <p class="text-center" style="text-align:justify;">Os país adoraram o sistemas eles podem
                                contralar tudo que o filho consomem</p>
                            <p><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href=""><i
                                        class="fab fa-facebook-square"></i> <a href=""><i class="fa fa-whatsapp"
                                            aria-hidden="true"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-mobile">
                        <img width='100%' src="img/School (3).png" alt="Escola basica Rainha vitoria">
                        <h5 class="text-center">Muito bom e eficiente</h5>
                        <p class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </p>
                        <p class="text-center" style="text-align:justify;">Os país adoraram o sistemas eles
                            podem contralar tudo que o filho consomem</p>
                        <p><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href=""><i
                                    class="fab fa-facebook-square"></i> <a href=""><i class="fa fa-whatsapp"
                                        aria-hidden="true"></i></a></p>
                    </div>
            </div>
            <div class="col-md-3">
                <div class="card-mobile">
                    <img width='100%' src="img/School (6).png" alt="Escola basica Rainha vitoria">
                    <h5 class="text-center">Muito bom e eficiente</h5>
                    <p class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </p>
                    <p class="text-center" style="text-align:justify;">Os país adoraram o sistemas eles
                        podem contralar tudo que o filho consomem</p>
                    <p><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href=""><i
                                class="fab fa-facebook-square"></i> <a href=""><i class="fa fa-whatsapp"
                                    aria-hidden="true"></i></a></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-mobile">
                    <img width='100%' src="img/School (5).png" alt="Escola basica Rainha vitoria">
                    <h5 class="text-center">Muito bom e eficiente</h5>
                    <p class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </p>
                    <p class="text-center" style="text-align:justify;">Os país adoraram o sistemas eles
                        podem contralar tudo que o filho consomem</p>
                    <p><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a> <a href=""><i
                                class="fab fa-facebook-square"></i> <a href=""><i class="fa fa-whatsapp"
                                    aria-hidden="true"></i></a></p>
                </div>
            </div>
            </div>
        </section>
        <section class="banner_parallax_3">
            <div class="banner_3">
                <div class="banner_opacity_3">
                </div>
            </div>
        </section>
        <section class="contact_section" id="contact_section" style="padding-bottom: 10vh;">
            <div class="title">
                <h2>Contato</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Informações</h3>
                        <div class="contact_social">
                            <div class="item_contact">
                                <p><i class="fas fa-phone-alt"></i>71 3254 - 3274</p>
                                <p></p>
                            </div>
                            <div class="item_contact">
                                <p>
                                    <i class="fas fa-envelope"></i>teste@gmail.com
                                </p>
                            </div>
                            <div class="item_contact">
                                <p><i class="fas fa-map-marker-alt"></i>Rua teste, Bairro teste, Numero teste</p>
                            </div>
                            <div class="item_contact">
                                <p> <i class="fab fa-facebook-square"></i>CantinaON</p>
                            </div>
                            <div class="item_contact">
                                <p><i class="fa fa-instagram"></i>@CantiaON</p>
                            </div>
                            <div class="item_contact">
                                <p><i class="fa fa-whatsapp"></i>71 9 8251 - 5415</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Tire suas dúvidas</h3>
                        <form action="">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" id="name" name="name" placeholder="Digite seu nome" class="form-control"
                                required>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Digite seu e-mail" id="email"
                                name="email" required>
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="phone" class="form-control" placeholder="Digite seu telefone" id="phone"
                                name="phone" required>
                            <label for="mesage" class="form-label">Mensagem</label>
                            <textarea class="form-control" id="mesage" rows="3" placeholder="Digite sua mensagem"
                                required></textarea>
                            <button type="submit" class="btn btn-light">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="banner_parallax_4">
            <div class="banner_4">
                <div class="banner_opacity_4">
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
                        <a href=""><i class="fab fa-facebook-square"></i></a> <a href=""><i class="fa fa-instagram"
                                aria-hidden="true"></i></a> <a href=""><i class="fa fa-whatsapp"
                                aria-hidden="true"></i></a>
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
    <script src="js/script.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://use.fontawesome.com/1e0699073d.js"></script>

</body>

</html>