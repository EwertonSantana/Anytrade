<?php 
    include("conexao.php");
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

     $sql = "INSERT INTO usuario_cliente (nomeCliente, cpfCliente, nascimentoCliente, sexoCliente, emailCliente, senhaCliente) VALUES ('$nome','$cpf', '$data_nascimento','$sexo','$email','$senha')";

     if(mysqli_query($conexao, $sql)){
        echo "Usuário cadastrado com sucesso!";
     }


     else {
        echo "Erro".mysqli_connect_errno($conexao);
     }

     mysqli_close($conexao);

?>