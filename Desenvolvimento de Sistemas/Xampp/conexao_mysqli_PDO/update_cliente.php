<?php
//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece conexão
$conexao = conectadb();

//Define os novos valores
$nome = "Maria Oliveira";     
$endereco = "Rua Charabai, 352";
$telefone = "(11) 96472-1844";
$email = "maria.oliveira@gmail.com";
//('Maria Oliveira', 'Av. Paulista, 456', '(11) 99876-5432', 'maria.oliveira@email.com')

//Define o ID do cliente a ser atualizado
$pk_cli = 2;

//Prepara a consulta SQL segura
$stmt = $conexao->prepare("UPDATE cliente SET cli_nome = ?, cli_endereco = ?, cli_telefone = ?, cli_email = ? WHERE pk_cli = ?");

//Associa os parâmetros aos valores da consulta
$stmt->bind_param("ssssi",$nome, $endereco, $telefone, $email, $pk_cli);

//Executa a atualização
if ($stmt->execute()){
    echo "Cliente atualizado com sucesso!";
}else{
    echo "Erro ao atualizar cliente: " . $stmt->error;
}

//Fecha a consulta e a conexão com o banco de dados
$stmt->close();
$conexao->close();
?>