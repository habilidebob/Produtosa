<?php
// Importar o arquivo sessao.php:
require('includes/sessao.php');
require('includes/cabecalho.php');

// Verificar se a página está sendo carregada por POST:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../classes/Usuario.class.php');
    $usuario = new Usuario();
    $usuario->nome_completo = $_POST['nomeUsuario'];
    $usuario->email = $_POST['emailUsuario'];
    $usuario->id = $_SESSION['infos']['id'];

    // Verificar se a pessoa QUER trocar a senha:
    if($_POST['senhaUsuario'] != "" || $_POST['novaSenhaUsuario'] != ""
    && $_POST['novaSenhaUsuario1'] != ""){
        // Verificar se a senha atual está correta:
        if(hash("sha256", $_POST['senhaUsuario']) == $_SESSION['infos']['senha']){
            // Verificar se as novas senhas são iguais:
            if($_POST['novaSenhaUsuario'] == $_POST['novaSenhaUsuario1']
            && strlen($_POST['novaSenhaUsuario1'])>0){
                // Trocar a senha:

                // Atribuir a senha no atributo:
                $usuario->senha = $_POST['novaSenhaUsuario'];
                if($usuario->Editar() == 1){
                    $sucesso = "Suas informações foram modificadas!";
                    $_SESSION['infos']['senha'] = hash('sha256',$usuario->senha);
                }else{
                    $erro = "Houve um problema ao modificar seus dados";
                }
            }else{
                $erro = "As senhas não conferem";
            }
        }else{
            $erro = "Senha atual inválida!";
        }
    }else{
        if($usuario->Editar() == 1){
            $sucesso = "Suas informações foram modificadas!";

        }else{
            $erro = "Houve um problema ao modificar seus dados";
        }
    }
    if($sucesso != ""){
        // Atualizar as informações do SESSION:
        $_SESSION['infos']['nome_completo'] = $usuario->nome_completo;
        $_SESSION['infos']['email'] = $usuario->email;
    }
}


?>


<div class="container">
    <div class="row mt-5">
        <div class="col-4">
            <img class="rounded" src="static/perfil.png">
        </div>
        <div class="col-8">
            <h1 class="display-3">Seu Perfil</h1>
            <form action="perfil.php" method="POST">
                <div class="mb-3">
                    <label for="nomeUsuario" class="form-label">Nome:</label>
                    <input type="text" value="<?= $_SESSION['infos']['nome_completo'] ?>" class="form-control" name="nomeUsuario" id="nomeUsuario">
                </div>
                <div class="mb-3">
                    <label for="emailUsuario" class="form-label">Email:</label>
                    <input type="text" value="<?= $_SESSION['infos']['email'] ?>" class="form-control" name="emailUsuario" id="emailUsuario">
                </div>
                <div class="mb-3">
                    <label for="senhaUsuario" class="form-label">Senha atual:</label>
                    <input type="password" class="form-control" name="senhaUsuario" id="senhaUsuario">
                </div>
                <div class="mb-3">
                    <label for="novaSenhaUsuario" class="form-label">Nova senha:</label>
                    <input type="password" class="form-control" name="novaSenhaUsuario" id="novaSenhaUsuario">
                </div>
                <div class="mb-3">
                    <label for="novaSenhaUsuario1" class="form-label">Reptir nova senha:</label>
                    <input type="password" class="form-control" name="novaSenhaUsuario1" id="novaSenhaUsuario1">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-success" type="submit">Alterar Informações</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

require('includes/rodape.php');
?>