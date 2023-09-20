<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Despesas - Editar</title>
    <link rel="stylesheet" href="estilos_menu.css">
    <link rel="stylesheet" href="estilos_formulario.css">
</head>
<body>
    <?php
        require "menu.php";

        echo "<h3>Editar Cadastro de Contas</h3>";
        
        require "conexao.php";
        $lancamento = $_REQUEST["lancamento"];
        $sql = "SELECT * FROM contas WHERE lancamento='$lancamento'";
        $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        $linha = mysqli_fetch_array($resultado);

        $lancamento = $linha["lancamento"];
        $codigo_cliente = $linha["codigo_cliente"];
        $data = $linha["data"];
        $historico = $linha["historico"];
        $valor = $linha["valor"];

        echo "<form name='cadastro' method='post' action=''>";
            echo "<table align='center'>";
                echo "<tr>";
                    echo "<td><label for='lancamento'>Lançamento:</label></td>";
                    echo "<td><input type='text' name='lancamento' size='4' value='$lancamento' readonly></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><label for='codigo_cliente'>Código do Clinte:</label></td>";
                    echo "<td><input type='text' name='codigo_cliente' size='50' maxlegth='50' value='$codigo_cliente' required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><label for='data'>Data:</label></td>";
                    echo "<td><input type='date' name='data' size='30' maxlegth='30' value='$data' required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><label for='historico'> Histórico:</label></td>";
                    echo "<td><input type='text' name='historico' size='14' maxlegth='14' value='$historico' required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td><label for='valor'>Valor:</label></td>";
                    echo "<td><input type='text' name='valor' size='30' maxlegth='30' value='$valor' required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan='2' align='center'><input type='submit' name='salvar' value='Salvar'></td>";
                echo "</tr>";
            echo "</table>";
        echo "</form>";

        if (isset($_POST["salvar"])) {
            $lancamento = $_POST["lancamento"];
            $codigo_cliente = $_POST["codigo_cliente"];
            $data = $_POST["data"];
            $historico = $_POST["historico"];
            $valor = $_POST["valor"];

            require "conexao.php";
            $sql = "UPDATE contas SET lancamento='$lancamento', codigo_cliente='$codigo_cliente', data='$data', historico='$historico', valor='$valor' WHERE lancamento='$lancamento'";
            mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            echo "<script type =\"text/javascript\">alert('Cliente editado com sucesso!');</script>";
            echo "<p align='center'><a href='home.php'>Voltar</a></p>";
        }
    ?>
</body>
</html>