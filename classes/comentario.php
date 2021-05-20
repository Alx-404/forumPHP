<?php

//include '../conexao.php';

class Comentario{
	public $cod_postagem;
	public $cod_usuario;
	public $conteudo;

	function __construct($conteudo,$cod_usuario,$cod_postagem){
		$this->conteudo=$conteudo;
		$this->cod_usuario=$cod_usuario;
		$this->cod_postagem=$cod_postagem;
	}

	function cadastrar($conexao){
		$sql = "INSERT INTO COMENTARIO(COD_USUARIO,COD_POSTAGEM,COMENTARIO) 
        VALUES($this->cod_usuario,$this->cod_postagem,'$this->conteudo')";
        $insert = pg_query($conexao,$sql);
	}

	static function pegarComentarios($conexao,$cod_postagem){
		$sql = "SELECT * FROM COMENTARIO WHERE COD_POSTAGEM=$cod_postagem ORDER BY COD_COMENTARIO ASC";
		$insert = pg_query($conexao,$sql);
		return $insert;
	}
}

//$x=new Comentario('A SIMPLE COMMENT',5,1);
//$x->cadastrar($conexao);