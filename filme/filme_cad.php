<!DOCTYPE html>
<html lang="en">
  <?php
require("../class/filme.class.php");
require("../filme/filme.php");
  ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro do filme</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="css/fundo.css">
</head>

<body class="body">
  <div class="container">
    <caption>
      <h1 class="titulo">Cadastro de Filme</h1>
    </caption>
    <form action="filmes_acao.php" method="post">
    <table>
    <tr>
    <div class="row">
          <div class="col-md-7">
            <br>
            <th> Poster: <input type="file" name="poster" id="poster"> </th>
          </div>
      </tr>
      <tr>
      <div class="row">
          <div class="col-md-7">
            <br>
        <th> Nome: <input type="text" name="nome" id="nome"> </th>
      </tr>
      <tr>
        <div class="row">
          <div class="col-md-7">
            <br>
            <th> Data de Lançamento: <input type="date" name="data" id="data"> </th>
          </div>
      </tr>
      <tr>
        <div class="row">
          <div class="col-md-7">
            <br>
            <th> Resumo: <input type="text" name="resumo" id="resumo"> </th>
          </div>
      </tr>
      <tr>
        <th><input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
          <input type="submit" name="acao" value="Salvar">
        </th>
      </tr>
    </table>
    </form>
  </div>
  </div>
  </div>
  </div>
</body>
</html>