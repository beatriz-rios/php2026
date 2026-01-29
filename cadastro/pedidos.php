<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <h1>Pedidos</h1>


    <body>

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

        <fieldset>
            <form method="post">


              <label>Selecione o Nome</label>
            <select name="id">
                <option value="">Selecione o Nome</option><br>
                <?php
                include "conectar.php";
                if (isset($conn)) {
                    $sqlUsuarios = "SELECT idcadastro, nome FROM cadastro ORDER BY nome";
                    $resU = $conn->query($sqlUsuarios);
                    if ($resU) {
                        while ($u = $resU->fetch_assoc()) {
                            $id = $u['idcadastro'];
                            $nome = htmlspecialchars($u['nome']);
                            echo "<option value='$id'>$nome</option>";
                        }
                    }
                }
                ?>
            </select>

                <div>
                    <label for="calen">Data do Pedido:</label>
                    <input type="date" name="pedidata" placeholder>
                </div>

                <br>

                <div>
                    <label for="calend">Data de Entrega</label>
                    <input type="date" name="entregdata" placeholder>
                </div>

                <br>

                <div>
                    <label for="valor">Valor do Pedido:</label>
                    <input type="number" name="valorped" placeholder="Digite o valor">
                </div>

                <br>

                <div>
                    <label for="endereco">Endereço de Entrega:</label>
                    <input type="text" name="endereco" placeholder="Digite seu endereço">
                </div>

                <br>


                <div>
                    <label for="formapag">Forma de Pagamento:</label>
                    <input type="text" name="pagam" placeholder="Digite sua forma de pagamento">
                </div>
                <br>


                <div>
                    <label for="produt">Produto:</label>
                    <input type="text" name="prod" placeholder="Digite o produto pedido">
                </div>

                <br>


                <div>
                    <label for="obss">Observação:</label>
                    <input type="text" name="obs" placeholder="Alguma Observação?">
                </div>


                <br>

                <input type="submit" value="Enviar">
                

            </form>

        </fieldset>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST["id"];
            $pedidata = $_POST["pedidata"];
            $entregdata = $_POST["entregdata"];
            $valorped = $_POST["valorped"];
            $endereco = $_POST["endereco"];
            $pagam = $_POST["pagam"];
            $prod = $_POST["prod"];
            $obs = $_POST["obs"];
           


            $servername = "localhost";
            $database = "cadastro";
            $username = "root";
            $password = "";
            $port = 3308;


            $conn = mysqli_connect($servername, $username, $password, $database, $port);

            if (!$conn) {
                echo "<div class='mensagem erro'>Falha na conexão: " . mysqli_connect_error() . "</div>";
                die();
            }

            $sql = " INSERT INTO pedidos (
            cadastro_idcadastro,
            dataPedido,
            dataEntrega,
            valor,
            enderecoEntrega,
            formaPag,
            produto,
            obs
            )VALUE(
            '$id',
            '$pedidata',
            '$entregdata',
            '$valorped',
            '$endereco',
            '$pagam',
            '$prod',
            '$obs'
       
        );";


            if (mysqli_query($conn, $sql)) {
                echo "<br>Comando executado com sucesso";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }


            mysqli_close($conn);
        }

        ?>
    </body>

</html>