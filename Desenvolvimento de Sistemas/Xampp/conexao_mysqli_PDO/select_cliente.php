<?php
//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece conexão
$conexao = conectadb();

//Define a consulta SQL para buscar clientes
$sql = "SELECT pk_cli, cli_nome, cli_email FROM cliente";

//Executa a consulta no banco
$result = $conexao->query($sql);

//Verifica se há registros retornados
if ($result->num_rows > 0) {
    //Itera sobre os resultados e exibe cada cliente encontrado
    while ($linha = $result->fetch_assoc()){
        echo "ID: " . $linha["pk_cli"] . " - Nome: " . $linha["cli_nome"] . " - Email: " . $linha["cli_email"] . "<br/>";
    }
}else {
    //Caso nenhum resultado seja encontrado
    echo "Nenhum cliente cadastrado.";
}

//Fecha a conexão
$conexao->close();
?>