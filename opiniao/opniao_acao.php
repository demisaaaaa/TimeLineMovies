<?php
define("DESTINO", "opniao.php");
define("ARQUIVO_JSON", "opniao.json");

/* escolha da ação que processará a requisição */
$acao = "";
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        break;
    case 'POST':
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        break;
}

switch ($acao) {
    case 'Salvar':
        salvar();
        break;
}

function tela2array()
{
    $novo = array(
        'id' => isset($_POST['id']) ? $_POST['id'] : date("YmdHis"),
        'opniao' => isset($_POST['opniao']) ? $_POST['opniao'] : ""
    );
    if ($novo['id'] == "0") {
        $novo['id'] = date("YmdHis");
    }
    return $novo;
}

function array2json($array_dados, $json_dados)
{
    $json_dados->id = $array_dados['id'];
    $json_dados->opniao = $array_dados['opniao'];

    return $json_dados;
}

function salvar_json($dados, $arquivo)
{
    $fp = fopen($arquivo, "w");
    fwrite($fp, $dados);
    fclose($fp);
}

function ler_json($arquivo)
{
    $arquivo = file_get_contents($arquivo);
    $json = json_decode($arquivo);
    return $json;
}

function carregar($id)
{
    $json = ler_json(ARQUIVO_JSON);

    foreach ($json as $key) {
        if ($key->id == $id)
            return (array) $key;
    }
}

function salvar()
{
    $json = NULL;
    $opniao = tela2array();

    $json = ler_json(ARQUIVO_JSON);

    if ($json == NULL) {
        $json = array();
    }

    array_push($json, $opniao);

    salvar_json(json_encode($json), ARQUIVO_JSON);

    header("location:" . DESTINO);
}

?>