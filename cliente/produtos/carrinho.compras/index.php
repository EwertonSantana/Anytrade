<?php

  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: /php/Anytrade/cliente/login/index.php"); exit;
  }
  ?>
<?php
require 'conexao.php';

switch ($_REQUEST['acao']) {

    /* Cadastrar produto/estoque/grade*/
  case 'idpro':
    $idproduto = $_POST['id'];
}



$sql = "SELECT * FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd INNER JOIN grade ON estoque.idEstq = grade.idGrade INNER JOIN imagem ON estoque.idEstq = imagem.idImg";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Carrinho de Compras</title>
  <link rel="stylesheet" href="../carrinho.compras/css/style.css">
</head>

<body>
  <header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="/Anytrade/cliente/index.html" class="logo">ANYTRADE</a>

    <nav class="navbar">
      <a href="/anytrade/cliente/produtos/index.php">Produtos</a>
    </nav>


    <div class="icons">
      <a href="#" class="fas fa-heart"></a><!--favorito-->
      <a href="pedido1/index.html" class="fas fa-shopping-cart"></a> <!--carrinho-->
      <a href="login/index.html" class="fas fa-user"></a> <!--login-->
    </div>

  </header>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <h1>Carrinho de Compras</h1>
  <table>
    <thead>
      <tr>
        <th>Produto</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <?php

    $sql = "SELECT * FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd INNER JOIN grade ON estoque.idEstq = grade.idGrade INNER JOIN imagem ON estoque.idEstq = imagem.idImg WHERE produtos.idProd ='$idproduto'";/*Cria uma query SQL para buscar informações do produto com o id correspondente ao valor de $idProd */
    $sqlrun = mysqli_query($conexao, $sql);/*Executa a query SQL no banco de dados utilizando a conexão $conexao e atribui o resultado para a variável $sqlrun */



    if (mysqli_num_rows($sqlrun) > 0) {/* Condicional para verificar se a query retornou resultados */
      $prod = mysqli_fetch_array($sqlrun); /*Atribui o resultado da query para a variável $prod como um array */
    ?>

      <tbody>
        <tr>
          <td><?= $prod['nomeProd'] ?></td>
          <td>R$ <?= $prod['precoProd'] ?></td>
          <td>1</td>
          <td>R$ <?= $prod['precoProd'] ?> </td>
        </tr>
        <tr>
          <td>Total</td>
          <td></td>
          <td></td>
          <td>R$ <?= $prod['precoProd'] ?> </td>
        </tr>
      </tbody>

    <?php
    } else {
      echo "<h3>Produto não encontrado</h3>";
    }
    ?>
    <?php
    $parcelas1 = $prod['precoProd'] / 1;
    $parcelas2 = $prod['precoProd'] / 2;
    $parcelas3 = $prod['precoProd'] / 3;
    $parcelas4 = $prod['precoProd'] / 4;
    ?>
  </table>
  <h2>Forma de Pagamento</h2>
  <form action="pagamento.php" method="post">
    <label for="cartao">Cartão de Crédito:</label>
    <select name="cartao" id="cartao">
      <option value="visa">Visa</option>
      <option value="mastercard">Mastercard</option>
      <option value="amex">American Express</option>
      <option value="elo">Elo</option>
    </select>
    <br>
    <label for="parcelas">Número de Parcelas:</label>
    <select name="parcelas" id="parcelas">
      <option value="1">1x de R$ <?= $parcelas1 ?></option>
      <option value="2">2x de R$ <?= $parcelas2 ?></option>
      <option value="3">3x de R$ <?= $parcelas3 ?></option>
      <option value="4">4x de R$ <?= $parcelas4 ?></option>

    </select>
    <br>
    <label for="cvv">CVV:</label>
    <input type="password" name="cvv" id="cvv" maxlength="3" size="3">
    <br>
    <label for="nome">Nome no Cartão:</label>
    <input type="text" name="nome" id="nome">
    <br>
    <label for="validade">Data de Validade:</label>
    <input type="text" name="validade" id="validade" maxlength="7" size="7" placeholder="MM/AAAA">
    <br>
    <input type="submit" value="Confirmar Pagamento">
  </form>
</body>

</html>