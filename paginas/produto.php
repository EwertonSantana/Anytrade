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
<?Php
require '../conexao.php';
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
            <h2>Produto</h2><br>

            <nav id="cad-opcoes">
                <?php
                if (isset($_GET['id'])) {
                    $idProd = mysqli_real_escape_string($conexao, $_GET['id']);
                    $sql = "SELECT produtos.idProd, produtos.nomeProd, produtos.catProd, produtos.subcatProd, grade.tamanho, grade.cor, quantidadeEstq, localEstq, produtos.precoProd, produtos.descricaoProd, imagem.path FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd INNER JOIN grade ON estoque.idEstq = grade.idGrade INNER JOIN imagem ON estoque.idEstq = imagem.idImg WHERE produtos.idProd ='$idProd'";
                    $sqlrun = mysqli_query($conexao, $sql);

                    if (mysqli_num_rows($sqlrun) > 0) {
                        $prod = mysqli_fetch_array($sqlrun);
                ?>
                        <form method="post" action="../processar.php" id="form-cad">

                            <input type="hidden" id="id" name="id" value="<?= $prod['idProd'] ?>">

                            <label for="imagem" id="imagem">Imagem:</label>
                            <input type="file" name="imagem"/>

                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" value="<?= $prod['nomeProd'] ?>" required><br>

                            <label for="categoria">Categoria:</label>
                            <input type="text" id="categoria" name="categoria" value="<?= $prod['catProd'] ?>" required><br>

                            <label for="subcategoria">Subcategoria:</label>
                            <input type="text" id="subcategoria" name="subcategoria" value="<?= $prod['subcatProd'] ?>"><br>

                            <label for="tamanho">Tamanho:</label>
                            <input type="number" id="tamanho" name="tamanho" value="<?= $prod['tamanho'] ?>" required><br>

                            <label for="cor">Cor:</label>
                            <input type="text" id="cor" name="cor" value="<?= $prod['cor'] ?>" required><br>

                            <label for="qntestq">Estoque:</label>
                            <input type="text" id="estq" name="qntestq" value="<?= $prod['quantidadeEstq'] ?>" required><br>

                            <label for="lclestq">Local de estoque:</label>
                            <input type="text" id="lclestq" name="lclestq" value="<?= $prod['localEstq'] ?>"><br>

                            <label for="preco">Preço:</label>
                            <input type="text" id="preco" name="preco" value="<?= $prod['precoProd'] ?>" required><br>

                            <label for="descricao">Descrição:</label><br>
                            <input type="text" id="descricao" name="descricao" value="<?= $prod['descricaoProd'] ?>"><br>
                            
                            <div id="t">
                                <button value="atlprod" id="btn-acao" name="acao">Atualizar Produto</button>

                                <a id="btn-acao" onclick="window.history.back()">Voltar</a>

                            </div>

                        </form>

                <?php
                    } else {
                        echo "<h3>Produto não encontrado</h3>";
                    }
                }
                ?>
            </nav>
        </div>
    </div>
</body>

</html>