<?php 
require __DIR__.'/vendor/autoload.php';
use App\Entity\Vaga;
$vagas = Vaga::Getvagas();

include __DIR__ . '/includes/header.php'; 

// Exibir mensagem de sucesso, se houver
if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
    <div class="alert alert-success">
        Vaga excluída com sucesso!
    </div>
<?php endif; 

// Exibir mensagem de sucesso, se houver
if (isset($_GET['status']) && $_GET['status'] == 'successs'): ?>
    <div class="alert alert-success">
        Vaga cadastrada com sucesso!
    </div>
<?php endif; 
// Exibir mensagem de sucesso, se houver
if (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
    <div class="alert alert-success">
        Vaga editada com sucesso!
    </div>
<?php endif; 

include __DIR__ . '/includes/listagem.php'; 
include __DIR__ . '/includes/footer.php';
?>
