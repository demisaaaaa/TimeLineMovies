<?php
$configPath = realpath(dirname(__FILE__) . '/../config/config.inc.php');
if (!file_exists($configPath)) {
    die("Erro: Arquivo de configuração 'config.inc.php' não encontrado.");
}
require_once($configPath);

class Database{
    //private $conexao;
    static public $lastId;

    public static function getInstance(){
        try{ 
            return new PDO(DSN, USUARIO, SENHA);
        }catch(PDOException $e){
            echo "erro ao conectar ao banco de dados: ". $e->getMessage();
        }
    }
    public static function conectar(){
        return Database::getInstance();
    }
    public static function preparar($conexao,$sql){
        return $conexao->prepare($sql);
    }
    
    public static function vincular($comando,$parametros){
        return $comando->vincular($parametros);
    }
    public static function executar($sql,$parametros = array()){
        $conexao = self::conectar();
        
        $comando = self::preparar($conexao,$sql);
        $comando = self::vincular($comando, $parametros);
        try {
            $comando->execute();
            self::$lastId = $conexao->lastInsertId();
            
            return true;
        }catch(PDOException $e){
            throw new Exception ("Erro ao executar o comando no banco de dados: "
               .$e->getMessage()." - ".$comando->errorInfo()[2]);
        }
    }
}
