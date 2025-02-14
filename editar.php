<?php 
require __DIR__.'/vendor/autoload.php';
define('TITLE','Editar Vaga');
use \App\Entity\Vaga;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit; 
}
$obVaga =Vaga::GetVaga($_GET['id']);
#echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;


//VALIDAR A VAGA
if (!$obVaga instanceof Vaga) {
  header('location: index.php?status=error');
  exit;
}

// Validação do POST
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])){
    
    // Criação do objeto Vaga
    
   
     //Atribuindo valores
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->atualizar();
    
    header('location: index.php?status=error');
  exit;
}

include __DIR__ . '/includes/header.php'; 
include __DIR__ . '/includes/formulario.php'; 
include __DIR__ . '/includes/footer.php';
?>
