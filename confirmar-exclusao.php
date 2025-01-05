<main>

    <h3 class="mt-3">Excluir Vaga</h3>

    <form method="POST">
        <div class="form-group">
            <p>Você deseja realmente excluir essa vaga? <strong><?=$obVaga->titulo?></strong> </p>
        </div>


        

    <div class="form-group">
    <a href="index.php">
        <button class="btn btn-success" type="button">Cancelar</button>
    </a>
        <button type="submit" class="btn btn-danger" name="excluir">Exlcuir</button>
    </div>

    </form>
</main>