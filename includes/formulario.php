<main>
<section>
    <a href="index.php">
        <button class="btn btn-success">Voltar</button>
    </a>
</section>
    <h3 class="mt-3">adastrar vaga</h3>

    <form method="POST">
        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo">
        </div>


        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>

        <div class="form-group">
    <label>Status</label>
    <div>
        <div class="form-check form-check-inline">
            <label>
                <input type="radio" name="ativo" value="s"> Ativo
            </label>
        </div>
    </div>

    <div>
        <div class="form-check form-check-inline">
            <label>
                <input type="radio" name="inativo" value="n"> Inativo
            </label>
        </div>
    </div>
</div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>

    </form>
</main>