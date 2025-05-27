<?php
//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece conexão
$conexao = conectadb();

//Definição dos valores para inserção
$nome = "Matheus Felipe Leal";
$endereco = "Rua Tipora, 0413";
$telefone = "(41) 4002-8922";
$email = "matheus_fm_leal@uiiai.com";

//Prepara a consulta SQL usando 'prepare()' para evitar SQL Injection
$stmt = $conexao->prepare("INSERT INTO cliente (cli_nome, cli_endereco, cli_telefone, cli_email) VALUES (?,?,?,?)");

//Associa os parâmetros aos valores da consulta
//"ssss" é usado para proteger
$stmt->bind_param("ssss",$nome, $endereco, $telefone, $email);

//Executa a inserção
if ($stmt->execute()){
    echo "Cliente adicionado com sucesso!";
}else{
    echo "Erro ao adicionar cliente: " . $stmt->error;
}

//Fecha a consulta e a conexão com o banco de dados
$stmt->close();
$conexao->close();

?>