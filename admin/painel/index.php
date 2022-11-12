<?php
// Importar o arquivo sessao.php:
require('includes/sessao.php');
require('includes/cabecalho.php');
?>

<div class="container-fluid mt-6">
    <div class="row">
        <div class="col">
            <h1><?=$_SESSION['infos']['nome_completo'] ?></h1>
        </div>
    </div>
</div>


<?php

require('includes/rodape.php');
?>