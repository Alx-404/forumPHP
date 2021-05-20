<?php

//include '../conexao.php';

class Usuario{
    // Properties
    public $nome;
    public $email;
    public $senha;

    // Constructor
    function __construct($nome,$email,$senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    // Methods
    function cadastrar($conexao) {

        $hash = password_hash($this->senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO USUARIO(NOME,EMAIL,SENHA) VALUES('$this->nome','$this->email','$hash')";
        $insert = pg_query($conexao,$sql);
    }
    function get_name() {
      return $this->name;
    }
}
//$x=new Usuario('Alexander R.','alex@gmail.com','macacoprego');
//$x->cadastrar($conexao);