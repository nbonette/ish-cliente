<?php require_once("security.php")?>
<?php
    require_once "conexao.php";
  
// Processa o formulário de compra
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtém os valores do formulário
  $id = $_POST["cod_prod"];
  $qtd = $_POST["qtd_prod"];
  $preco = $_POST["preco_prod"];
  $cliente = $_POST["cod_cli"];

  // Cria a consulta SQL para inserir a compra no banco de dados
  $sql = "INSERT INTO compras (cod_produtos, qtd_produtos, preco_produtos,cod_cliente) VALUES ($id, $qtd, $preco, $cliente)";

  // Executa a consulta SQL
  if ($conn->query($sql) === TRUE) {
    
    header("Location: balaio.php");
      exit;
    
  } else {
      echo "Erro ao registrar compra: " . $conn->error;
  }
}
?>