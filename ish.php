<?php require_once("security.php")?>
<!DOCTYPE html>
<html>
<head>
<title>|><) ISH - Pescados da Pesca Artesanal</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<style>

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #d9faff;
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .menu {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 120px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      padding: 12px;
      z-index: 1;
    }
    
    .imagem-menu {
      cursor: pointer;
    }

        </style>

         <script>

   document.addEventListener("DOMContentLoaded", function() {
      var menu = document.getElementById("menu");
      var imagemMenu = document.getElementById("imagem-menu");
      var menuAberto = false;
      
      imagemMenu.addEventListener("click", function() {
        if (menuAberto) {
          menu.style.display = "none";
        } else {
          menu.style.display = "block";
        }
        menuAberto = !menuAberto;
      });
    });

    function formatarValor(input) {
            let valor = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

            // Verifica se o valor possui pelo menos dois dígitos numéricos
            if (valor.length >= 2) {
                let parteInteira = valor.slice(0, -2);
                let parteDecimal = valor.slice(-2);
                let formattedValue = parteInteira + '.' + parteDecimal;

                input.value = formattedValue;
            }
        }

  </script>
    
</head>
<body bgcolor="#d9faff">
    <table width="100%">
        <tr>
            <th width=25%><a href="ish.php"><img src="img\ish.png" width=90%></a></th>
            <th width=25%><input type="text" name="procura_pro" id="procura_pro" required style="width: 200px; height: 30px;border-radius: 15px;" placeholder="Estou procurando..."></th>
            <th width=25%><img src="img\trest.png" width=45% class="imagem-menu" id="imagem-menu"></th>
            <th width=25%><a href="balaio.php"><img src="img\fisgar.png" width=80% class="imagem-menu" id="imagem-menu"></a></th>
        </tr>
    </table>
    <div id="menu" class="menu">
    <li><a href="#"><img src="img\inicio.png" width=17%>&nbsp;&nbsp;Início</a></li>
    <li><a href="#"><img src="img\avisos.png" width=17%>&nbsp;&nbsp;Avisos</a></li>
    <li><a href="#"><img src="img\compras.png" width=17%>&nbsp;&nbsp;Compras</a></li>
    <li><a href="#"><img src="img\favoritos.png" width=17%>&nbsp;&nbsp;Favoritos</a></li>
    <li><a href="#"><img src="img\historico.png" width=17%>&nbsp;&nbsp;Histórico</a></li>
    <li><a href="#"><img src="img\minhaconta.png" width=17%>&nbsp;&nbsp;Minha conta</a></li>
    <li><a href="#"><img src="img\contato.png" width=17%>&nbsp;&nbsp;Contato</a></li>
    <li><a href="#"><img src="img\resumo.png" width=17%>&nbsp;&nbsp;Resumo</a></li>
    <li><a href="#"><img src="img\vender.png" width=17%>&nbsp;&nbsp;Vender</a></li>
  </div>
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
    
    echo "<script>window.alert('Produto inserido no balaio!')</script>";
    
  } else {
      echo "Erro ao registrar compra: " . $conn->error;
  }
}
    
    $sql = "SELECT * FROM produto";
    $result = $conn->query($sql);

    $codigo = $_SESSION['cod_cli'];
    
    if ($result->num_rows > 0) {
                echo "<table border='0'>";
        echo "<tr><th></th><th></th><th></th><th></th></tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<form method=POST action=$_SERVER[PHP_SELF]><td><a href=fisgar.php?cod_prod=".$row["cod_prod"]."><img src=".$row["imagem_prod"]." width=80 height=80'><br>R$ ".$row["preco_prod"]." ".$row["unidade_prod"]."</a></td>";
            echo "<td><a href=fisgar.php?cod_prod=".$row["cod_prod"].">".$row["descicao_prod"]."</a></td>";
            echo "<td><input  name=cod_prod id=cod_prod type=hidden value=".$row["cod_prod"]."><input  name=preco_prod id=preco_prod type=hidden value=".$row["preco_prod"]."><input  name=cod_cli id=cod_cli type=hidden value=".$codigo."><input style='width: 30px;'  onkeyup='formatarValor(this)' name=qtd_prod id=qtd_prod type=text value=".$row["qtd_prod"]."></td>";
            echo "<td><input type=submit value=Comprar style='width: 65px; height: 30px;border-radius: 50px;'></td></form>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
    
    $conn->close();
    ?>
</body>
</html>