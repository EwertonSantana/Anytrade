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
            <a href="#" class="fas fa-heart"></a><!--favorito-->
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
                    <div class="box"> <!-- Inicia um bloco HTML para exibir informações do produto -->
                        <div class="icons"> <!-- Ícones para compartilhar, adicionar aos favoritos e visualizar o produto -->
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-share"></a>
                            <a href="#" class="fas fa-eye"></a>
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
                            <a href="#" class="btn">Adicionar ao Carrinho</a> <!-- Botão para adicionar o produto ao carrinho de compras -->
                        </div>


                <?php
                }
            } else {
                echo "<br><h5>Nenhum resultado encontrado!</h5>";
            }
                ?>


                <!--            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <a href="../produtos/produtos.php"><img src="../images/verde ok/720X320/3.1_resized-removebg-preview (1)_resized.png " alt=""> </a>
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/azul escuro ok/702X320/6.1_cropped-removebg-preview (1) (1)_resized.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/verde com laranja ok/720X320/f-img-4.1.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/verde claro ok/720X320/4.1_cropped__2_-removebg-preview (1)_resized.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/nike preto/f-img-1.2.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/cinza claro ok/720X320/1.1.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>
    


            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/preto nike ok/720X320/5.1_cropped-removebg-preview(1)_resized.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>


            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/adidas azul ok/720X320/8.6_cropped-removebg-preview (1)_resized.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>



            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/nike preto e amarelo/f-img-3.2.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>



            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/adidas preto ok/720X320/7.1_cropped-removebg-preview (1)_resized.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <input type="hidden" value="">
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>



            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/new balance marrom/700X300/Meu projeto.png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>



            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="../images/new balace cinza azul/Meu projeto (1).png" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>



            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="" alt="">
                <div class="content">
                    <h3>nike shoes</h3>
                    <div class="price">R$120.99 <span>R$150.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">Adicionar ao Carrinho</a>
                </div>
            </div>
        </div>
                        -->
    </section>










</body>

</html>