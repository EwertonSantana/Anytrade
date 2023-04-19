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

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
    if (isset($_GET['id'])) { /*Condicional para verificar se foi recebido um parâmetro 'id' na URL via GET */
        $idProd = mysqli_real_escape_string($conexao, $_GET['id']);/* Escapa os caracteres especiais e atribui o valor do parâmetro 'id' para a variável $idProd*/
        $sql = "SELECT * FROM estoque INNER JOIN produtos ON estoque.idEstq = produtos.idProd INNER JOIN grade ON estoque.idEstq = grade.idGrade INNER JOIN imagem ON estoque.idEstq = imagem.idImg WHERE produtos.idProd ='$idProd'";/*Cria uma query SQL para buscar informações do produto com o id correspondente ao valor de $idProd */
        $sqlrun = mysqli_query($conexao, $sql);/*Executa a query SQL no banco de dados utilizando a conexão $conexao e atribui o resultado para a variável $sqlrun */


        if (mysqli_num_rows($sqlrun) > 0) {/* Condicional para verificar se a query retornou resultados */
            $prod = mysqli_fetch_array($sqlrun); /*Atribui o resultado da query para a variável $prod como um array */
    ?>
            <form action="./carrinho.compras/index.php" method="post">
            <section class="featured" id="featured">
                <div class="row">
                    <div class="image-container">

                        <div class="big-image">
                            <img src="../images/<?= $prod['path'] ?>" class="big-image-1" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <h3><?= $prod['nomeProd'] ?></h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>Tamanho: <?= $prod['tamanho'] ?></p>
                        <p>Cor: <?= $prod['cor'] ?></p>
                        <div>
                <p>Descrição:</p>
                <p><?= $prod['descricaoProd']?> Este tênis Adidas é predominantemente preto, com detalhes em vermelho na lateral. Ele apresenta um design moderno e esportivo, além de ser confortável e durável, ideal para atividades físicas ou para uso casual.</p>
                </div>
               

                        <div class="price">R$<?= $prod['precoProd'] ?> <span>R$120.99</span></div>
                        <input type="hidden" name="id" value="<?= $prod['idProd'] ?>">
                        <button class="btn" name="acao" value="idpro">Adicionar ao Carrinho</button> <!-- Botão para adicionar o produto ao carrinho de compras -->
                    </div>
                </div>
                
            </section>
            </form>
    <?php
        } else {
            echo "<h3>Produto não encontrado</h3>";
        }
    }
    ?>

    <script src="js/script.js"></script>

</body>

</html>