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
    require 'conexao.php';
    $sql = "SELECT * FROM nfe";
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
            <a href="#" id="user-redirect">Usuário</a><br>
            <nav id="menu-lateral">
                <a href="cadastros.php" class="btn-menu">Cadastros</a>
                <a href="estoque.php" class="btn-menu">Estoque</a>
                <a href="operacoes.php" class="btn-menu">Operações</a>
                <a href="relatorios.php" class="btn-menu">Relatórios</a>
                <a href="fiscais.php" class="btn-menu">Fiscais</a>
                <a href="configuracoes.php" class="btn-menu">Configurações</a>
            </nav>

            <!--Container de Conteúdos-->
        </section>
        <div id="conteudo">
            <h2>Notas Fiscais Eletrônicas</h2>
            <div id="nfe-container">
                <table id="table-panel">
                    <thead>
                        <tr id="table-header">
                            <th>NF</th>
                            <th>Chave</th>
                            <th>Emitente</th>
                            <th>Destinatário</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody id="doc-fiscal">
                        <?php

                        $sqlrun = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($sqlrun) > 0) {
                            foreach ($sqlrun as $fiscal) {
                        ?>
                                <tr id="table-rows">
                                    <td><?= $fiscal['nmrNFe']?></td>
                                    <td><?= $fiscal['chaveNFe']?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
            <div id="botoes-acao">
                <button>Novo</button>
                <button>Editar</button>
                <button>Cancelar</button>
                <button>Excluir</button>
                <button>Emitir</button>
            </div>
        </div>
    </div>
</body>

</html>