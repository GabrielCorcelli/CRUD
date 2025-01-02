<?php 
namespace App\Db;
use \PDO;
use PDOException;

class Database{
    Const HOST = 'localhost';
    const NAME = 'corcelli_vagas';
    const USER = 'root';
    const PASS = '';
    
    /**
     * nome da tabela a ser manipulada
     */
    private $table;
    
    /**
     * @var PDO
     */
    private $connection;

    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Método responsável por executar as queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;  // Retorna o statement com sucesso
        } catch (PDOException $e) {
            error_log("Erro na execução da consulta: " . $e->getMessage(), 3, '/path/to/error_log.txt');
            die('Erro ao executar a consulta.'); 
        }
    }

    /**
     * Método responsável por inserir dados no banco de dados
     * @param array $values
     * @return integer
     */
    public function insert($values){
        // DADOS DA QUERY

        $fields = array_keys($values);   // Obtém as chaves do array (nomes das colunas)
        $binds = array_pad([], count($fields), '?');  // Cria os binds (?, ?, ...)

        // Prepara a query de inserção
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        // Executa a query passando os valores
        $this->execute($query, array_values($values)); 

        // Retorna o último ID inserido
        return $this->connection->lastInsertId();
    }
}
?>
