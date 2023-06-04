<?php
// Parâmetros de conexão com o banco de dados
$servername = "appish.mysql.dbaas.com.br";
$username = "appish";
$password = "Canis123#";
$dbname = "appish";

// Dados de login fornecidos pelo usuário
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

// Criando uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para verificar se o usuário e senha são válidos
$sql = "SELECT * FROM cliente WHERE cpf_cli = '$cpf' AND senha_cli = '$senha'";
$result = $conn->query($sql);

// Verificando se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Iniciar a sessão
    session_start();

    // Armazenar o ID do usuário na sessão
    $row = $result->fetch_assoc();
    $_SESSION['cod_cli'] = $row['cod_cli'];

    // Autenticação bem-sucedida, redirecionar para ish.php
    header("Location: ish.php");
    exit();
} else {
    // Autenticação falhou
    die("CPF ou SENHA inválido!<a href='javascript:history.back()'> #VOLTAR# </a>");
}

// Fechando a conexão com o banco de dados
$conn->close();
?>