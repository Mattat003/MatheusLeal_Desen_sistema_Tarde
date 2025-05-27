<?php
require_once 'conexao.php';

$conexao = conectarBanco();

//Obtendo o ID via GET
$pk_cli = $_GET['pk_cli'] ?? null;
$cliente = null;
$msgErro = "";

//Função local para buscar cliente por ID
function buscarClientePorId($pk_cli, $conexao){
    $stmt = $conexao->prepare("SELECT pk_cli, cli_nome, cli_endereco, cli_telefone, cli_email FROM cliente WHERE pk_cli = :pk_cli");
    $stmt->bindParam(":pk_cli", $pk_cli, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();
}

if ($pk_cli && is_numeric($pk_cli)){
    $cliente = buscarClientePorId($pk_cli, $conexao);

    if(!$cliente){
        $msgErro = "Erro: Cliente não encontrado.";
    }
}else {
    $msgErro = "Digite o ID do cliente para buscar os dados.";
}
?>

<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atualizar Cliente</title>
        <script>
            function habilitarEdicao(campo){
                document.getElementById(campo).removeAttribute("readonly");
            }
        </script>
    </head>
    <body>
        <h2>Atualizar Cliente</h2>

        <!--Se houver erro, exibe a mensagem e o campo de busca-->
        <?php if($msgErro): ?>
            <p style="color:red"><?=htmlspecialchars($msgErro)?></p>
            <form action="atualizarCliente.php" method="GET">
                <label for="pk_cli">ID do Cliente</label>
                <input type="number" id="pk_cli" name="pk_cli" required>
                <button type="submit">Buscar</button>
            </form>
        <?php else: ?>

            <!--Se um cliente foi encontrado, exibe o formulário preenchido-->
            <form action="processarAtualizacao.php" method="POST">
                <input type="hidden" name="pk_cli" value="<?=htmlspecialchars($cliente['pk_cli'])?>">

                <label for="nome">Nome:</label>
                <input type="text" id="cli_nome" name="cli_nome" value="<?=htmlspecialchars($cliente['cli_nome']) ?>" readonly
                onclick="habilitarEdicao('cli_nome')">

                <label for="nome">Endereço:</label>
                <input type="text" id="cli_endereco" name="cli_endereco" value="<?=htmlspecialchars($cliente['cli_endereco']) ?>" readonly
                onclick="habilitarEdicao('cli_endereco')">

                <label for="nome">Telefone:</label>
                <input type="text" id="cli_telefone" name="cli_telefone" value="<?=htmlspecialchars($cliente['cli_telefone']) ?>" readonly
                onclick="habilitarEdicao('cli_telefone')">

                <label for="nome">Email:</label>
                <input type="text" id="cli_email" name="cli_email" value="<?=htmlspecialchars($cliente['cli_email']) ?>" readonly
                onclick="habilitarEdicao('cli_email')">

                <button type="submit">Atualizar Cliente</button>
            </form>
        <?php endif; ?>
    </body>
</html>