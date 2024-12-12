<?php

require_once("../classes/usuario.class.php");

$id =  isset($_GET['id'])?$_GET['id']:0; 
$msg =  isset($_GET['MSG'])?$_GET['MSG']:""; 
if ($id > 0){
    $contato = Usuario::listar(1,$id)[0]; 
}
//nome String,
//email String,
//senha String
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id= isset($_POST['id'])? $_POST['id']:0; 
        $foto = isset($_POST['foto'])? $_POST['foto']:""; 
        $nome= isset($_POST['nome'])? $_POST['nome']:""; 
        $email = isset($_POST['email'])? $_POST['email']:"";
        $nascimento = isset($_POST['nascimento'])? $_POST['nascimento']:"";  
        $senha= isset($_POST['senha'])? $_POST['senha']:""; 
        $acao =  isset($_POST['acao'])?$_POST['acao']:0; 
     
        try{
                    $login= new Login($email,$senha);
                    $usuario = new Usuario($foto, $nome,$nascimento ,$email,$login);
                    
                $resultado = "";
                if($acao == 'salvar'){
                    if($id > 0)//alterando
                        // chamar o método para alterar um autor
                        $resultado = $usuario->alterar();
                    else // inserindo                        
                        // chamar o método para incluir um usuario
                        $resultado = $usuario->incluir();
                }elseif ($acao == 'excluir'){
                    // chamar o método para exluir um usuario
                    $resultado = $usuario->excluir();
                }
                

                if ($resultado)
                    header('location: cad.usuario.php');
                else
                    echo "erro ao inserir dados!";
     
    }  catch(Exception $e){
        header('location: cad.usuario.php.php?MSG=Erro:'.$e->getMessage());
    }
 } elseif($_SERVER['REQUEST_METHOD'] == 'GET'){

    //  Listagem e Pesquisa
    $busca =  isset($_GET['busca'])?$_GET['busca']:0; // pegar busca
    $tipo =  isset($_GET['tipo'])?$_GET['tipo']:0; // pegar busca
    $lista = Usuario::listar($tipo,$busca);
}
     

         
     ?>