<?php
require '../login/conexao.php';


$sql = "SELECT * FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd INNER JOIN grade ON estoque.idEstq = grade.idGrade INNER JOIN imagem ON estoque.idEstq = imagem.idImg";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../produtos/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>

<body>

    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo">ANYTRADE</a>

        <nav class="navbar">
            <a href="../index.html">Home</a>
            <a href="../produtos/index.html">Produtos</a>
        </nav>


        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a> <!--carrinho-->
            <a href="../login/index.html" class="fas fa-user"></a> <!--login-->
        </div>

    </header>


    <section class="products" id="products">

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="box-container">


            <?php
            $sqlrun = mysqli_query($conexao, $sql); // Executa uma consulta SQL no banco de dados e armazena o resultado na variável $sqlrun
            if (mysqli_num_rows($sqlrun) > 0) { // Verifica se a consulta retornou algum resultado
                foreach ($sqlrun as $produto) { // Percorre cada registro retornado pela consulta e armazena na variável $produto
            ?>
                    <form action="./carrinho.compras/index.php" method="post">
                    <div class="box"> <!-- Inicia um bloco HTML para exibir informações do produto -->
                        <div class="icons"> <!-- Ícones para compartilhar, adicionar aos favoritos e visualizar o produto -->
                            
                        </div>
                        <a href="../produtos/produtos.php?id=<?= $produto['idProd'] ?>"><img src="../images/<?= $produto['path'] ?>" alt=""> </a> <!-- Exibe a imagem do produto -->
                        <div class="content"> <!-- Bloco para exibir informações adicionais do produto -->
                            <input type="hidden" value="<?= $produto['idProd'] ?>"> <!-- Armazena o ID do produto em um campo oculto do formulário -->
                            <h3><?= $produto['nomeProd'] ?></h3> <!-- Exibe o nome do produto -->
                            <div class="price">R$<?= $produto['precoProd'] ?> <span>R$150.99</span></div> <!-- Exibe o preço do produto -->
                            <div class="stars"> <!-- Exibe as estrelas de avaliação do produto -->
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <input type="hidden" name="id" value="<?= $produto['idProd'] ?>">
                            <button class="btn" name="acao" value="idpro">Adicionar ao Carrinho</button> <!-- Botão para adicionar o produto ao carrinho de compras -->
                        </div>
                        </form>


                <?php
                }
            } else {
                echo "<br><h5>Nenhum resultado encontrado!</h5>";
            }
                ?>

    </section>










</body>

</html>