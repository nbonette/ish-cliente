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

    function mostrarDescricaoCompleta() {
    var descricaoCompletaElement = document.getElementById('descricaoCompleta');
    descricaoCompletaElement.style.display = 'inline';
}

  </script>
    
</head>
<body bgcolor="#d9faff">
    <table width="100%">
        <tr>
            <th width=25%><a href="ish.php"><img src="img\ish.png" width=90%></a></th>
            <th width=25%><input type="text" name="procura_pro" id="procura_pro" required style="width: 200px; height: 30px;border-radius: 15px;" placeholder="Estou procurando..."></th>
            <th width=25%><img src="img\trest.png" width=45% class="imagem-menu" id="imagem-menu"></th>
            <th width=25%><img src="img\fisgar.png" width=80% class="imagem-menu" id="imagem-menu"></th>
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
  <form method=POST action="final_compra.php">

  <?php
require_once "conexao.php";

$codigo = $_SESSION['cod_cli'];

$sql = "SELECT * FROM compras INNER JOIN produto ON compras.cod_produtos = produto.cod_prod WHERE compras.cod_cliente = $codigo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>PRODUTO</th><th>DESCRIÇÃO</th><th>QTD</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src=".$row["imagem_prod"]." width=80 height=80'></td>";
        echo "<td>" . $row["descicao_prod"] . "</td>";
        echo "<td>" . $row["qtd_produtos"] . "</td>";
        echo "<td><a href='excluir_balaio.php?id=" . $row["cod_compras"] . "'><img src='img/remover.png' width='20px'></a></td>";
        echo "</tr>";
    }
    
    
    $sql_total = "SELECT SUM(compras.preco_produtos * compras.qtd_produtos) AS total FROM compras INNER JOIN produto ON compras.cod_produtos = produto.cod_prod WHERE compras.cod_cliente = $codigo";
    $result_total = $conn->query($sql_total);
    if ($result_total->num_rows > 0) {
        $row_total = $result_total->fetch_assoc();
        $total = $row_total['total'];

        $total_formatado = number_format($total, 2, ',', '.');

        echo "<tr class='total-row'><td style='text-align: right;' colspan='3' style='text-align: right;'><b>Total:</b></td><td>R$ <input type='text' name='total' id='total' value='" . $total_formatado . "' readonly style='width: 50px;''></td></tr>";
    }

    echo "<tr class='submit-row'><td colspan='4' style='text-align: right;'><input type='submit' value='Finalizar Compra' style='width: 65px; height: 30px;border-radius: 50px;'></td></tr>";
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>

</form>
</body>
</html>