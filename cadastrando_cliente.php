<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|><) ISH - Pescados da Pesca Artesanal</title>
</head>
<body>
    <h1>ISH - Pescados Artesanal</h1>
    <?php
    // Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $dtNasc = $_POST["data"];
    $rua = $_POST["rua"];
    $numero_casa = $_POST["numero_casa"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $cep = $_POST["cep"];
    $estado = $_POST["estado"];
}

$servername = "appish.mysql.dbaas.com.br";
$username = "appish";
$password = "Canis123#";
$dbname = "appish";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$sql="INSERT INTO cliente(nome_cli,cpf_cli,senha_cli,email_cli,telefone_cli,dtNasc_cli,rua_cli,numero_casa_cli,bairro_cli,cidade_cli,cep_cli,estado_cli) VALUES ('$nome','$cpf','$senha','$email','$telefone','$dtNasc','$rua','$numero_casa','$bairro','$cidade','$cep','$estado')";

if ($conn->query($sql) === TRUE) {

    header('Location: sucesso.php?cpf_cli='. $cpf);
    exit();

} else {
    echo "Erro ao adicionar registro de IMC: " . $conn->error;
}

$conn->close();
    ?>

</body>
</html>