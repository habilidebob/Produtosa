<?php

require('Banco.class.php');

class Usuario{
    public $id;
    public $nome_completo;
    public $email;
    public $senha;

    // Métodos:
    public function ValidarLogin(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $comando = $banco->prepare($sql);
        // Subtituir as interrogações por valores:
        $comando->execute(array($this->email, hash('sha256',$this->senha)));
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

        Banco::desconectar();

        return $resultado;
    }
}

?>