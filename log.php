<!DOCTYPE html>
<html lang="en">
<?php
require_once("class/login.class.php");
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/fundo.css">
  <title>Fazendo login</title>
</head>

<body class="body">
  <h3 class="titulo">BORA FAZER LOGIN?</h3>

  <?php
  $erro = "";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Prevenção contra espaços em branco e não preenchimento
      $nome = trim($_POST['nome'] ?? '');
      $email = trim($_POST['email'] ?? '');
      $data = $_POST['data'] ?? '';
      $senha = $_POST['senha'] ?? '';
      $confirmacao = $_POST['confirmacao'] ?? '';

      // Verifica se algum campo está vazio
      if (empty($nome) || empty($email) || empty($data) || empty($senha) || empty($confirmacao)) {
          $erro = "Todos os campos são obrigatórios.";
      } elseif ($senha !== $confirmacao) {
          $erro = "As senhas não coincidem.";
      } else {
          // Processa o upload do arquivo, se houver
          if (isset($_FILES['perfil']) && $_FILES['perfil']['error'] === UPLOAD_ERR_OK) {
              $uploadDir = 'uploads/';
              if (!is_dir($uploadDir)) {
                  mkdir($uploadDir, 0755, true); // Cria o diretório, se necessário
              }
              $uploadFile = $uploadDir . basename($_FILES['perfil']['name']);
              if (!move_uploaded_file($_FILES['perfil']['tmp_name'], $uploadFile)) {
                  $erro = "Erro ao fazer upload da foto de perfil.";
              }
          }

          // Se tudo estiver correto
          if (empty($erro)) {
              // Salva a senha com hash
              $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

              // Aqui você pode salvar no banco de dados ou redirecionar
              header("Location: login.php");
              exit();
          }
      }
  }
  ?>

  <form action="login.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-7">
        <br>
        Foto de perfil: <input type="file" name="perfil" id="perfil">
      </div>
    </div>

    <div class="row">
      <div class="col-md-7">
        <br>
        Nome: <input type="text" name="nome" id="nome" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7">
        <br>
        Data de nascimento: <input type="date" name="data" id="data" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7">
        <br>
        E-mail: <input type="email" name="email" id="email" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7">
        <br>
        Senha: <input type="password" name="senha" id="senha" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7">
        <br>
        Confirmar senha: <input type="password" name="confirmacao" id="confirmacao" required>
      </div>
    </div>

    <div class="row">
        <div class="col-md-5">
          <br>
          <input type="submit" value="Salvar" name="acao">
        </div>
    </div>
  </form>

  <?php if (!empty($erro)) : ?>
      <p style="color:red;"><?php echo $erro; ?></p>
  <?php endif; ?>

</body>
</html>
