<?php

/*
 * Método que lê os dados e os carrega em um variável chamada json
 * @param $id int identificador numérico do registro
 * @return String dados codificados no formato json
 */
function carregar($id)
{
    $json = ler_json(ARQUIVO_JSON);

    foreach ($json as $key) {
        if ($key->id == $id)
            return (array) $key;
    }
}

/*
 * Método que altera os dados de um registro
 * @return void
 */
function alterar()
{
    $novo = tela2array();

    $json = ler_json(ARQUIVO_JSON);

    for ($x = 0; $x < count($json); $x++) {
        if ($json[$x]->id == $novo['id']) {
            array2json($novo, $json[$x]);
        }
    }

    salvar_json(json_encode($json), ARQUIVO_JSON);

    header("location:" . DESTINO);

}


/*
1 - abrir json em formato php;
2 - percorrer e achar o item pelo ID;
3 - estratégia de deletar;
4 - gravar em json novamente, sem o item;
5 - redirecionar para a página index.php
*/

/*
 * Método exclui um registro
 * @return void
 */
function excluir()
{
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $json = ler_json(ARQUIVO_JSON);
    if ($json == null)
        $json = array();

    $novo = array();
    for ($x = 0; $x < count($json); $x++) {
        var_dump($json[$x]);
        if ($json[$x]->id != $id)

            array_push($novo, $json[$x]);
    }
    salvar_json(json_encode($json), ARQUIVO_JSON);

    header("location:" . DESTINO);

}
/*
 * Método salva alterações feitas em um registro
 * @return void
 */
function salvar()
{
    $json = NULL;
    $pessoa = tela2array();

    $json = ler_json(ARQUIVO_JSON);

    if ($json == NULL) {
        $json = array();
    }

    array_push($json, $pessoa);

    salvar_json(json_encode($json), ARQUIVO_JSON);

    header("location:" . DESTINO);
}



?>