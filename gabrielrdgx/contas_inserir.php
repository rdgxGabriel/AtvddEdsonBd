<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Despesas</title>
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <?php
    require "menu.php"; // Importa o menu do sistema de Controle de Despesas
    ?>
    <div id="cadastro">
        <h3>CADASTRO DE CONTA</h3>
        <form name="cadastro" method="post" action="">
            <table>
                <tr>
                    <td><label for="codigo_cliente">Código do Cliente:</label></td>
                    <td><input type="text" name="codigo_cliente" size="5" maxlength="5" required>
                </tr>
                <tr>
                    <td><label for="date">Data do Cadastro:</label></td>
                    <td><input type="date" name="data" required>
                </tr>
                <tr>
                    <td><label for="historico">Histórico:</label></td>
                    <td><input type="text" name="historico" size="40" maxlength="40" required>
                </tr>
                <tr>
                    <td><label for="valor">Valor:</label></td>
                    <td><input type="text" name="valor" size="15" maxlength="15" required>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="cadastrar" value="Cadastrar">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST["cadastrar"])) {
    
            $codigo_cliente = $_POST["codigo_cliente"];
            $data           = $_POST["data"];
            $historico      = $_POST["historico"];
            $valor          = $_POST["valor"];
 
            require "conexao.php";
            $sql = "INSERT INTO contas(lancamento, codigo_cliente, data, historico, valor)";
            $sql .= " VALUES (null, '$codigo_cliente', '$data', '$historico', '$valor')";
            mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            echo "<script type =\"text/javascript\">alert('Conta cadastrada com sucesso!');</script>";
            echo "<p align='center'><a href='home.php'>Voltar</a></p>";
        }
        ?>
    </div>
</body>

</html>