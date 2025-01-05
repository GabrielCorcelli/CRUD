<?php 
require __DIR__.'/vendor/autoload.php';
define('TITLE', 'Cadastrar Vaga');
use \App\Entity\Vaga;

// Verificar se $obVaga está definido; caso contrário, criar um novo objeto.
$obVaga = $obVaga ?? new Vaga;

// Validação do POST
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
  // Criação do objeto Vaga
  $obVaga = new Vaga;

  // Atribuindo valores
  $obVaga->titulo = $_POST['titulo'];
  $obVaga->descricao = $_POST['descricao'];
  $obVaga->ativo = $_POST['ativo'];

  // Cadastrar a vaga
  $obVaga->cadastrar();

  // Redirecionar o usuário após o cadastro
  header('Location: index.php?status=successs');
  exit;
}


// Incluir os arquivos de template
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';

?>
