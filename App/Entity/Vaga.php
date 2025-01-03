<?php 
namespace App\Entity;
use App\Db\Database;

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
        //DEFINIR A DATA
        $this->data=date('Y-m-d H:i:s');
        //INSERIR A VAGA NO BANCO
        $obDatabase= new Database('vagas');
       $this->id= $obDatabase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data
        ]);

        echo "<pre>"; print_r($this);echo"</pre>"; exit;
        //ATRIBUIR O ID DA VAGA NA INSTANCIA
        //RETORNAR SUCESSO
        

    }
}
?>
