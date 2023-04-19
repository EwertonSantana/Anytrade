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

  require 'conexao.php';
  $cartao = $_POST['cartao'];
  $parcelas = $_POST['parcelas'];
  $cvv = $_POST['cvv'];
  $nome = $_POST['nome'];
  $validade = $_POST['validade'];
  $descricao = 'Pagador: '.$nome.' cartão: '.$cartao .' parcelas: '. $parcelas.' CVV: '. $cvv .' validade: '. $validade;

  $sql = "INSERT INTO forma_pagamento (formaPag, descricaoPag) values('Cartão', '$descricao')";

  $sqlrun = $conexao -> query($sql);

  header('Location: ../index.php');
  ?>