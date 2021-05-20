<?php
session_start();

include './classes/postagem.php';
include 'conexao.php';

if(count($_SESSION)==3){
	
	$titulo = $_POST["titulo"];
	$conteudo = $_POST["conteudo"];

	$novaPostagem=new Postagem($titulo,$conteudo,$_SESSION["cod_usuario"]);
	$novaPostagem->cadastrar($conexao);

	echo "Postagem cadastrada com sucesso!";
	echo "<a href='pages/postagens.php'>Postagens</a>";

}else{
	echo "Precisa fazer login pra criar postagens";
	echo "<a href='pages/login.html'>Fazer Login</a>";
}

