<?php
// Importar o arquivo sessao.php:
require('includes/sessao.php');
require('includes/cabecalho.php');

?>
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <h1 class="display-4">Modificar Produto</h1>
        </div>
    </div>
    <div class="row">
        <div class="col mw-80">
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nomeProduto" class="form-label">Nome: </label>
                    <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" aria-describedby="produtoHelp">
                    <div id="produtoHelp" class="form-text">Nome do produto que aparecerá no sistema.</div>
                </div>
                <div class="mb-3">
                    <label for="precoProduto" class="form-label">Preço: </label>
                    <input type="number" step=".01" class="form-control" id="precoProduto" name="precoProduto" aria-describedby="precoHelp">
                </div>
                <div class="mb-3">
                    <label for="descricaoProduto" class="form-label">Descricao: </label>
                    <textarea class="form-control" id="descricaoProduto" name="descricaoProduto" aria-describedby="descricaoHelp"></textarea>
                    <div id="descricaoHelp" class="form-text">A descrição do produto que será exibida logo após a imagem na página inicial.</div>
                </div>
                <div class="mb-3">
                    <label for="fotoProduto" class="form-label">Foto: </label>
                    <input type="file" class="form-control" id="fotoProduto" name="fotoProduto" aria-describedby="fotoHelp"></textarea>
                    <div id="fotoHelp" class="form-text">Arquivo em jpg ou png que representará o produto no sistema.</div>
                </div>
                <div class="mb-3">
                    <label for="categoriaProduto" class="form-label">Categoria: </label>
                    <select class="form-select" aria-label="Default select example" id="categoriaProduto" name="categoriaProduto">
                        <option selected>Escolha a categoria</option>
                        <!-- Os campos abaixo deverão ser populados automaticamente com PHP: -->
                        <option value="1">Categoria 1</option>
                    </select>
                </div>
                <!-- Campo "oculto" -->
                <input type="hidden" name="operacao" value="2">
                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </div>
    </div>
</div>

<?php

require('includes/rodape.php');
?>