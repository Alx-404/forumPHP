<?php

$servidor = "localhost";
$porta = 5432;
$bancoDeDados = "forum";
$usuario = "postgres";
$senha = "12345";

$conexao = pg_connect("host=$servidor port=$porta dbname=$bancoDeDados user=$usuario password=$senha") or
die ("Não foi possível conectar ao servidor PostGreSQL");


