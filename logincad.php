<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/1style.css">
</head>
<body>
  <div class="container">
    <div class="buttonsForm">
      <div class="btnColor"></div>
      <button id="btnSignin">Entrar</button>
    </div>


    <!--    -->
    <form action="validar.php" method="post" id="signin">
      <input type="text" placeholder="Email" name="email" required />
      <i class="fas fa-envelope iEmail"></i>
      <input type="password" placeholder="Senha" name="senha" required />
      <i class="fas fa-lock iPassword"></i>
      <div class="divCheck">
        <input type="checkbox" />
        <span>Lembrar senha</span>
      </div>
      <button type="submit" value="logon" name="acao"><b>Entrar</b></button>
    </form>

  </div>

  <script src="js/app.js"></script>
</body>
</html>