<?php 
require __DIR__.'/vendor/autoload.php';
use \App\Entity\Vaga;


// Validação do POST
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])){
    
    // Criação do objeto Vaga
    
   $obVaga = new Vaga;

     //Atribuindo valores
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->cadastrar();
    
}

include __DIR__ . '/includes/header.php'; 
include __DIR__ . '/includes/formulario.php'; 
include __DIR__ . '/includes/footer.php';
?>
