<?php 
require __DIR__.'/vendor/autoload.php';
use \App\Entity\Vaga;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit; 
}
$obVaga = Vaga::GetVaga($_GET['id']);

//VALIDAR A VAGA
if (!$obVaga instanceof Vaga) {
  header('location: index.php?status=error');
  exit;
}

// Validação do POST
if (isset($_POST['excluir'])) {
    // Excluir a vaga
    $obVaga->excluir();

    // Redirecionar para a página inicial com status=success
    header('location: index.php?status=success');
    exit;
}
print_r(__DIR__ . '/includes/header.php');
include __DIR__ . '/includes/header.php'; 
include __DIR__ . '/includes/confirmar-exclusao.php'; 
include __DIR__ . '/includes/footer.php';
?>
