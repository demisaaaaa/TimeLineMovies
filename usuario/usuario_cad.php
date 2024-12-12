<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="css/fundo.css">
  <?php
  $nome = true;
  $data = true;
  //$pass = array([]);
  ?>
</head>

<body class="body">
  <div class="container">
    <caption>
      <h1 class="titulo">Tela de Cadastro</h1>
    </caption>
    <table>
      <tr>
        <th> Nome: <input type="text" name="nome" id="nome"> </th>
      </tr>
      <tr>
        <div class="row">
          <div class="col-md-7">
            <br>
            <th> Data de Nascimento: <input type="date" name="nome" id="nome"> </th>
          </div>
      </tr>
      <tr>
        <div class="row">
          <div class="col-md-7">
            <br>
            <th> E-mail: <input type="email" name="email" id="email"> </th>
          </div>
      </tr>
      <tr>
        <th><input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
          <label class="btn btn-primary" for="btn-check-2"> <a href="usuario_ver.php">Enviar</a></label>
        </th>
      </tr>
    </table>
  </div>
  </div>
  </div>
  </div>
  <?php
  if ($nome && $data == true) {
    echo "<a href='login.php'>";
  } else {
    echo "NADA";
  }
  ?>
</body>

</html>