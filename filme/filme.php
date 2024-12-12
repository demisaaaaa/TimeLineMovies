<?php

require_once("../class/filme.class.php");

$id =  isset($_GET['id'])?$_GET['id']:0; 
$msg =  isset($_GET['MSG'])?$_GET['MSG']:""; 
if ($id > 0){
    $contato = Filme::listar(1,$id)[0]; 


}
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id= isset($_POST['id'])? $_POST['id']:0; 
        $nome = isset($_POST['nome'])? $_POST['nome']:""; 
        $lancamento= isset($_POST['lancamento'])? $_POST['lancamento']:0; 
        $protagonista =  isset($_POST['protagonista'])?$_POST['protagonista']:""; 
        $resumo =  isset($_POST['resumo'])?$_POST['resumo']:0; 
        $login =  isset($_POST['login'])?$_POST['login']:""; 
        $acao =  isset($_POST['acao'])?$_POST['acao']:0; 
     
        try{
            
            $filme = new Filme ($id,$nome,$lancamento,$protagonista, $resumo, $login);
                    
                $resultado = "";
                if($acao == 'salvar'){
                    if($id > 0)//alterando
                        // chamar o método para alterar um filme
                        $resultado = $filme->alterar();
                    else // inserindo                        
                        // chamar o método para incluir um filme
                        $resultado = $filme->incluir();
                }elseif ($acao == 'excluir'){
                    // chamar o método para exluir um filme
                    $resultado = $filme->excluir();
                }
                if ($resultado)
                    header('location: cad.filme.php');
                else
                    echo "erro ao inserir dados!";
     
    }  catch(Exception $e){
        header('location: cad.filme.php?MSG=Erro:'.$e->getMessage());
    }
 } elseif($_SERVER['REQUEST_METHOD'] == 'GET'){

    //  Listagem e Pesquisa
    $busca =  isset($_GET['busca'])?$_GET['busca']:0; // pegar busca
    $tipo =  isset($_GET['tipo'])?$_GET['tipo']:0; // pegar busca
    $lista = Filme::listar($tipo,$busca);
}
     

         
     ?>