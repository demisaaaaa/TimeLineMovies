<?php
require_once("../classes/Database.class.php");
require_once("../classes/login.class.php");
require_once("../ppo/fazendologin.php");
class Usuario{
   
    private $foto;
    private $nome; 
    private $nascimento;
    private $email;
    private $login; 

    public function __construct($foto="null", $nome = "null", $nascimento = "0", $email = "null", Login $login = null){
        $this->setFoto($foto); 
        $this->setNome($nome); 
        $this->setNascimento($nascimento);
        $this->setEmail($email);
        $this->setLogin($login);
    }
    public function setLogin(Login $login){
        $this->login = $login;
    }
    public function setFoto($novaFoto){
        if ($novaFoto == "")
            throw new Exception("Erro: Foto inválida!");
        else
            $this->nome = $novaFoto;
    }
    
    public function setNome($novoNome){
        if ($novoNome == "")
            throw new Exception("Erro: nome inválido!");
        else
            $this->nome = $novoNome;
    }
    public function setNascimento($novoNascimento){
        if ($novoNascimento == "")
            throw new Exception("Erro: Data de Nascimento inválido!");
        else
            $this->nascimento = $novoNascimento;
    }
    public function setEmail($novoEmail){
        if ($novoEmail == "")
            throw new Exception("Erro: E-mail inválido!");
        else
            $this->email = $novoEmail;
    }
   
    public function getFoto(){ return $this->foto; }
    public function getNome(){ return $this->nome; }
    public function getNascimento() { return $this->nascimento;}
    public function getEmail() { return $this->email;}
    public function getLogin() { return $this->login;}

    public function incluir(){
        
      //  $conexao = Database::getInstance(); 
        $sql = 'INSERT INTO tlm.usuario (foto, nome, nascimento,email, senha)   
                     VALUES (:foto, :nome, :nascimento, :email, :senha)';
       // $conexao->beginTransaction();
       // $comando = $conexao->prepare($sql);  
       $parametros = array( ':foto'=>$this->foto,
       ':nome'=>$this->nome,
       ':nascimento'=>$this->nascimento,
       ':email'=>$this->email,
       ':senha'=>$this->getLogin()->getSenha());
        
       Database::executar($sql, $parametros);
       $this->email->setIdusuario(Database::$lastId);
       $this->email->incluir();

    }    
    
    public function excluir(){
        
        $sql = 'DELETE 
                  FROM usuario
                 WHERE id = :id';
       $parametros =  array('nome' =>$this->nome);
        return Database::executar($sql,$parametros);
    }  

    public function alterar(){
        $conexao = Database::getInstance();
        $sql = 'UPDATE usuario
                   SET foto = :foto, nome = :nome, nascimento = :nascimento, email = :email, usuario = :usuario, senha = :senha
                 WHERE id = :id';
        $comando = $conexao->prepare($sql); 
        $comando->bindValue(':foto',$this->foto);
        $comando->bindValue(':nome',$this->nome);
        $comando->bindValue(':nascimento',$this->nascimento);
        $comando->bindValue(':email',$this->email);
        $comando->bindValue(':usuario',$this->login->getUsuario());
        $comando->bindValue(':senha',$this->login->getSenha());
        return $comando->execute();
    }    

    public static function listar($tipo = 0, $busca = "" ){
        $conexao = Database::getInstance();
       
        $sql = "SELECT * FROM usuario";        
        if ($tipo > 0 )
            switch($tipo){
                case 1: $sql .= " WHERE id = :busca"; break;
                case 2: $sql .= " WHERE nome like :busca"; $busca = "%{$busca}%"; break;
                case 3: $sql .= " WHERE nascimento like :busca";  $busca = "%{$busca}%";  break;
                case 4: $sql .= " WHERE email like :busca";  $busca = "%{$busca}%";  break;
            }
        $comando = $conexao->prepare($sql);      
        if ($tipo > 0 )
            $comando->bindValue(':busca',$busca); 
        $comando->execute(); 
        $Usuario = array();           
        while($registro = $comando->fetch()){   
            $login = new Login($registro['usuario'],$registro['senha'] );
            $usuarios = Usuario::listar(5,$registro['id'])[0];
            $usuario = new usuario($registro['id'], $registro['nome'],$registro['nascimento'],$registro['email'] , $login); 
            array_push($usuarios,$usuario); 
        }
        return $Usuario;  
    }    
}

?>