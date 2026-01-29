<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cadastro</title>
    <link rel="stylesheet" href="./css/style.css">


</head>

<body>
    <h1>Alteração de Cadastro</h1>

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

            <label>Selecione o ID</label>
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
            <br>
            <br>


            <div>
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" placeholder="Digite seu nome">
                </div>

                <br>

                <div>
                    <label for="sobren">Sobrenome:</label>
                    <input type="text" name="sobrenome" placeholder="Digite seu sobrenome">
                </div>

                <br>

                <div>
                    <label for="phone">Celular:</label>
                    <input type="text" name="phone" placeholder="Digite seu número celular">
                </div>

                <br>

                <div>
                    <label for="rgs">RG:</label>
                    <input type="text" name="rg" placeholder="Digite seu RG">
                </div>

                <br>

                <div>
                    <label for="cpfs">CPF:</label>
                    <input type="text" name="cpf" placeholder="Digite seu cpf">
                </div>

                <br>


                <div>
                    <label for="nacional">Naciolidade:</label>
                    <input type="text" name="nacionalidade" placeholder="Digite sua nacionalidade">
                </div>

                <br>

                <div>
                    <label for="nacional">Estado Civil:</label>
                    <input type="text" name="civil" placeholder="Digite seu estado civil">
                </div>

                <br>

                <div>
                    <label for="pai">Nome do Pai:</label>
                    <input type="text" name="nomePai" placeholder="Nome do Pai">
                </div>
                <br>

                <div>
                    <label for="mae">Nome da Mãe:</label>
                    <input type="text" name="nomeMae" placeholder="Nome da Mãe">
                </div>

                <br>

                <div>
                    <label for="nasci">Data de Nascimento:</label>
                    <input type="date" name="nasceu" placeholder="Selecione sua Data de Nascimento">
                </div>

                <br>

                <div>
                    <label for="anos">Digite sua Idade:</label>
                    <input type="number" name="idade" placeholder="Digite sua idade">
                </div>

                <br>

                <div>
                    <label for="rua">Digite seu Endereço:</label>
                    <input type="text" name="ruas" placeholder="Digite seu Endereço">
                </div>

                <br>

                <div>
                    <label for="bairros">Digite o nome do seu Bairro:</label>
                    <input type="text" name="bairro" placeholder="Digite seu Endereço">
                </div>

                <br>

                <div>
                    <label for="cidades">Digite o nome da sua Cidade:</label>
                    <input type="text" name="cidade" placeholder="Digite sua Cidade">
                </div>

                <br>

                <input type="submit" value="Alterar">
            </div>

        </form>

    </fieldset>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $phone = $_POST["phone"];
        $rg = $_POST["rg"];
        $cpf = $_POST["cpf"];
        $nacionalidade = $_POST["nacionalidade"];
        $civil = $_POST["civil"];
        $nomePai = $_POST["nomePai"];
        $nomeMae = $_POST["nomeMae"];
        $nasceu = $_POST["nasceu"];
        $idade = $_POST["idade"];
        $ruas = $_POST["ruas"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];


        include "conectar.php";
        if (!$conn) {
            echo "<div class='mensagem erro'>Falha na conexão: " . mysqli_connect_error() . "</div>";
            die();
        }

        $sql = " UPDATE cadastro
        SET
            nome ='$nome',
            sobrenome ='$sobrenome',
            celular= '$phone',
            rg ='$rg',
            cpf ='$cpf',
            nacionalidade ='$nacionalidade',
            estado_civil = '$civil',
            paternidade = '$nomePai',
            maternidade = '$nomeMae',
            dataNascimento = '$nasceu',
            idade ='$idade',
           endereco ='$ruas',
           bairro ='$bairro',
           cidade ='$cidade'

         WHERE idcadastro = '$id'";

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