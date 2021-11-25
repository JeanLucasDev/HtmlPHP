<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login responsavel</title>
  	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!--CSS-->
  <link rel="stylesheet" href="css/style_forms.css">
  <!-- Fonts google-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
  <script src="js/script_forms.js" defer></script>
</head>
<body>
  <main>
    <form name="login_Usuario" method="post" class="form-validation" action="loginUsuario">
      <p class="text-center"><a href="index.php"><img src="img/logo_menu.png" alt="" style="height: 100%; width: 100%; max-width: 200px; max-height: 200px; margin-left: auto; margin-right: auto;"></a></p>
      <h2 style="text-align: center;">
        Login responsavel
      </h2>
      <input id="type" name="type" type="hidden"  value="R" required/>
      <div class="input">
        <input id="name" name="name" type="text" data-rules="required" required/>
        <label for="name">Login</label>
      </div>
      <div class="input">
        <input  type="password" id="senha" name="password" data-rules="required|min=5"/>
        <label for="senha">Senha</label>
      </div>
      <button type="submit">Entrar</button>
      <div class="social-icons">
        <div class="social_icon">
          <h6> Voltar ao menu login?<a href="login.php">Clique aqui</a></h6>
        </div>
      </div>
    </form>
  </main>
  <script src="js/script_forms.js"></script>
</body>
</html>