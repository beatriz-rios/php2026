<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="./css/tabConsul.css">
</head>

<body>
<h1>Consulta de Cadastro</h1>
    <nav>
        <ul>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="alteracao.php">Alterar</a></li>
            <li><a href="consulta.php">Consultar</a></li>
            <li><a href="exclusao.php">Excluir</a></li>
        </ul>
    </nav>



    <?php
    include "conectar.php";

    $sql = "SELECT * FROM cadastro";
    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        echo "<div class='mensagem erro'>Erro ao retornar dados: " . mysqli_error($conn) . "</div>";
    } else {
        echo '<table id="tabela">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID Cadastro</th>';
        echo '<th>Nome</th>';
        echo '<th>Sobrenome</th>';
        echo '<th>Celular</th>';
        echo '<th>RG</th>';
        echo '<th>CPF</th>';
        echo '<th>Nacionalidade</th>';
        echo '<th>Estado Civil</th>';
        echo '<th>Nome Pai</th>';
        echo '<th>Nome Mãe</th>';
        echo '<th>Endereço</th>';
        echo '<th>Data de Nascimento</th>';
        echo '<th>Idade</th>';
        echo '<th>Endereço</th>';
        echo '<th>Bairro</th>';
        echo '<th>Cidade</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Loop para exibir todos os registros
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($linha['idcadastro']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['nome']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['sobrenome']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['celular']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['rg']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cpf']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['nacionalidade']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['estado_civil']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['paternidade']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['maternidade']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['dataNascimento']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['idade']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['endereco']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['bairro']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['cidade']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        mysqli_free_result($resultado);
    }
    ?>
</body>

</html>