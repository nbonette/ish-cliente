<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script>
    window.addEventListener('DOMContentLoaded', function() {
      var imagem = document.getElementById('imagem');
      imagem.style.display = 'block';

      setTimeout(function() {
        imagem.style.opacity = '1';
      }, 100);

      setTimeout(function() {
        imagem.style.opacity = '0';
        setTimeout(function() {
          imagem.style.display = 'none';
        }, 1000);
      }, 2000);
    });
  </script>
    <style>
   .frase-de-efeito {
  font-family: Roboto, verdana, sans-serif;
  font-size: 18px;
  font-weight: bold;
  color: #009eff;
  text-align: center;
  padding: 20px;
  border-radius: 5px;
}
    
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-family: verdana, sans-serif;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #d9faff;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #009eff;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #009eff;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2c74b3;
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

    .link-destaque {
      color: #009eff;
      text-decoration: none;
      position: relative;
      transition: color 0.3s ease-in-out;
    }

    .link-destaque::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -2px;
      width: 100%;
      height: 2px;
      background-color: #009eff;
      transform: scaleX(0);
      transition: transform 0.3s ease-in-out;
    }

    .link-destaque:hover {
      color: #009eff;
    }

    .link-destaque:hover::after {
      transform: scaleX(1);
    }
    </style>
    <title>|><) ISH - Pescados da Pesca Artesanal</title>
</head>
<body bgcolor="#d9faff">
    
<table>
            <tr>
                <th><p align=center class="frase-de-efeito"><img src="img\ish.png" width=40%><br><br>Entre ou <a href="cadastrar_cliente.php" class="link-destaque"><u>Cadastre-se</u></a></p></th>
                
            </tr>
                        
        </table>
    <form method="post" action="autenticacao.php">
        <table>
            <tr>
                <td><input type="text" name="cpf" id="cpf" maxlength="14" required placeholder="Insira seu CPF"></td>
            </tr>
            <tr>
                <td><input type="password" name="senha" id="senha" required placeholder="Insira sua Senha"></td>
            </tr>
            <tr>
                <td style="text-align: right;color: blue; font-size: 12px;"><a href="#" class="link-destaque">Esqueceu a Senha?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Entrar" style="width: 170px; height: 40px;border-radius: 50px;"></td>
            </tr>
        </table>
    </form>
    
    <script>
    var cpfInput = document.getElementById('cpf');

    cpfInput.addEventListener('input', function(event) {
      var valorAtual = this.value;
      var valorFormatado = formatarCPF(valorAtual);
      
      // Remove qualquer mensagem de erro anterior
      cpfInput.setCustomValidity('');

      // Valida o CPF
      if (!validarCPF(valorAtual)) {
        cpfInput.setCustomValidity('CPF inválido');
      }

      this.value = valorFormatado;
    });

    function formatarCPF(valor) {
      valor = valor.replace(/\D/g, '');
      valor = valor.replace(/^(\d{3})(\d)/g, '$1.$2');
      valor = valor.replace(/^(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3');
      valor = valor.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3-$4');
      return valor;
    }

    function validarCPF(cpf) {
      cpf = cpf.replace(/\D/g, '');

      if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
        return false;
      }

      var soma = 0;
      var resto;

      for (var i = 1; i <= 9; i++) {
        soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
      }

      resto = (soma * 10) % 11;

      if (resto === 10 || resto === 11) {
        resto = 0;
      }

      if (resto !== parseInt(cpf.substring(9, 10))) {
        return false;
      }

      soma = 0;

      for (var j = 1; j <= 10; j++) {
        soma += parseInt(cpf.substring(j - 1, j)) * (12 - j);
      }

      resto = (soma * 10) % 11;

      if (resto === 10 || resto === 11) {
        resto = 0;
      }

      if (resto !== parseInt(cpf.substring(10, 11))) {
        return false;
      }

      return true;
    }
  </script>
</body>
</html>