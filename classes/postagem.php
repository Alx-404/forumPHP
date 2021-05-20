<?php

//include '../conexao.php';

class Postagem{
    // Properties
    public $titulo;
    public $conteudo;
    public $cod_u;
    

    // Constructor
    function __construct($titulo,$conteudo,$cod_u) {
        $this->titulo = $titulo;
        $this->conteudo = $conteudo;
        $this->cod_u = $cod_u;
    }

    // Methods
    function cadastrar($conexao) {
        $sql = "INSERT INTO POSTAGEM(TITULO,CONTEUDO,COD_USUARIO) 
        VALUES('$this->titulo','$this->conteudo',$this->cod_u)";
        $insert = pg_query($conexao,$sql);
    }

    static function pegarPostagens($conexao){
        $sql = "SELECT * FROM POSTAGEM ORDER BY COD_POSTAGEM DESC";
        $insert = pg_query($conexao,$sql);
        return $insert;
    }
    
}

//$x=new Postagem('Primeira postagem.','Primeira postagem lorem ipsum lalalalalalaaaa',4);
//$x->cadastrar($conexao);