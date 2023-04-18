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
    switch($_REQUEST['filtro']){
        case '':
            $sql = "SELECT produtos.idProd, produtos.nomeProd, produtos.catProd, produtos.subcatProd, quantidadeEstq, produtos.precoProd FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd";
            break;

        case 'produto':
            $nproduto = $_POST['bsqfiltro'];
            $sql = "SELECT produtos.idProd, produtos.nomeProd, produtos.catProd, produtos.subcatProd, quantidadeEstq, produtos.precoProd FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd WHERE produtos.nomeProd LIKE '$nproduto%'";
            break;

        case 'categoria':
            $categoria = $_POST['bsqfiltro'];
            $sql = "SELECT produtos.idProd, produtos.nomeProd, produtos.catProd, produtos.subcatProd, quantidadeEstq, produtos.precoProd FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd WHERE produtos.catProd LIKE '$categoria%'";
            break;

        case 'subcategoria':
            $subcategoria = $_POST['bsqfiltro'];
            $sql = "SELECT produtos.idProd, produtos.nomeProd, produtos.catProd, produtos.subcatProd, quantidadeEstq, produtos.precoProd FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd WHERE produtos.subcatProd LIKE '$subcategoria%'";
            break;

        case 'qntestoque':
            $estoque = $_POST['bsqfiltro'];
            switch($_REQUEST['condicao']){
                case 'maiorque':
                    $sql = "SELECT produtos.idProd, produtos.nomeProd, produtos.catProd, produtos.subcatProd, quantidadeEstq, produtos.precoProd FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd WHERE quantidadeEstq > '$estoque'";
                    break;

                case 'menorque':
                    $sql = "SELECT produtos.idProd, produtos.nomeProd, produtos.catProd, produtos.subcatProd, quantidadeEstq, produtos.precoProd FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd WHERE quantidadeEstq < '$estoque'";
                    break;

                case 'igual':
                    $sql = "SELECT produtos.idProd, produtos.nomeProd, produtos.catProd, produtos.subcatProd, quantidadeEstq, produtos.precoProd FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd WHERE quantidadeEstq = '$estoque'";
                    break;
            }
    }  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="actions.js"></script>
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
            <h2>Estoque</h2><br>
            <form action="estoque.php" method="post" id="filtro-form">
                <h4>Selecione os filtros para busca:</h4>
                <select name="filtro" onchange="exibir_ocultar(this)">
                    <option value=""></option>
                    <option value="produto" name="produto">Produto</option>
                    <option value="categoria" name="categoria">Categoria</option>
                    <option value="subcategoria" name="subcategoria">Subcategoria</option>
                    <option value="qntestoque" id="estq" name="qntestoque">Quantidade Estoque</option>
                </select>
                <select name="condicao" id="cond" hidden>
                        <option value="maiorque">Maior que</option>
                        <option value="menorque">Menor que</option>
                        <option value="igual">Igual a</option>
                </select>
                <input type="text" id="cat" name="bsqfiltro">
                <button name="acao" value="bsqestoque">Filtrar</button>
                <span><a href="./cadastro/cproduto.php" id="btn-acao" class="cad-button">Novo Produto</a></span>
            </form>

                <table id="table-panel">
                    <thead>
                        <tr id="table-header">
                            <th>Id</th>
                            <th>Produtos</th>
                            <th>Categoria</th>
                            <th>Subcategoria</th>
                            <th>Estoque</th>
                            <th>Preço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $sqlrun = mysqli_query($conexao, $sql);

                            if(mysqli_num_rows($sqlrun) > 0){
                                foreach($sqlrun as $produto){
                                    ?>
                                    <tr id="table-rows">
                                        <td><?= $produto['idProd']?></td>
                                        <td><?= $produto['nomeProd']?></td>
                                        <td><?= $produto['catProd']?></td>
                                        <td><?= $produto['subcatProd']?></td>
                                        <td><?= $produto['quantidadeEstq']?></td>
                                        <td><?= $produto['precoProd']?></td>
                                        <td  id="form">
                                            <a href="paginas/produto.php?id=<?=$produto['idProd']; ?>" id="btn-acao">Editar</a>
                                            <form action="processar.php" method="post">
                                                <input type="hidden" id="btn-acao" name="delete" value="<?= $produto['idProd']?>">
                                                <button type="submit" id="btn-acao" name="acao" value="dltprod">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else{
                                echo "<br><h5>Nenhum resultado encontrado!</h5>";
                            }
                        ?>
                    </tbody>
                </table>                
        </div>
    </div>
</body>
</html>