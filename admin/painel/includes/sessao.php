<?php
session_start();
// Verificar se o usuário não está logado:
if(!isset($_SESSION['infos'])){
  // Retornar o usuário para a tela de login:
  header("Location: ../index.php?erro=3");
  exit();
}

?>