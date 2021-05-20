<?php

include "conexao.php";
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql=" SELECT * FROM USUARIO WHERE EMAIL='$email' ";
$result=pg_query($conexao,$sql);

if  (!$result) {
   echo "query did not execute";
}
if (pg_num_rows($result) == 0) {
	echo "Usuario não encontrado";
}
else {
	$array=pg_fetch_array($result);

	if(password_verify ( $senha , $array['senha'] )){

		$_SESSION["nome_usuario"] = $array['nome'];
		$_SESSION["email_usuario"] = $array['email'];
		$_SESSION["cod_usuario"] = $array['cod_usuario'];

		echo "Login efetuado com sucesso!<a href='pages/postagens.php'>Postagens</a>";	
	}
	else{
		// destroy the session
		session_destroy();
		echo "Senha incorreta!<a href='pages/login.html'>Voltar</a>";
	}	
}






