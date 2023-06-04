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

</style>

</head>
<body>
    <table width="100%"><tr><th><p align=center style="font-size: 30px;">ISH - Sistema de Vendas de Pescado Artesanal</p></th></tr></table>

        <br>
    <?php
    if (isset($_GET["cpf_cli"])) {
        $cpf = $_GET["cpf_cli"];}

    require_once "conexao.php";
    
    $sql = "SELECT * FROM cliente where cpf_cli=$cpf";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
                
        $row = $result->fetch_assoc();

            echo "<h1>Olá ".$row["nome_cli"].", seu cadastro está quase pronto! <br> Enviamos um SMS para seu celular, favor inserir o código abaixo!</h1></td>";    
            
    } 
    else {
        echo "Nenhum registro encontrado.";
    }
    
    $conn->close();
    ?>
    <form method="post" action="ish.php">
        <table>
        <tr>
                <th><label for="sms">Código SMS:</label></th>
                <td><input type="text" name="sms" id="sms" required></td>
            </tr>
            <tr>
                <th><label for="btn"><a href=#>Reenviar código</a></label></th>
                <td><input type="submit" value="Enviar"></td>
            </tr>
             </table>
        
    </form>
</body>
</html>