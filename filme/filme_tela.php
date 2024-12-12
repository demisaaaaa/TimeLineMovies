<?php
function desenhar_tabela()
{
    echo "<table role='grid'>
    <tr>
        <th>Id</th>
        <th>Poster</th>
        <th>Nome</th>
        <th>Data_de_Lancamento</th>
        <th>Resumo</th>
    </tr>";

    $dados = json_decode(file_get_contents('filmes.json'), true);
    foreach ($dados as $key)
        echo "<tr>
            <td>
            {$key['id']}</td>
            {$key['poster']}
            {$key['nome']}<br>
            {$key['data_de_lancamento']}<br>
            {$key['resumo']}<br>
          </td>
      </tr>";

    echo "</table>";
}

function desenhar_combobox()
{
    echo "<select name='filmes'>";

    $dados = json_decode(file_get_contents('filmes.json'), true);
    foreach ($dados as $key) {
        echo "<option value='{$key['id']}'>
                {$key['poster']}
                {$key['nome']}<br>
                {$key['data_de_lancamento']}<br>
                {$key['resumo']}<br>
              </option>";

    }
    echo "</select>";
}

function desenhar_cards()
{

    echo "<section class='filmes'>";
    $dados = json_decode(file_get_contents('filmes.json'), true);
    foreach ($dados as $key) {
        echo "<article>";
        echo "<head>{$key['nome']}</head>
                  <p>
                     {$key['data_de_lancamento']}<br>
                     {$key['resumo']}<br>
                  </p>
              <footer>
                  <a role='button' href='filmes_cad.php?id=" . $key['id'] . "';>A</a>
                  <a role='button' href=javascript:excluirRegistro('filmes_acao.php?acao=excluir&id=" . $key['id'] . "');>E</a>
              </footer>";
        echo "</article>";
    }
    echo "</section>";

}
?>