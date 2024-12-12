<?php 
/*
* Método que salva os dados no formato json no arquivo em disco
* @param $dados String dados codificados no formato json
* @param $arquivo String nome do arquivo onde serão salvos os dados
* @return void
*/
function salvar_json($dados, $arquivo)
{
    $fp = fopen($arquivo, "w");
    fwrite($fp, $dados);
    fclose($fp);
}
/*
* Método que lê os dados no formato json do arquivo em disco
* @param $arquivo String nome do arquivo onde serão salvos os dados
* @return String dados codificados no formato json
*/
function ler_json($arquivo)
{
    $arquivo = file_get_contents($arquivo);
    $json = json_decode($arquivo);
    return $json;
}
?>