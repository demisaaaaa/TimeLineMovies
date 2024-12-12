
<?php
// require_once('../login/valida.login.php');
include_once('usuario.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuário</title>
</head>
<body>
    <h2><?=$msg?></h2>
    <! -- formulario de cadastro -->
    <form action="usuario.php" method="post">
        <fieldset>
       
        <label for="id">Id:</label>
        <input type="text" name="id" id="id" value="<?=isset($contato)?$contato->getId():0 ?>" readonly>
        <label for="foto">Foto de perfil:</label>
        <input type="text" name="foto" id="foto" value="<?php if (isset($contato)) echo $contato->getFoto() ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php if (isset($contato)) echo $contato->getNome() ?>">
        <label for="dtNasc">Data de Nascimento:</label>
        <input type="date" name="dtNasc" id="dtNasc" value="<?php if (isset($contato)) echo $contato->getdtNasc() ?>">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?php if (isset($contato)) echo $contato->getEmail() ?>">
        <label for="senha">Senha:</label>
        <input type="text" name="senha" id="senha" value="<?php if (isset($contato)) echo $contato->getSenha() ?>">
        <button type="submit">Salvar</button>
        <button type="reset">Cancelar</button>
    </form>
    </fieldset>
    <hr>
    <! -- formulario de pesquisa -->
    <form action="" method="get">
        <fieldset>
            <legend>Pesquisa</legend>
    <label for="busca">Busca:</label>
        <input type="text" name="busca" id="busca" value="">
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo">
            <option value="0">Escolha</option>
            <option value="1">Id</option>
            <option value="2">Nome</option>
            <option value="3">E-mail</option>
            <option value="4">Nível de permissão</option>
        </select>
        <button type="submit">Buscar</button>
        </fieldset>
    </form>
    <h1>Lista meus contatos</h1>
    <table>
        <tr>
            <th>Id /</th>
            <th>Nome /</th>
            <th>E-mail /</th>
            <th>Nível de permissão</th>
        </tr>
        <?php
            foreach($lista as $usuario){
                echo "<tr><td><a href='cad.usuario.php?id=".$usuario->getId()."'>".$usuario->getId()."</a></td><td>".$usuario->getNome()."</td><td>".$usuario->getEmail()."</td><td>".$usuario->getNivelpermissao()."</td><td>".$usuario->getCpf()."</td><td>".$usuario->getSenha()."</td></tr>";
            }       
        ?>
    </table>
</body>
</html>