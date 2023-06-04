<?php require_once("security.php")?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  require_once "conexao.php";

  $id = $_GET["id"];

  $sql = "DELETE FROM compras WHERE cod_compras = $id";

  if ($conn->query($sql) === TRUE) {
      // Redireciona para a página "balaio.php"
      header("Location: balaio.php");
      exit;
  } else {
      echo "Erro ao excluir o registro: " . $conn->error;
  }

  $conn->close();
}
?>