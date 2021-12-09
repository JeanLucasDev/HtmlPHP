<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar</title>
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
    <form action="editarComida" method="POST" class="form-validation" id="form-validation" enctype="multipart/form-data">
      <p class="text-center"><a href="tela_funcionario_principal.php"><img src="img/logo_menu.png" alt="" style="height: 100%; width: 100%; max-width: 200px; max-height: 200px; margin-left: auto; margin-right: auto;"></a></p>
        <h2 style="text-align: center;">
        Editar Comida
      </h2>
      <input type="hidden" name="id" value= <?php echo $idProduto;?>>
      <div class="input">
        <input id="name" name="name" type="text" data-rules="required"/>
        <label for="name">Nome</label>
      </div>
      <div class="input">
        <input  name="codigo" id="codigo"type="text" data-rules="required|min=5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
        <label for="codigo">Codigo</label>
      </div>
      <div class="input">
        <label for="preco">Preco</label>  
        <input  name="preco" id="preco"type="number" data-rules="required|"/>
      </div>
      <div class="input">
        <input id="ingredientes" name="ingredientes" type="text" data-rules="required"/>
        <label for="ingredientes">Ingredientes</label>
      </div>
      <div class="input">
        <input id="file" name="imagem" type="file" data-rules="required"/>
        <label for="file">Arquivo</label>
      </div>
      <button type="submit">Editar</button>
      <div class="social_icon" style="margin-top:1vh">
        <h6> Voltar a tela do funcionario?<a href="tela_funcionario_principal.php">Clique aqui</a></h6>
      </div> 
    </form>
  </main>
  <script src="js/script_forms.js"></script>
</body>
</html>