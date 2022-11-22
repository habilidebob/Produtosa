<?php

require_once('../includes/sessao.php');
if(!isset($_GET['id'])){
    echo "ID não setado!";
}else{
    // Processar a remoção:
    require_once('../../../classes/Produto.class.php');
    $produto = new Produto();
    $produto->id = $_GET['id'];

    if($produto->Apagar() > 0){
        header("Location: ../index.php?msg=2");
        exit();
    }else{
        header("Location: ../index.php?msg=0");
        exit();
    }
}
?>