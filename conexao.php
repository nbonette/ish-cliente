<?php
$servername = "appish.mysql.dbaas.com.br";
$username = "appish";
$password = "Canis123#";
$dbname = "appish";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>