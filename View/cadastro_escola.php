<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!--CSS-->
  <link rel="stylesheet" href="css/style_forms.css">
  <!-- Fonts google-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
</head>

<body>
  <main>
    <form name= "cadastro_Escola" class="form-validation" method="post" action="incluirEscola">
      <p class="text-center"><a href="index.php"><img src="img/logo_menu.png" alt="" style="height: 100%; width: 100%; max-width: 200px; max-height: 200px; margin-left: auto; margin-right: auto;"></a></p>
        <h2 style="text-align: center;">
        Cadastro escola
      </h2>
      <div class="input">
        <input id="name" name="name" type="text" data-rules="required" required/>
        <label for="name">Nome</label>
        <span class="error"></span>
      </div>
      <div class="input">
        <input id="email" name="email" type="text" data-rules="required|email" required/>
        <label for="email">Email</label>
      </div>
      <div class="input">
        <input  type="password" name="password" id="senha"data-rules="required|min=5" required/>
        <label for="senha">Senha</label>
      </div>
      <div class="input">
        <input type="text" id="location" name="location"data-rules="required|min=15" required/>
        <label for="localizacao">Localização</label>
      </div>
      
      <div class="input">
        <input type="phone" id="phone"name="phone"data-rules="required|phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
        <label for="phone">Telefone</label>
      </div>
      <h6 style="text-align:end">Ja tem conta?<a href="login_escola.php">Clique aqui</a></h6>
      <button type="submit">Cadastrar</button>
      <div class="social_icon" style="margin-top:1vh">
        <h6> Voltar a tela principal?<a href="index.php">Clique aqui</a></h6>
      </div> 
    </form>
  </main>
  <script src="js/script_forms.js"></script>
</body>
</html>