<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANYTRADE</title> 

    <!--- font cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!--fim font cdn-->

    <link rel="stylesheet" href="css/style.css">

    
    

</head>
<body>

    <header>

        <div id="menu-bar" class="fas fa-bars"></div>
    
        <a href="#" class="logo">ANYTRADE</a>
    
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="produtos/index.php">Produtos</a>
            <a href="#featured">Destaque</a>
            <a href="#review">Review</a>
            <a href="#footer">Contato</a>
        </nav>
    
        
        <div class="icons">
            <a href="pedido1/pedido.php" class="fas fa-heart"></a><!--favorito-->
            <a href="pedido1/index.html" class="fas fa-shopping-cart"></a> <!--carrinho-->
            <a href="login/index.html" class="fas fa-user"></a> <!--login-->
        </div>
    
    </header>
    
    <!-- termina a seção de cabeçalho-->
    
    <!-- início da seção home  -->
    
    <section class="home" id="home">
    
        <div class="slide-container active"> <!-- container de slide com classe ativa -->
            <div class="slide"> <!-- div para cada slide -->
                <div class="content"> <!-- div para o conteúdo do slide -->
                    <span>nike red shoes</span> <!-- span para o nome do produto -->
                    <h3>nike metcon shoes</h3> <!-- cabeçalho para o nome do produto -->
                    <p>Este tênis esportivo apresenta um design moderno e dinâmico com uma combinação de preto e vermelho vibrante. <!-- parágrafo para a descrição do produto -->
                        <p> O modelo é construído com um tecido respirável e flexível, que proporciona conforto e flexibilidade durante os exercícios.</p> <!-- parágrafo continuando a descrição do produto -->
                    </p>
                    <a href="#" class="btn">ADICIONAR AO CARRINHO</a> <!-- botão para adicionar o produto ao carrinho -->
                </div>
                <div class="image"> <!-- div para a imagem do slide -->
                    <img src="images/home-shoe-1.png" class="shoe" alt=""> <!-- imagem do produto -->
                    <img src="images/home-text-1.png" class="text" alt=""> <!-- imagem com texto do produto -->
                </div>
            </div>
        </div>

        <div class="slide-container">
            <div class="slide">
                <div class="content">
                    <span>nike blue shoes</span>
                    <h3>nike metcon shoes</h3>
                    <p>Este tênis esportivo Nike apresenta um design moderno e dinâmico com uma combinação de preto e azul. <p>A sola é projetada com tecnologia de amortecimento de impacto, proporcionando uma excelente absorção de choque e proteção contra lesões durante o treino.  </p>  </p>
                    <a href="#" class="btn">ADICIONAR AO CARRINHO</a>
                </div>
                <div class="image">
                    <img src="images/home-shoe-2.png" class="shoe" alt="">
                    <img src="images/home-text-2.png" class="text" alt="">
                </div>
            </div>
        </div>
    
        <div class="slide-container">
            <div class="slide">
                <div class="content">
                    <span>nike yellow shoes</span>
                    <h3>nike metcon shoes</h3>
                    <p>Este tênis Nike Run apresenta um design moderno e vibrante com uma combinação de preto e amarelo. <p> No calcanhar e no logotipo da Nike, criando um visual contrastante e atraente.</p></p>
                    <a href="#" class="btn">ADICIONAR AO CARRINHO</a>
                </div>
                <div class="image">
                    <img src="images/home-shoe-3.png" class="shoe" alt="">
                    <img src="images/home-text-3.png" class="text" alt="">
                </div>
            </div>
        </div>
        
        <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
        <div id="next" class="fas fa-chevron-right" onclick="next()"></div>
        
    </section>

    <!-- fim da seção home -->

<!-- seção de serviço é iniciada -->

