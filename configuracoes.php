<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: logincad.php");
    exit;
}
require 'conexao.php';
$sql = "SELECT * FROM usuario_sistema";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ANYTRADE - ADMINISTRADOR</title>
</head>

<body>
    <!--Cabeçalho-->
    <header id="cabecalho">
        <a href="#" id="logo">ANYTRADE</a>

        <input type="search" placeholder="Pesquisar" id="searchbar">
        <input type="image" src="./icons/usuario_resized.png" id="userbtn">
    </header>
    <div container>
        <!--Menu Lateral-->
        <section id="container-lateral">
            <a href="#" id="user-redirect"><?php echo $_SESSION['UsuarioNome']; ?></a><br>
            <nav id="menu-lateral">
                <a href="cadastros.php" class="btn-menu">Cadastros</a>
                <a href="estoque.php" class="btn-menu">Estoque</a>
                <a href="operacoes.php" class="btn-menu">Operações</a>
                <a href="relatorios.php" class="btn-menu">Relatórios</a>
                <a href="fiscais.php" class="btn-menu">Fiscais</a>
                <a href="configuracoes.php" class="btn-menu">Configurações</a>
            </nav>
            <a href="logout.php" id="user-redirect">Sair</a>

            <!--Container de Conteúdos-->
        </section>
        <div id="conteudo">
            <div id="div-conf">
                <table id="table-panel">
                    <thead>
                        <tr id="table-header">
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sqlrun = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($sqlrun) > 0) {
                            foreach ($sqlrun as $user) {
                        ?>
                                <tr id="table-rows">
                                    <td><?= $user['idUsuarioSys'] ?></td>
                                    <td><?= $user['nomeUsuarioSys'] ?></td>
                                    <td id="form">
                                        <a href="paginas/usuario.php?id=<?= $user['idUsuarioSys']; ?>" id="btn-acao">Editar</a>
                                        <form action="processar.php" method="post">
                                            <input type="hidden" id="btn-acao" name="delete" value="<?= $user['idUsuarioSys'] ?>">
                                            <button type="submit" id="btn-acao" name="acao" value="dltusu">Excluir</button>
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
    </div>
</body>

</html>