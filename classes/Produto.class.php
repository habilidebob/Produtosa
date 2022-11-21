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

    public function Cadastrar(){
        $banco = Banco::conectar();
        $sql = "INSERT INTO produtos (nome, preco, descricao, caminho_foto, id_categoria, id_usuario) VALUES (?,?,?,?,?,?)";
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comando = $banco->prepare($sql);
        // Tratamento de erro:
        try{
            $comando->execute(array($this->nome, $this->preco, $this->descricao, $this->caminho_foto, $this->id_categoria, $this->id_usuario));
            Banco::desconectar();
            // Se der certo, devolve 1
            return 1;
        }catch(PDOException $e){
           // return $e->getCode(); 
           Banco::desconectar();
           // Se der errado, devolve 0:
           return 0;
        }
    }

    public function Apagar(){
        $banco = Banco::conectar();
        $sql = "DELETE FROM produtos WHERE id = ?";
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comando = $banco->prepare($sql);
        // Tratamento de erro:
        try{
            $comando->execute(array($this->id));
            Banco::desconectar();
            // Se der certo, devolve 1
            return 1;
        }catch(PDOException $e){
           // return $e->getCode(); 
           Banco::desconectar();
           // Se der errado, devolve 0:
           return 0;
        }
    }


}

?>