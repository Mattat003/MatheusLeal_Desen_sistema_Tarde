<?php
//Hbilita relatório detalhado de erros no MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/**
 * Função para conectar ao banco de dados
 * Retorna um objeto de conexão MySQLi ou interrompe o script em caso de erro.
 */
function conectadb(){
    //Configuração do banco de dados
    $endereco = "localhost:3307"; //Endereço do servidor MySQL
    $usuario = "root"; //Nome de usuário do banco
    $senha = "root"; //Senha do Banco de Dados
    $banco = "empresa"; //Nome do Banco de Dados

    try {
        //Criação da conexão
        $con = new mysqli($endereco, $usuario, $senha, $banco);

        //Definição do conjunto de caracteres para evitar problema de acentuação
        $con->set_charset("utf8mb4"); //Retorna o objeto de conexão
        return $con;
    }catch (Exception $e){
        //Exibe uma mensagem de erro e encerra o script
        die("Erro na conexão: " . $e->getMessage());
    }
}

?>