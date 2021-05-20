<?php

include './classes/usuario.php';
include 'conexao.php';

try {
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $confirma=$_POST['confirmarsenha'];

    if($senha==$confirma){
        $novoUsuario=new Usuario($nome,$email,$senha);
        $novoUsuario->cadastrar($conexao);

        echo "CADASTRO REALIZADO!";
        
    }else{
        echo "Senhas diferentes...Tente novamente";
    }

   
} catch (Exception $e) {
    echo 'Não foi possível cadastrar',  $e->getMessage(), "\n";
}

echo "<a href='pages/login.html'>Voltar</a>";
