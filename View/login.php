<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Login</title>
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
        <form action="">
            <p class="text-center"><a href="index.php"><img src="img/logo_menu.png" alt="" style="height: 100%; width: 100%; max-width: 200px; max-height: 200px; margin-left: auto; margin-right: auto;"></a></p>
            <h2 style="text-align: center;">
                Escolha seu tipo de Login
            </h2>
            <button formaction='login_aluno.php'>Aluno</button>
            <button formaction='login_escola.php' >Escola</button>
            <button formaction='login_funcionario.php' type="submit">Funcionario</button>
            <button formaction='login_responsavel.php' type="submit">Responsavel</button>
        </form>
    </main>
</body>
</html>