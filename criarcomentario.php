<?php
include './classes/comentario.php';
include 'conexao.php';

if(isset($_POST['comentario'],$_POST['cod_usuario'],$_POST['cod_postagem'])){
	$comentario=$_POST['comentario'];
	$cod_usuario=$_POST['cod_usuario'];
	$cod_postagem=$_POST['cod_postagem'];

	$novoComentario = new Comentario($comentario,$cod_usuario,$cod_postagem);
	$novoComentario->cadastrar($conexao);

	echo "Comentario cadastrado com sucesso! ";
	echo "<a href='pages/postagens.php'>Postagens</a>";
}else{
	echo "Você precisa logar primeiro >> ";
	echo "<a href='pages/login.html'>Login</a>";
}