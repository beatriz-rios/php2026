<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="./css/tabConsul.css">
</head>

<body>
    <h1>Consulta de Pedidos</h1>
    <nav>
        <ul>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="alteracao.php">Alterar</a></li>
            <li><a href="consulta.php">Consultar</a></li>
            <li><a href="exclusao.php">Excluir</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="pedidosConsult.php">Consulta de Pedidos</a></li>

        </ul>
    </nav>



    <?php
    include "conectar.php";

    $sql = "SELECT 
    pedidos.idpedidos,
    cadastro.nome, 
    pedidos.dataPedido, 
    pedidos.dataEntrega,
    pedidos.valor,
    pedidos.enderecoEntrega,
    pedidos.formaPag,
    pedidos.produto,
    pedidos.obs
    FROM pedidos
    INNER JOIN cadastro ON pedidos.cadastro_idcadastro = cadastro.idcadastro;";

    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        echo "<div class='mensagem erro'>Erro ao retornar dados: " . mysqli_error($conn) . "</div>";
    } else {
        echo '<table id="tabela">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID Pedidos</th>';
        echo '<th>Nome</th>';
        echo '<th>Data de Pedidos</th>';
        echo '<th>Data de Entrega</th>';
        echo '<th>Valor do Produto</th>';
        echo '<th>Endereço de Entrega</th>';
        echo '<th>Forma de Pagamento</th>';
        echo '<th>Produto</th>';
        echo '<th>Observação</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Loop para exibir todos os registros
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($linha['idpedidos']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['nome']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['dataPedido']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['dataEntrega']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['valor']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['enderecoEntrega']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['formaPag']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['produto']) . '</td>';
            echo '<td>' . htmlspecialchars($linha['obs']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        mysqli_free_result($resultado);
    }
    ?>
</body>

</html>