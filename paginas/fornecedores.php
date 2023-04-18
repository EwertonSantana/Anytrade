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
session_start();
require '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ANYTRADE - Fornecedor</title>
    <script>
        function limpa_formulario_cep() {
            // Limpa valores do formulario do CEP
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                // Atualiza os campos com os valores
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
            } else {
                // CEP não encontrado
                limpa_formulario_cep();
                alert("Cep não encontrado");
            }
        }

        function pesquisacep(valor) {
            // Digitos do CEP batendo com os que estão nos banco de dados do Correios 
            var cep = valor.replace(/\D/g, '');

            if (cep != "") {
                // Validar cep
                var validacep = /^[0-9]{8}$/;
                // valida formato cep
                if (validacep.test(cep)) {
                    // ... preenche os campos enquanto "..." enquanto consulta
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";

                    // Cria elementos javascript
                    var script = document.createElement('script');

                    // Sincroniza o Callback
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    // Insere script no documento e carrega o conteudo
                    document.body.appendChild(script);
                } else {
                    // Cep invalido
                    limpa_formulario_cep();
                    alert("Formato de Cep inválido!")
                }

            } else {
                // CEP sem valor, limpar formulario
                limpa_formulario_cep();

            }
        };
    </script>
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
            <h2>Cadastros de Fornecedores</h2><br>

            <nav id="cad-opcoes">
                <?php
                if (isset($_GET['id'])) {
                    $idForn = mysqli_real_escape_string($conexao, $_GET['id']);
                    $sql = "SELECT * FROM fornecedores WHERE idFornecedor ='$idForn'";
                    $sqlrun = mysqli_query($conexao, $sql);

                    if (mysqli_num_rows($sqlrun) > 0) {
                        $forn = mysqli_fetch_array($sqlrun);
                ?>
                        <form method="post" action="../processar.php" id="form-cad">

                            <input type="hidden" name="idfor" value="<?= $forn['idFornecedor'] ?>">

                            <label for="cnpjfor">CNPJ:</label>
                            <input type="text" id="cnpjfor" name="cnpjfor" placeholder="Digite aqui o CNPJ" value="<?= $forn['cnpjFornecedor'] ?>" required><br>

                            <label for="rsocialfor">Razão social:</label>
                            <input type="text" id="rsocialfor" name="rsocialfor" placeholder="Digite aqui a razão social" value="<?= $forn['razaoFornecedor'] ?>" required><br>

                            <label for="nfantasiafor">Nome fantasia:</label>
                            <input type="text" id="nfantasiafor" name="nfantasiafor" placeholder="Digite aqui o nome fantasia" value="<?= $forn['nfantasiaFornecedor'] ?>" required><br>

                            <label for="inscricaofor">Inscrição Estadual:</label>
                            <input type="text" id="inscricaofor" name="inscricaofor" placeholder="Digite aqui a inscrição estadual" value="<?= $forn['iestadualFornecedor'] ?>" required><br>

                            <label for="emailfor">E-mail:</label>
                            <input type="email" id="emailfor" name="emailfor" placeholder="Digite aqui o e-mail" value="<?= $forn['emailFornecedor'] ?>" required><br>

                            <label for="contatofor">Contato:</label>
                            <input type="tel" id="contatofor" name="contatofor" placeholder="Digite aqui o número para contato" value="<?= $forn['contatoFornecedor'] ?>" required><br>

                            <label for="cepfor">CEP:</label>
                            <input type="text" id="cep" name="cep" maxlength="8" onblur="pesquisacep(this.value);" placeholder="Digite aqui o CEP" value="<?= $forn['cepFornecedor'] ?>" required><br>

                            <label for="enderecofor">Endereço:</label>
                            <input type="text" id="rua" name="rua" placeholder="Digite aqui o endereço" value="<?= $forn['endFornecedor'] ?>" required><br>

                            <label for="cidadefor">Cidade:</label>
                            <input type="text" id="cidade" name="cidade" placeholder="Digite aqui a cidade" value="<?= $forn['cidadeFornecedor'] ?>" required><br>

                            <label for="bairrofor">Bairro:</label>
                            <input type="text" id="bairro" name="bairro" placeholder="Digite aqui o bairro" value="<?= $forn['bairroFornecedor'] ?>" required><br>

                            <label for="uffor">UF:</label>
                            <input type="text" id="uf" name="uf" sezi='2' placeholder="Digite aqui a UF" value="<?= $forn['ufFornecedor'] ?>" required><br>

                            <label for="complementofor">Complemento:</label>
                            <input type="text" id="complementofor" name="complementofor" placeholder="Digite aqui o complemento" value="<?= $forn['complementoFornecedor'] ?>"><br>

                            <div>

                                <button value="atlfor" id="btn-acao" name="acao">Atualizar registro</button>
                                <button id="btn-acao" onclick="windows.history.back()">Voltar</button>

                        </form>
                <?php
                    } else {
                        echo "<h3>Fornecedor não encontrado</h3>";
                    }
                }
                ?>
            </nav>
        </div>
    </div>
</body>

</html>