<section class="service">

    <div class="box-container">
        <div class="box">
            <i class="fas fa-shipping-fast"></i>
            <h3>Entrega Rápida</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p>
        </div>

        <div class="box">
            <i class="fas fa-undo"></i>
            <h3>Troca em até 10 dias</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p>
        </div>

        <div class="box">
            <i class="fas fa-headset"></i>
            <h3>Suporte 24 x 7</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p>
        </div>

    </div>

</section>

    <!-- seção de serviço termina -->

<!-- início da seção de produtos  -->

<section class="products" id="products">

    <h1 class="heading"> Produtos <span> mais Recentes</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/adidas azul ok/720X320/8.6_cropped-removebg-preview (1)_resized.png" alt="">
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
            
            <img src="images/adidas preto ok/720X320/7.1_cropped-removebg-preview (1)_resized.png" alt="">
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
           
            <img src="images/azul escuro ok/702X320/6.1_cropped-removebg-preview (1) (1)_resized.png" alt="">
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
            
            <img src="images/verde ok/720X320/3.1_resized-removebg-preview (1)_resized.png" alt="">
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
                
            </div>
            <img src="images/cinza claro ok/720X320/1.1.png" alt="">
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
            
            </div>
            <img src="images/verde claro ok/720X320/4.1_cropped__2_-removebg-preview (1)_resized.png" alt="">
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

</section>


<!-- fim da seção de produtos -->

<!-- início da seção em destaque  -->

<section class="featured" id="featured">

    <h1 class="heading"> <span>Produtos</span> em Destaque </h1>

    <div class="row">
        <div class="image-container">
            <div class="small-image">
                <img src="images/nike preto/f-img-1.1.png" class="featured-image-1" alt="">
                <img src="images/nike preto/f-img-1.2.png" class="featured-image-1" alt="">
                <img src="images/nike preto/f-img-1.3.png" class="featured-image-1" alt="">
                <img src="images/nike preto/f-img-1.4.png" class="featured-image-1" alt="">
            </div>
            <div class="big-image">
                <img src="images/nike preto/f-img-1.1.png" class="big-image-1" alt="">
            </div>
        </div>
        <div class="content">
            <h3>new nike airmax shoes</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facilis praesentium odit voluptas illum iure libero quis fuga commodi. Autem.</p>
            <div class="price">R$80.99 <span>R$120.99</span></div>
            <a href="#" class="btn">Adicionar ao Carrinho</a>
        </div>
    </div>

    <div class="row">
        <div class="image-container">
            <div class="small-image">
                <img src="images/nike cinza/f-img-2.1.png" class="featured-image-2" alt="">
                <img src="images/nike cinza/f-img-2.2.png" class="featured-image-2" alt="">
                <img src="images/nike cinza/f-img-2.3.png" class="featured-image-2" alt="">
                <img src="images/nike cinza/f-img-2.4.png" class="featured-image-2" alt="">
            </div>
            <div class="big-image">
                <img src="images/nike cinza/f-img-2.1.png" class="big-image-2" alt="">
            </div>
        </div>
        <div class="content">
            <h3>new nike airmax shoes</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facilis praesentium odit voluptas illum iure libero quis fuga commodi. Autem.</p>
            <div class="price">R$80.99 <span>R$120.99</span></div>
            <a href="#" class="btn">Adicionar ao Carrinho</a>
        </div>
    </div>

    <div class="row">
        <div class="image-container">
            <div class="small-image">
                <img src="images/nike preto e amarelo/f-img-3.1.png" class="featured-image-3" alt="">
                <img src="images/nike preto e amarelo/f-img-3.2.png" class="featured-image-3" alt="">
                <img src="images/nike preto e amarelo/f-img-3.3.png" class="featured-image-3" alt="">
                <img src="images/nike preto e amarelo/f-img-3.4.png" class="featured-image-3" alt="">
            </div>
            <div class="big-image">
                <img src="images/nike preto e amarelo/f-img-3.1.png" class="big-image-3" alt="">
            </div>
        </div>
        <div class="content">
            <h3>new nike airmax shoes</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facilis praesentium odit voluptas illum iure libero quis fuga commodi. Autem.</p>
            <div class="price">R$80.99 <span>R$120.99</span></div>
            <a href="#" class="btn">Adicionar ao Carrinho</a>
        </div>
    </div>

    <div class="row">
        <div class="image-container">
            <div class="small-image">
                <img src="images/verde com laranja ok/720X320/f-img-4.1.png" class="featured-image-4" alt="">
                <img src="images/verde com laranja ok/720X320/f-img-4.2.png" class="featured-image-4" alt="">
                <img src="images/verde com laranja ok/720X320/f-img-4.3.png" class="featured-image-4" alt="">
                <img src="images/verde com laranja ok/720X320/f-img-4.4.png" class="featured-image-4" alt="">
            </div>
            <div class="big-image">
                <img src="images/verde com laranja ok/720X320/f-img-4.1.png" class="big-image-4" alt="">
            </div>
        </div>
        <div class="content">
            <h3>new nike airmax shoes</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facilis praesentium odit voluptas illum iure libero quis fuga commodi. Autem.</p>
            <div class="price">R$80.99 <span>R$120.99</span></div>
            <a href="#" class="btn">Adicionar ao Carrinho</a>
        </div>
    </div>
