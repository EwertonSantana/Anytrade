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
<?php
require '../conexao.php';
switch ($_REQUEST['filtro']) {
    case '':
        $sql = "SELECT * FROM transportadora";
        break;

    case 'nome':
        $nome = $_POST['bsqfiltro'];
        $sql = "SELECT * FROM transportadora WHERE razaoTransp LIKE '$nome%'";
        break;

    case 'cnpj':
        $cnpj = $_POST['bsqfiltro'];
        $sql = "SELECT * FROM transportadora WHERE cnpjTransp LIKE '$cnpj%'";
        break;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="actions.js"></script>
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
            <a href="#" id="user-redirect">Usuário</a><br>
            <nav id="menu-lateral">
                <a href="../cadastros.php" class="btn-menu">Cadastros</a>
                <a href="../estoque.php" class="btn-menu">Estoque</a>
                <a href="../operacoes.php" class="btn-menu">Operações</a>
                <a href="../relatorios.php" class="btn-menu">Relatórios</a>
                <a href="../fiscais.php" class="btn-menu">Fiscais</a>
                <a href="../configuracoes.php" class="btn-menu">Configurações</a>
            </nav>

            <!--Container de Conteúdos-->
        </section>
        <div id="conteudo">
            <h2>Fornecedores</h2><br>
            <form action="../tabelas/ttransportadora.php" method="post" id="filtro-form">
                <h4>Selecione os filtros para busca:</h4>
                <select name="filtro" onchange="exibir_ocultar(this)">
                    <option value=""></option>
                    <option value="nome" name="nome">Nome</option>
                    <option value="cnpj" name="cnpj">CNPJ</option>
                </select>

                <input type="text" id="cat" name="bsqfiltro">
                <button name="acao" value="bsqestoque">Filtrar</button>
                <span><a href="../cadastro/ctransportadora.php" id="btn-acao" class="cad-button">Nova Transportadora</a></span>
            </form>

            <table id="table-panel">
                <thead>
                    <tr id="table-header">
                        <th>Id</th>
                        <th>Nome</th>
                        <th>N. Fantasia</th>
                        <th>CNPJ</th>
                        <th>I. Estadual</th>
                        <th>E-mail</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sqlrun = mysqli_query($conexao, $sql);

                    if (mysqli_num_rows($sqlrun) > 0) {
                        foreach ($sqlrun as $trans) {
                    ?>
                            <tr id="table-rows">
                                <td><?= $trans['idTransp'] ?></td>
                                <td><?= $trans['razaoTransp'] ?></td>
                                <td><?= $trans['nfantasiaTransp'] ?></td>
                                <td><?= $trans['cnpjTransp'] ?></td>
                                <td><?= $trans['iestadualTransp'] ?></td>
                                <td><?= $trans['emailTransp'] ?></td>
                                <td id="form">
                                    <a href="../paginas/transportadora.php?id=<?= $trans['idTransp']; ?>" id="btn-acao">Editar</a>
                                    <form action="../processar.php" method="post">
                                        <input type="hidden" id="btn-acao" name="delete" value="<?= $trans['idTransp'] ?>">
                                        <button type="submit" id="btn-acao" name="acao" value="dlttrans">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<br><h5>Nenhum resultado encontrado!</h5>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>