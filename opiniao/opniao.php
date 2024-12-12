<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/op.css">
  <title>Tela das opiniões</title>
  <?php
  $op1 = isset($_POST['op1']) ? $_POST['op1'] : "";
  $op2 = isset($_POST['op2']) ? $_POST['op2'] : "";
  $op3 = isset($_POST['op3']) ? $_POST['op3'] : "";
  ?>
</head>

<body>
  <div>
    <nav class="navbar navbar-light bg-light">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <a class="navbar-brand">
        <h3> Àrea de opiniões</h3>
      </a>
      <form action="opniao_acao.php" method="post">
        <p>
          <select name="end_cidade" id="" class="form-select">
            <option selected>opiniões</option>
            <option value=".">//</option>
            <option value="..">//</option>
            <option value="...">//</option>
          </select>
        </p>
      </form>
    </nav>
    <div class="timeline">
      <div class="container left">
        <div class="content">
          <form action="opniao_acao.php" method="post">
            <input class="form-control mr-sm-2" type="text" name="opniao" placeholder="Dar opinião"
              aria-label="Dar opinião"><br>
            <p><a href="telaprincipal.html"><button value="telaprincipal.html">salvar</button></a></p>
            <p><a href="telaprincipal.html"> <button value="telaprincipal">Voltar</button></a></p>
          </form>
        </div>
      </div>
    </div>
</body>

</html>