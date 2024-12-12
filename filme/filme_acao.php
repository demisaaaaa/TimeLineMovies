<?php

/*
* Código adaptado a partir do código do professor Rodrigo Curvello
* Controlador reponsável pela manutenção do cadastro da entidade Pessoa
* @author Wesley R. Bezerra <wesley.bezerra@ifc.edu.br>
* @version 0.1
*
*/

/* definição de constantes */
define("DESTINO", "index.php");
define("ARQUIVO_JSON", "filmes.json");
include"acao_util.php";
include"json_util.php";


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
    case 'Alterar':
        alterar();
        break;
    case 'excluir':
        excluir();
        break;
}

/*
* Método que converte formulário html para array com respectivos dados
* @return array
*/
function tela2array()
{
    $novo = array(
        'id' => isset($_POST['id']) ? $_POST['id'] : date("YmdHis"),
        'poster' => isset($_POST['poster']) ? $_POST['poster'] : "",
        'nome' => isset($_POST['nome']) ? $_POST['nome'] : "",
        'data_de_lancamento' => isset($_POST['data_de_lancamento']) ? $_POST['data_de_lancamento'] : "",
        'resumo' => isset($_POST['resumo']) ? $_POST['resumo'] : ""
    );
    if ($novo['id'] == "0") {
        $novo['id'] = date("YmdHis");
    }
    return $novo;
}

/*
* Método que converte array para json
* @return String json
*/
function array2json($array_dados, $json_dados)
{
    $json_dados->id = $array_dados['id'];
    $json_dados->poster = $array_dados['poster'];
    $json_dados->nome = $array_dados['nome'];
    $json_dados->data_nasc = $array_dados['data_de_lancamento'];
    $json_dados->resumo = $array_dados['resumo'];

    return $json_dados;
}

?>