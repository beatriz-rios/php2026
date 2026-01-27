<!DOCTYPE html>
<html>
<body>
    <?php include 'cadastr.html'; ?>
</body>
</html>


  <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
       
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
        $ruas= $_POST["ruas"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
          
        
      
         $servername = "localhost";
         $database = "cadastro";
         $username = "root";
         $password = "";
         $port = 3308;


         $conn = mysqli_connect($servername, $username,$password,$database,$port);

        if(!$conn){
            echo "<div class='mensagem erro'>Falha na conexão: " . mysqli_connect_error() . "</div>";
            die();
        }
        
        $sql = " INSERT INTO cadastro (
            nome,
            sobrenome,
            celular,
            rg,
            cpf,
            nacionalidade,
            estado_civil,
            paternidade,
            maternidade,
            dataNascimento,
            idade,
            endereco,
            bairro,
            cidade
            )VALUE(
            '$nome',
            '$sobrenome',
            '$phone',
            '$rg',
            '$cpf',
            '$nacionalidade',
            '$civil',
            '$nomePai',
            '$nomeMae',
            '$nasceu',
            '$idade',
            '$ruas',
            '$bairro',
            '$cidade'
        );";

       
if(mysqli_query($conn, $sql)){
    echo"<br>Comando executado com sucesso";
}else{
    echo"Error: " . $sql . "<br>" . mysqli_error($conn);
}


 mysqli_close($conn);
}

  ?>

