<?php
define("DESTINO", "usuario/usuario_cad.php");
define("ARQUIVO_JSON", "usuario.json");

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
        'foto' => isset($_POST['foto']) ? $_POST['foto'] : "",
        'nome' => isset($_POST['nome']) ? $_POST['nome'] : "",
        'data_de_nascimento' => isset($_POST['data_de_nascimento']) ? $_POST['data_de_nascimento'] : "",
        'email' => isset($_POST['email']) ? $_POST['email'] : "",
        'senha' => isset($_POST['senha']) ? $_POST['senha'] : "",
        'confi_senha' => isset($_POST['confi_senha']) ? $_POST['confi_senha'] : ""
    );
    if ($novo['id'] == "0") {
        $novo['id'] = date("YmdHis");
    }
    return $novo;
}

function array2json($array_dados, $json_dados)
{
    $json_dados->id = $array_dados['id'];
    $json_dados->foto = $array_dados['foto'];
    $json_dados->nome = $array_dados['nome'];
    $json_dados->data_de_nascimento = $array_dados['data_de_nascimento'];
    $json_dados->email = $array_dados['email'];
    $json_dados->senha = $array_dados['senha'];
    $json_dados->confi_senha = $array_dados['confi_senha'];

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
    $usuario = tela2array();
    if ($usuario['senha'] === $usuario['confi_senha']) {
        $user = new Usuario($usuario['foto'], $usuario['nome'], $usuario['nascimento'], $usuario['email'], $usuario['login'],);

        $user->incluir();
     /*   $json = ler_json(ARQUIVO_JSON);

        if ($json == NULL) {
            $json = array();
        }

        array_push($json, $usuario);

        salvar_json(json_encode($json), ARQUIVO_JSON);*/

        //header("location:" . DESTINO);
    } else {
        //header("location:" . "usuario_cad.php");
    }
}

?>