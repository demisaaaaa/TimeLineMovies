<?php

function desenha_tabela()
{
    echo "<table role='grid'>
    <tr>
        <th>Id</th>
        <th>Opiniao</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </tr>";

    $dados = json_decode(file_get_contents('opiniao.json'), true);
    foreach ($dados as $key)
        echo "<tr><td>{$key['id']}</td>
          <td>{$key['opniao']}</td>
          <td align='center'><a role='button' href='opniao.php?id=" . $key['id'] . "';>A</a></td>
          <td align='center'><a role='button' href=javascript:excluirRegistro('opniao_acao.php?acao=excluir&id=" . $key['id'] . "');>E</a></td>
      </tr>";

    echo "</table>";
}

function desenha_combobox()
{
    echo "<select name='opiniao'>";

    $dados = json_decode(file_get_contents('opniao.json'), true);
    foreach ($dados as $key) {
        echo "<option value='{$key['id']}'>
                {$key['op']}
              </option>";

    }
    echo "</select>";
}


?>