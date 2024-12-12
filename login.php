<!DOCTYPE html>
<html lang="en">
  <?php
require_once("class/login.class.php");
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Tela de Login</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/fundo.css">
</head>

<body class="body">
  <?php
  $nome = array([]);
  $user = array([]);
  //$pass = array([]);
  $pass = true;
  ?>
  <div class="container">
    <br>
    <caption>
      <h3 class="titulo">TELA DE LOGIN</h3>
    </caption>
    <form action="usuario.class.php" method="post">
      Nome: <input type="text" name="nome" id="nome">

      <div class="row">
        <div class="col-md-7">
          <br>
          Senha: <input type="password" name="nome" id="nome">
        </div><br>
        <div class="row">
          <div class="col-md-5">
            <br>
            <div class="row">
              <div class="col-md-7">
                <br>
                Não tem login?<br>
                Clica aqui <br>
                <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                <label class="btn btn-primary" for="btn-check-2"> <a href="log.php">AQUI</a></label>

              </div><br>
              <div class="row">
                <div class="col-md-5">
                  <br>

                  <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                  <label class="btn btn-primary" for="btn-check-2"> <a href="telaprincipal.html">PRONTO</a></label>
    </form>
  </div><br>
  </div>
  </div>
  </div>
  <?php
  if ($pass == true) {
    echo "<a href='telaprincipal.html'>";
  } else {
    echo "NADA";
  }
  ?>
</body>

</html>