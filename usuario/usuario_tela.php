<?php

function desenha_tabela()
{
    echo "<table role='grid'>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Data_de_nascimento</th>
        <th>Email</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </tr>";

    $dados = json_decode(file_get_contents('usuario.json'), true);
    foreach ($dados as $key)
        echo "<tr><td>{$key['id']}</td>
          <td>{$key['nome']}</td>
          <td>{$key['data_de_nascimento']}</td>
          <td>{$key['email']}</td>
          <td align='center'><a role='button' href='usuario.php?id=" . $key['id'] . "';>A</a></td>
          <td align='center'><a role='button' href=javascript:excluirRegistro('usuario_acao.php?acao=excluir&id=" . $key['id'] . "');>E</a></td>
      </tr>";

    echo "</table>";
}

function desenha_combobox()
{
    echo "<select name='usuario'>";

    $dados = json_decode(file_get_contents('usuario.json'), true);
    foreach ($dados as $key) {
        echo "<option value='{$key['id']}'>
                {$key['nome']}
                {$key['data_de_nascimento']}
                {$key['email']}
              </option>";

    }
    echo "</select>";
}


?>