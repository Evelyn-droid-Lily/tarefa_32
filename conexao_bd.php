<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bd = "projeto";

// Criando nova conexão 
global $conexao;
$conexao = mysqli_connect($servidor, $usuario, $senha, $bd);
// Verificar a conexão 
if (!$conexao) {
    die("Falha na conexão" . mysqli_connect_error());
}
