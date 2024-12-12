<?php
require_once("Database.class.php");
require_once("login.class.php");

class filme{
   
    private $nome; 
    private $lancamento;
    private $protagonista;
    private $resumo;
    private $login; 

    public function __construct($nome = "null", $lancamento = "0", $protagonista = "null", $resumo ="null", Login $login = null){
        $this->setNome($nome); 
        $this->setLancamento($lancamento);
        $this->setProtagonista($protagonista);
        $this->setResumo($resumo); 
        $this->setLogin($login);
    }
    public function setLogin(Login $login){
        $this->login = $login;
    }

    public function setNome($novoNome){
        if ($novoNome == "")
            throw new Exception("Erro: nome inválido!");
        else
            $this->nome = $novoNome;
    }
    public function setLancamento($novoLancamento){
        if ($novoLancamento == "")
            throw new Exception("Erro: Data de Lançamento inválido!");
        else
            $this->lancamento = $novoLancamento;
    }
    public function setProtagonista($novoProtagonista){
        if ($novoProtagonista == "")
            throw new Exception("Erro: Protagonista inválido!");
        else
            $this->protagonista = $novoProtagonista;
    }
    public function setResumo($novoResumo){
        if ($novoResumo == "")
            throw new Exception("Erro:Resumo inválido!");
        else
            $this->resumo = $novoResumo;
    }

    public function getNome(){ return $this->nome; }
    public function getLancamento() { return $this->lancamento;}
    public function getProtagonista() { return $this->protagonista;}
    public function getResumo(){ return $this->resumo; }
    public function getLogin() { return $this->login;}

    public function incluir(){
        
      //  $conexao = Database::getInstance(); 
        $sql = 'INSERT INTO filme (nome, lancamento,protagonista, usuario, senha)   
                     VALUES (:nome, :lancamento, :protagonista :usuario, :senha)';
       // $conexao->beginTransaction();
       // $comando = $conexao->prepare($sql);  
       $parametros = array(':nome'=>$this->nome,
       ':lancamento'=>$this->lancamento,
       ':protagonista'=>$this->protagonista,
       ':senha'=>$this->getLogin()->getSenha(),
       ':usuario'=>$this->getLogin()->getUsuario());
    
       Database::executar($sql, $parametros);
       $this->protagonista->setIdusuario(Database::$lastId);
       $this->protagonista->incluir();

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
        $sql = 'UPDATE filme 
                   SET nome = :nome, lancamento = :lancamento, protagonista = :protagonista, resumo = :resumo, usuario = :usuario, senha = :senha
                 WHERE id = :id';
        $comando = $conexao->prepare($sql); 
        $comando->bindValue(':nome',$this->nome);
        $comando->bindValue(':lancamento',$this->lancamento);
        $comando->bindValue(':protagonista',$this->protagonista);
        $comando->bindValue(':resumo',$this->resumo);
        $comando->bindValue(':usuario',$this->login->getUsuario());
        $comando->bindValue(':senha',$this->login->getSenha());
        return $comando->execute();
    }    

    public static function listar($tipo = 0, $busca = "" ){
        $conexao = Database::getInstance();
       
        $sql = "SELECT * FROM filme";        
        if ($tipo > 0 )
            switch($tipo){
                case 1: $sql .= " WHERE id = :busca"; break;
                case 2: $sql .= " WHERE nome like :busca"; $busca = "%{$busca}%"; break;
                case 3: $sql .= " WHERE lancamento like :busca";  $busca = "%{$busca}%";  break;
            }
        $comando = $conexao->prepare($sql);      
        if ($tipo > 0 )
            $comando->bindValue(':busca',$busca); 
        $comando->execute(); 
        $filmes = array();           
        while($registro = $comando->fetch()){   
            $login = new Login($registro['usuario'],$registro['senha'] );
            $filmes = filme::listar(5,$registro['id'])[0];
            $filme = new filme($registro['id'],$registro['nome'],$registro['lancamento'],$registro['resumo'],$login); 
            array_push($filmes,$filme); 
        }
        return $filmes;  
    }    
}

?>