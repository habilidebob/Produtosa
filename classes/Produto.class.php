<?php
require_once('Banco.class.php');
class Produto{
    public $id;
    public $nome;
    public $preco;
    public $descricao;
    public $caminho_foto;
    public $id_categoria;
    public $id_usuario;

    public static function Listar(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM view_produtos";
        $comando = $banco->prepare($sql);
        $comando->execute();
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

        Banco::desconectar();

        return $resultado;
    }

}

?>