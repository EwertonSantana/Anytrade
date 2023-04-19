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
            <h2>Cadastros de Produto</h2><br>

            <nav id="cad-opcoes">
                <form method="post" action="../processar.php" id="form-cad" enctype="multipart/form-data">

                    <label for="imagem" id="imagem">Imagem:</label>
                    <input type="file" name="imagem" />

                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required><br>

                    <label for="categoria">Categoria:</label>
                    <input type="text" id="categoria" name="categoria" required><br>

                    <label for="subcategoria">Subcategoria:</label>
                    <input type="text" id="subcategoria" name="subcategoria"><br>

                    <label for="tamanho">Tamanho:</label>
                    <input type="number" id="tamanho" name="tamanho" required><br>

                    <label for="cor">Cor:</label>
                    <input type="text" id="cor" name="cor" required><br>

                    <label for="preco">Preço:</label>
                    <input type="text" id="preco" name="preco" required><br>

                    <label for="descricao">Descrição:</label><br>
                    <textarea id="descricao" name="descricao"></textarea><br>

                    <div id="t">
                        <button value="cadprod" id="btn-acao" name="acao">Cadastrar</button>

                        <button id="btn-acao">Voltar</button>

                    </div>

                </form>
            </nav>
        </div>
    </div>
</body>

</html>