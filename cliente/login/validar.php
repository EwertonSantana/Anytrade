<?php 
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
    header("Location: index.php");
    exit;
}
    require 'conexao.php';

    $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
    $senhat = mysqli_real_escape_string($conexao, $_POST['senha']);
    $senha = md5($senhat);

    $sql = "SELECT * FROM usuario_cliente WHERE emailCliente = '$usuario' AND senhaCliente = '$senha'  LIMIT 1";
    $query = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($query) != 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        echo "Login inválido!"; exit;
    } else {
        // Salva os dados encontados na variável $resultado
        $resultado = mysqli_fetch_assoc($query);
        // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();

      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['idCliente'];
      $_SESSION['UsuarioNome'] = $resultado['nomeCliente'];

      // Redireciona o visitante
      header("Location: ../index.html"); exit;
    }
