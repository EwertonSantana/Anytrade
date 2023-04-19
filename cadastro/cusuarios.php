<?php

  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: logincad.php"); exit;
  }
  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ANYTRADE - ADMINISTRADOR</title>
</head>
<body>
    <!--Cabeçalho-->
    <header id="cabecalho">
        <a href="#" id="logo">ANYTRADE</a>

        <input type="search" placeholder="Pesquisar" id="searchbar">
        <input type="image" src="../icons/usuario_resized.png" id="userbtn">
    </header>
    <div container>
        <!--Menu Lateral-->
        <section id="container-lateral">
            <a href="#" id="user-redirect"><?php echo $_SESSION['UsuarioNome']; ?></a><br>
            <nav id="menu-lateral">
                <a href="../cadastros.php" class="btn-menu">Cadastros</a>
                <a href="../estoque.php" class="btn-menu">Estoque</a>
                <a href="../operacoes.php" class="btn-menu">Operações</a>
                <a href="../relatorios.php" class="btn-menu">Relatórios</a>
                <a href="../fiscais.php" class="btn-menu">Fiscais</a>
                <a href="../configuracoes.php" class="btn-menu">Configurações</a>
            </nav>
            <a href="../logout.php" id="user-redirect">Sair</a>
            
          <!--Container de Conteúdos-->
        </section>
        <div id="conteudo">
            <h2>Cadastros de Usuarios</h2><br>
            
                <nav id="cad-opcoes">
                    <form method="post" action="../processar.php" id="form-cad">
                        
                    
                        <label for="nomeusu">Usuario:</label>
                        <input type="text" id="nomeusu" name="nomeusu"required><br>

                        <label for="cpfusu">CPF:</label>
                        <input type="number" id="cpfusu" name="cpfusu" maxlength="11" required><br>

                        <label for="sexousu">Sexo:</label>
                            <span class="radio-group">
                            <label for="feminino">Feminino</label>
                            <input type="radio" id="feminino" name="sexousu" value="F">
                            
                            <label for="masculino">Masculino</label>
                            <input type="radio" id="masculino" name="sexousu" value="M">
                            
                            <label for="naoidentificado">Não quero me identificar</label>
                            <input type="radio" id="naoidentificado" name="sexousu" value="N">
                            </span>

                        <label for="emailusu">E-mail:</label>
                        <input type="email" id="emailusu" name="emailusu"required><br>

                        <label for="senhausu">Senha:</label>
                        <input type="password" id="senhausu" name="senhausu"required><br>

                        <div>

                        <button value="cadusu" id="btn-acao" name="acao">Cadastrar</button>
                        <button id="btn-acao" onclick="windows.history.go(1)">Voltar</button>
                                
                    </form>
                </nav>
        </div>
    </div>
</body>
</html>
