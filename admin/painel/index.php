<?php
// Importar o arquivo sessao.php:
require('includes/sessao.php');
require('includes/cabecalho.php');
?>

<div class="container ">
    <div class="row mt-5">
        <div class="col">
            <h2>Olá <?=$_SESSION['infos']['nome_completo'] ?>!</h2>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-3">
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalCategoria"><i class="bi bi-plus-square"></i> Categorias</button>
            </div>
        </div>
        <div class="col-4">
            <div class="d-grid gap-2">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalCadastro"><i class="bi bi-plus-square"></i> Produto</button>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Preco</th>
                <th scope="col">Descrição</th>
                <th scope="col">Categoria</th>
                <th scope="col">Usuário</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="https://i.imgur.com/Otno8c7.png" width="50px"></td>
                    <td>Nome do Produto</td>
                    <td>R$ X.xx</td>
                    <td>Aqui encontramos as informações do produto.</td>
                    <td>Alimentação</td>
                    <td>Jorjão Pimpão</td>
                    <td>
                        <div class="d-grid gap-2">
                            <button class="btn btn-danger btn-sm" type="button"><i class="bi bi-x-circle-fill"></i></button>
                            <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-pencil-square"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Aqui ficarão as modais: -->

<!-- Modal Produto -->
<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastro" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalCadastro">Cadastrar Produto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Categoria-->
<div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="modalCategoria" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalCategoria">Cadastrar Categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div>

<?php

require('includes/rodape.php');
?>