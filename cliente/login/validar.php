<?php 
    include('conexao.php');
    switch($_REQUEST['acao']){
        case 'logon':
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $sql = "SELECT * FROM usuario_cliente WHERE emailCliente = '$email' AND senhaCliente = '$senha'";

            $resultado = $conexao -> query($sql);

            $quantidade = $resultado->num_rows;


            if ($quantidade == 1) {
                $usuario = $resultado->fetch_assoc();
                if (!isset($_SESSION)) {
                    session_start();
                }
    
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
    
                header("Location: ../index.php");
            } else {
                echo "E-mail ou senha inválidos!";
            }

    }
?>