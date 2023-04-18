<?php 

    $servidor = 'Localhost';
    $Usuario = 'root';
    $Senha = '';
    $Dbname = 'anytrade';


    $conexao = mysqli_connect($servidor, $Usuario, $Senha, $Dbname);

    if(!$conexao){
        die ("Erro na Conexão: ".mysqli_connect_errno());
    }

?>