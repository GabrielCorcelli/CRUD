<?php 
namespace App\Entity;
use App\Db\Database;
use \PDO;

class Vaga{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga está ativa ou não
     * @var string (s/n)
     */
    public $ativo;

    /**
     * Data de publicação da vaga
     * @var string
     */
    public $data;

    

   
    public function cadastrar(){
        if(isset($this->titulo) && isset($this->descricao) && isset($this->ativo)){
            $this->data=date('Y-m-d H:i:s');
            //INSERIR A VAGA NO BANCO
            $obDatabase= new Database('vagas');
           $this->id= $obDatabase->insert([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'ativo' => $this->ativo,
                'data' => $this->data
            ]);
        }
        

   

       
        //ATRIBUIR O ID DA VAGA NA INSTANCIA
        //RETORNAR SUCESSO
        

    }

    public function atualizar(){
        return (new Database('vagas'))->update('id ='.$this->id,[
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data
        ]);
    }

    public function excluir(){
        return (new Database('vagas'))->delete('id = '.$this->id);
    }
    /**
     * Método resposáevl por obter as vagas dentro do banco de dados
     */
    public static function Getvagas($where=null,$order=null,$limit=null){
        return (new Database('vagas'))->select($where,$order,$limit)
                                                ->fetchAll(PDO::FETCH_CLASS,self::class);

    }
    /**
     * método responsável por buscar  uma vaga com base no seu id
     */
    public static function GetVaga($id){
        return (new Database('vagas'))->select('id='.$id)
                                                    ->fetchObject(self::class);

    }
}
?>