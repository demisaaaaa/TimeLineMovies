<?php
require_once("database.class.php");

class Login{
    private $usuario;
    private $senha;
    private $login;

    public function __construct($usuario = 0, $senha = 0, $login=0){
        $this->setUsuario($usuario);
        $this->setSenha($senha);
        $this->setLogin($login);
    }

    public function setUsuario($novoUsuario){
        if ($novoUsuario == "")
        throw new Exception("Erro: Usuário inválido!");
    else
        $this-> usuario = $novoUsuario;
    }
    
    public function setSenha($novaSenha){
        if ($novaSenha == "")
        throw new Exception("Erro: Senha inválida!");
    else
        $this-> senha = $novaSenha;
    }
    public function setLogin($novoLogin){
        if ($novoLogin == "")
        throw new Exception("Erro: Login inválido!");
    else
        $this-> senha = $novoLogin;
    }

    public function getUsuario(){ return $this->usuario;}
    public function getSenha(){ return $this->senha;}
    public function getLogin(){ return $this->login;}

    public static function efetuarLogin($usuario, $senha, $login){
        $conexao = Database::getInstance();
        $sql = 'SELECT * FROM usuario
                WHERE email = :email
                AND senha = :senha';
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':usuario',$usuario);
        $comando->bindValue(':senha',$senha);
        $comando->bindValue(':login',$login);
        if ($comando->execute()){
            //var_dump("ffffffff");

            while($registro = $comando->fetch()){
                $login = new Login($registro['usuario'],$registro['senha'], $registro['login'] );
                $usuario = new Usuario($registro['id'],$registro['nome'],$registro['nascimento'],$registro['email'], $login);
                return $usuario;
            }
        }
        else 'false';
    }
   
}