</section>


<!-- fim da seção em destaque -->

















<!-- início da avaliação do cliente  -->

<section class="review" id="review">

    <h1 class="heading">Avaliação <span>do Cliente</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic1.png" alt="">
            <h3>Maria</h3>
            <p>Comprei recentemente um par de tênis nessa loja e estou muito satisfeito com a minha compra. Os tênis são extremamente confortáveis e bem construídos. A sola é durável e adere bem ao chão, o que é ótimo para quando estou correndo ou fazendo atividades físicas. <p> O tamanho que escolhi ficou perfeito em meus pés e o acabamento é muito bem feito, sem nenhuma costura solta ou falhas no material.</p></p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
        </div>

        <div class="box">
            <img src="images/pic2.png" alt="">
            <h3>Vitor</h3>
            <p>Adorei os sapatos que comprei nesta loja! Eles são muito confortáveis e elegantes. A qualidade do material  é excelente e o acabamento é muito bem feito. Eu uso os sapatos tanto para trabalho quanto para sair à noite, e eles ficam ótimos com qualquer roupa. <p> O preço também foi muito justo em comparação com outras lojas que eu visitei. Recomendo esta loja e seus produtos a todos os meus amigos e familiares.</p></p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

        <div class="box">
            <img src="images/pic3.png" alt="">
            <h3>Pedro</h3>
            <p>Adorei a variedade de produtos disponíveis nesta loja virtual! É incrível como eles têm uma ampla seleção de calçados de diferentes estilos e marcas. Eu comprei um par de tênis de corrida e fiquei impressionado com a qualidade do produto. <p> Além disso, o processo de compra foi muito fácil e intuitivo. Eu consegui encontrar rapidamente o produto que estava procurando e finalizei a compra sem nenhum problema.</p></p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>

    </div>

</section>

<!-- fim da avaliação do cliente -->


<!-- início do rodapé  -->

<section class="footer" id="footer">

    <div class="box-container">


        <div class="box">
            <h3>links rápidos</h3>
            <a href="#home">Home</a>
            <a href="#products">Produtos</a>
            <a href="#featured">Destaque</a>
            <a href="#review">Avaliação</a>
        </div>

        <div class="box">
            <h3>Links extras</h3>
            <a href="#">Minha conta</a>
            <a href="#">Meus pedidos</a>
            <a href="#footer">Contato</a>
        </div>

        <div class="box">
            <h3>Siga-nos</h3>
            <a href="https://instagram.com/anytradeofficial?igshid=YmMyMTA2M2Y=">instagram</a>
          
        </div>

        <div class="credit">created by <span> G2 DEVELOPMENT </span> | all rights reserved</div>

    </div>
    <!-- fim do rodapé  -->
</section>

    

    <script src="js/script.js"></script>

</body>
</html>