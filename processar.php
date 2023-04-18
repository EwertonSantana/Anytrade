<?php
/* Conexão com BD e Seleção de escolhas para ações*/
include("conexao.php");
switch ($_REQUEST['acao']) {

        /* Cadastrar produto/estoque/grade*/
    case 'cadprod':
        $nome = $_POST['nome'];
        $categoria = $_POST['categoria'];
        $subcategoria = $_POST['subcategoria'];
        $tamanho = $_POST['tamanho'];
        $cor = $_POST['cor'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];

        if (isset($_FILES['imagem'])) {
            $imagem = $_FILES['imagem'];

            if ($imagem['error'])
                die("Falha ao enviar o arquivo!");

            if ($imagem['size'] > 2097152)
                die("Arquivo muito grande! Max: 2MB");

            $pasta = "cliente/images/";
            $nomeDoArquivo = $imagem['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

            if ($extensao != "jpg" && $extensao != 'png')
                die("Tipo de arquivo não aceito!");
            $path = $novoNomeDoArquivo . "." . $extensao;
            $deu_certo = move_uploaded_file($imagem['tmp_name'], $pasta . $path);
        }

        $sql = "INSERT INTO produtos (nomeProd, catProd, subcatProd, precoProd, descricaoProd) values('{$nome}', '{$categoria}', '{$subcategoria}', '{$preco}', '{$descricao}')";

        $sql2 = "INSERT INTO grade (tamanho, cor) values('{$tamanho}', '{$cor}')";

        $sql3 = "INSERT INTO estoque (quantidadeEstq) values(0)";

        $sql4 = "INSERT INTO imagem (nome, path) VALUES ('$nomeDoArquivo', '$path')";

        $resultado = $conexao->query($sql);
        $resultado = $conexao->query($sql2);
        $resultado = $conexao->query($sql3);
        $resultado = $conexao->query($sql4);


        if ($resultado == true) {
            print "Cadastro realizado com sucesso!";
            header('Location: ../AnyTrade/cadastro/cproduto.php');
            break;
        } else {
            print "Não foi possível realizar o cadastro. Verifique as informações!";
            header('Location: ../AnyTrade/cadastro/cproduto.php');
            break;
        };

        /* Atualizar produto/estoque/grade*/
    case 'atlprod':
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $categoria = $_POST['categoria'];
        $subcategoria = $_POST['subcategoria'];
        $tamanho = $_POST['tamanho'];
        $cor = $_POST['cor'];
        $estoque = $_POST['qntestq'];
        $lclestoque = $_POST['lclestq'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];

        if (isset($_FILES['imagem'])) {
            $imagem = $_FILES['imagem'];

            if ($imagem['error'])
                die("Falha ao enviar o arquivo!");

            if ($imagem['size'] > 2097152)
                die("Arquivo muito grande! Max: 2MB");

            $pasta = "cliente/images/";
            $nomeDoArquivo = $imagem['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

            if ($extensao != "jpg" && $extensao != 'png')
                die("Tipo de arquivo não aceito!");
            $path = $novoNomeDoArquivo . "." . $extensao;
            $deu_certo = move_uploaded_file($imagem['tmp_name'], $pasta . $path);
            $sql4 = "UPDATE imagem SET path = '$path' WHERE idImg = '$id'";
            $resultado = $conexao->query($sql4);
        }

        $sql = "UPDATE produtos SET nomeProd = '$nome', catProd = '$categoria', subcatProd = '$subcategoria', precoProd = '$preco', descricaoProd = '$descricao' WHERE idProd = '$id'";

        $sql2 = "UPDATE estoque SET quantidadeEstq ='$estoque', localEstq = '$lclestoque' WHERE idEstq = '$id'";

        $sql3 = "UPDATE grade SET tamanho = '$tamanho', cor = '$cor' WHERE idGrade = '$id'";

        $resultado = $conexao->query($sql);
        $resultado = $conexao->query($sql2);
        $resultado = $conexao->query($sql3);

        if ($resultado == true) {
            $_SESSION['message'] = "Produto atualizado com sucesso!";
            header('Location: ../AnyTrade/estoque.php');
            break;
        } else {
            $_SESSION['message'] = "Não foi possível atualizar o registro do produto. Verifique as informações!";
            header('Location: ../AnyTrade/estoque.php');
            break;
        };

        /* Excluir produto/estoque/grade*/

    case 'dltprod':
        $delete = $_POST['delete'];
        $sql = "DELETE FROM grade WHERE idGrade='$delete'";
        $sql2 = "DELETE FROM estoque WHERE idEstq='$delete'";
        $sql3 = "DELETE FROM produtos WHERE idProd='$delete'";
        $sql4 = "DELETE FROM imagem WHERE idImg='$delete'";

        $sqlrun = mysqli_query($conexao, $sql);
        $sqlrun2 = mysqli_query($conexao, $sql2);
        $sqlrun3 = mysqli_query($conexao, $sql3);
        $sqlrun4 = mysqli_query($conexao, $sql4);

        if ($sqlrun) {
            $_SESSION['message'] = "Produto excluído com sucesso!";
            header('Location: ../AnyTrade/estoque.php');
            exit();
        } else {
            $_SESSION['message'] = "Não foi possível excluir o registro do produto!";
            header('Location: ../AnyTrade/estoque.php');
            exit();
        };

        /* cadastro de fornecedores */

    case 'cadfor':
        $cnpjfor = $_POST['cnpjfor'];
        $rsocialfor = $_POST['rsocialfor'];
        $nfantasiafor = $_POST['nfantasiafor'];
        $inscricaofor = $_POST['inscricaofor'];
        $emailfor = $_POST['emailfor'];
        $contatofor = $_POST['contatofor'];
        $cepfor = $_POST['cep'];
        $enderecofor = $_POST['rua'];
        $cidadefor = $_POST['cidade'];
        $bairrofor = $_POST['bairro'];
        $uffor = $_POST['uf'];
        $complementofor = $_POST['complementofor'];

        $sql = "INSERT INTO fornecedores (cnpjFornecedor, razaoFornecedor, nfantasiaFornecedor,iestadualFornecedor, emailFornecedor, contatoFornecedor, 
            cepFornecedor, cidadeFornecedor, bairroFornecedor, ufFornecedor, endFornecedor, complementoFornecedor ) values('{$cnpjfor}', '{$rsocialfor}', '{$nfantasiafor}', '{$inscricaofor}', '{$emailfor}', '{$contatofor}', '{$cepfor}', '{$cidadefor}', '{$bairrofor}', '{$uffor}', '{$enderecofor}','{$complementofor}')";

        $resultado = $conexao->query($sql);


        if ($resultado == true) {
            print "Cadastro realizado com sucesso!";
            header('Location: ../AnyTrade/cadastro/cfornecedores.php');
            break;
        } else {
            print "Não foi possível realizar o cadastro. Verifique as informações!";
            header('Location: ../AnyTrade/cadastro/cfornecedores.php');
            break;
        };

        /* editar fornecedores */

    case 'atlfor':
        $idfor = $_POST['idfor'];
        $cnpjfor = $_POST['cnpjfor'];
        $rsocialfor = $_POST['rsocialfor'];
        $nfantasiafor = $_POST['nfantasiafor'];
        $inscricaofor = $_POST['inscricaofor'];
        $emailfor = $_POST['emailfor'];
        $contatofor = $_POST['contatofor'];
        $cepfor = $_POST['cep'];
        $enderecofor = $_POST['rua'];
        $cidadefor = $_POST['cidade'];
        $bairrofor = $_POST['bairro'];
        $uffor = $_POST['uf'];
        $complementofor = $_POST['complementofor'];

        $sql = "UPDATE fornecedores SET cnpjFornecedor = '$cnpjfor', razaoFornecedor = '$rsocialfor', nfantasiaFornecedor = '$nfantasiafor', iestadualFornecedor = '$inscricaofor', emailFornecedor = '$emailfor', contatoFornecedor = '$contatofor', cepFornecedor = '$cepfor', cidadeFornecedor = '$cidadefor', bairroFornecedor = '$bairrofor', ufFornecedor = '$uffor', endFornecedor = '$enderecofor', complementoFornecedor = '$complementofor' WHERE idFornecedor = '$idfor'";

        $resultado = $conexao->query($sql);

        if ($resultado == true) {
            $_SESSION['message'] = "Produto atualizado com sucesso!";
            header('Location: ../AnyTrade/tabelas/tfornecedores.php');
            break;
        } else {
            $_SESSION['message'] = "Não foi possível atualizar o registro do produto. Verifique as informações!";
            header('Location: ../AnyTrade/tabelas/tfornecedores.php');
            break;
        };

        /* Excluir fornecedores */

    case 'dltfor':
        $delete = $_POST['delete'];
        $sql = "DELETE FROM fornecedores WHERE idFornecedor='$delete'";


        $sqlrun = mysqli_query($conexao, $sql);


        if ($sqlrun) {
            $_SESSION['message'] = "Produto excluído com sucesso!";
            header('Location: ../AnyTrade/tabelas/tfornecedores.php');
            exit();
        } else {
            $_SESSION['message'] = "Não foi possível excluir o registro do produto!";
            header('Location: ../AnyTrade/tabelas/tfornecedores.php');
            exit();
        }

        /* cadastro transportadora */
    case 'cadtrans':
        $cnpjtrans = $_POST['cnpjtrans'];
        $rsocialtrans = $_POST['rsocialtrans'];
        $nfantasiatrans = $_POST['nfantasiatrans'];
        $inscricaotrans = $_POST['inscricaotrans'];
        $emailtrans = $_POST['emailtrans'];
        $contatotrans = $_POST['contatotrans'];


        $sql = "INSERT INTO transportadora (cnpjTransp, razaoTransp, nfantasiaTransp, iestadualTransp, emailTransp, contatoTransp
                    ) values('{$cnpjtrans}', '{$rsocialtrans}', '{$nfantasiatrans}', '{$inscricaotrans}', '{$emailtrans}', '{$contatotrans}')";

        $resultado = $conexao->query($sql);


        if ($resultado == true) {
            print "Cadastro realizado com sucesso!";
            header('Location: ../AnyTrade/cadastro/ctransportadora.php');
            break;
        } else {
            print "Não foi possível realizar o cadastro. Verifique as informações!";
            header('Location: ../AnyTrade/cadastro/ctransportadora.php');
            break;
        }

        /* editar transportadora*/

    case 'atltrans':
        $idTrans = $_POST['idtrans'];
        $cnpjtrans = $_POST['cnpjtrans'];
        $rsocialtrans = $_POST['rsocialtrans'];
        $nfantasiatrans = $_POST['nfantasiatrans'];
        $inscricaotrans = $_POST['inscricaotrans'];
        $emailtrans = $_POST['emailtrans'];
        $contatotrans = $_POST['contatotrans'];

        $sql = "UPDATE transportadora SET cnpjTransp = '$cnpjtrans', razaoTransp = '$rsocialtrans',  nfantasiaTransp = '$nfantasiatrans', iestadualTransp = '$inscricaotrans', emailTransp = '$emailtrans', contatoTransp = '$contatotrans' WHERE idTransp = '$idTrans'";

        $resultado = $conexao->query($sql);

        if ($resultado == true) {
            $_SESSION['message'] = "Transportadora atualizada com sucesso!";
            header('Location: ../AnyTrade/tabelas/ttransportadora.php');
            break;
        } else {
            $_SESSION['message'] = "Não foi possível atualizar a Transportadora. Verifique as informações!";
            header('Location: ../AnyTrade/tabelas/ttransportadora.php');
            break;
        };

        /* Excluir transportadora */

    case 'dlttrans':
        $delete = $_POST['delete'];
        $sql = "DELETE FROM transportadora WHERE idTransp='$delete'";


        $sqlrun = mysqli_query($conexao, $sql);


        if ($sqlrun) {
            $_SESSION['message'] = "Transportadora excluída com sucesso!";
            header('Location: ../AnyTrade/tabelas/ttransportadora.php');
            exit();
        } else {
            $_SESSION['message'] = "Não foi possível excluir a Transportadora!";
            header('Location: ../AnyTrade/tabelas/ttransportadora.php');
            exit();
        };
}
