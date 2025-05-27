<?php
//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece conexão
$conexao = conectadb();

//Define o ID do cliente a ser excluído
$pk_cli = 4;

//Prepara a consulta SQL segura
$stmt = $conexao->prepare("DELETE FROM cliente WHERE pk_cli = ?");

//Associa os parâmetros aos valores da consulta
$stmt->bind_param("i",$pk_cli);

//Executa o delete
if ($stmt->execute()){
    echo "Cliente apagado com sucesso!";
}else{
    echo "Erro ao apagar cliente: " . $stmt->error;
}

//Fecha a consulta e a conexão com o banco de dados
$stmt->close();
$conexao->close();
?>