<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

   <style>
    /* Estilo do input select */
    .custom-input {
      width: 200px;
      padding: 5px;
      border: none;
      background-color: #009eff;
      color: #ffffff;
      border-radius: 5px;
    }
    
    /* Estilo das opções */
    .custom-input option {
      background-color: #009eff;
      color: #ffffff;
    }
        .frase-de-efeito {
      font-size: 20px;
      font-weight: bold;
      color: #ffffff;
      text-align: center;
      padding: 20px;
      background-color: #009eff;
      border-radius: 5px;
    }
    
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-family: "arial";
            color: #009eff;
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
      color: #333;
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
      background-color: #000000;
      transform: scaleX(0);
      transition: transform 0.3s ease-in-out;
    }

    .link-destaque:hover {
      color: #000000;
    }

    .link-destaque:hover::after {
      transform: scaleX(1);
    }
    </style>
    <title>|><) ISH - Pescados da Pesca Artesanal</title>
</head>
<body bgcolor="#d9faff">
    
<table width="100%">
        <tr>
            <th width=25%><p align="center"><img src="img\ish.png" width=20%><br><i>Você está à um passo para fisgar seu Pescado fresquinho!</i></p></th>
        </tr>
    </table>
    
    <form method="post" action="cadastrando_cliente.php">
        <table>
        <tr>
                <th><label for="nome">Nome:</label></th>
                <td><input type="text" name="nome" id="nome" required></td>
            </tr>
            <tr>
                <th><label for="cpf">CPF:</label></th>
                <td><input type="text" name="cpf" id="cpf" maxlength="14" required></td>
            </tr>
            <tr>
                <th><label for="nascimento">Data de nascimento:</label></th>
                <td><input type="text" name="data" id="data" required></td>
            </tr>
            <tr>
                <th><label for="telefone">Telefone:</label></th>
                <td><input type="text" name="telefone" id="telefone" maxlength="15" required></td>
            </tr>
            <tr>
                <th><label for="email">E-mail:</label></th>
                <td><input type="text" name="email" id="email" required></td>
            </tr>
            <tr>
                <th><label for="rua">Rua:</label></th>
                <td><input type="text" name="rua" id="rua" required></td>
            </tr>
            <tr>
                <th><label for="numero">Número:</label></th>
                <td><input type="text" name="numero_casa" id="numero_casa" required></td>
            </tr>
            <tr>
                <th><label for="bairro">Bairro:</label></th>
                <td><input type="text" name="bairro" id="bairro" required></td>
            </tr>
            <tr>
                <th><label for="cidade">Cidade:</label></th>
                <td><input type="text" name="cidade" id="cidade" required></td>
            </tr>
            <tr>
                <th><label for="cep">CEP:</label></th>
                <td><input type="text" name="cep" id="cep" required></td>
            </tr>
            <tr>
                <th><label for="estado">Estado:</label></th>
                <td><select id="estado" name="estado" class="custom-input">
      <option value="AC">AC</option>
      <option value="AL">AL</option>
      <option value="AP">AP</option>
      <option value="AM">AM</option>
      <option value="BA">BA</option>
      <option value="CE">CE</option>
      <option value="DF">DF</option>
      <option value="ES">ES</option>
      <option value="GO">GO</option>
      <option value="MA">MA</option>
      <option value="MT">MT</option>
      <option value="MS">MS</option>
      <option value="MG">MG</option>
      <option value="PA">PA</option>
      <option value="PB">PB</option>
      <option value="PR">PR</option>
      <option value="PE">PE</option>
      <option value="PI">PI</option>
      <option value="RJ">RJ</option>
      <option value="RN">RN</option>
      <option value="RS">RS</option>
      <option value="RO">RO</option>
      <option value="RR">RR</option>
      <option value="SC">SC</option>
      <option value="SP">SP</option>
      <option value="SE">SE</option>
      <option value="TO">TO</option>
    </select></td>
            </tr>
            <tr>
                <th><label for="senha">Crie uma Senha:</label></th>
                <td><input type="password" name="senha" id="senha" required></td>
            </tr>
            <tr>
                <th><label></label></th>
                <td><input type="submit" value="Enviar" style="width: 170px; height: 40px;border-radius: 50px;"></td>
            </tr>
        </table>
        
    </form>
    
    <script>
 var dataInput = document.getElementById('data');

dataInput.addEventListener('input', function(event) {
  var valorAtual = this.value;
  var valorFormatado = formatarData(valorAtual);

  this.value = valorFormatado;
});

function formatarData(valor) {
  valor = valor.replace(/\D/g, '');
  var dia = valor.substring(0, 2);
  var mes = valor.substring(2, 4);
  var ano = valor.substring(4, 8);

  if (valor.length >= 3) {
    valor = dia + '/' + mes + '/' + ano;
  } else if (valor.length >= 2) {
    valor = dia + '/' + mes;
  }

  return valor;
}

    function formatarDataParaSQL(data) {
      var partes = data.split('/');
      var dataFormatada = partes[2] + '-' + partes[1] + '-' + partes[0];
      return dataFormatada;
    }

    var form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
      var dataInput = document.getElementById('data');
      var dataDigitada = dataInput.value;

      var dataFormatada = formatarDataParaSQL(dataDigitada);
      dataInput.value = dataFormatada;
    });
  </script>

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

<script>
    var telefoneInput = document.getElementById('telefone');

    telefoneInput.addEventListener('input', function(event) {
      var valorAtual = this.value;
      var valorFormatado = formatarTelefone(valorAtual);

      this.value = valorFormatado;
    });

    function formatarTelefone(valor) {
      valor = valor.replace(/\D/g, '');
      valor = valor.replace(/^(\d{2})(\d)/g, '($1) $2');
      valor = valor.replace(/(\d)(\d{4})$/, '$1-$2');
      return valor;
    }
  </script>

<script>
    var emailInput = document.getElementById('email');

    emailInput.addEventListener('input', function(event) {
      var valorAtual = this.value;

      if (validarEmail(valorAtual)) {
        this.setCustomValidity('');
      } else {
        this.setCustomValidity('Email inválido');
      }
    });

    function validarEmail(email) {
      var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return regex.test(email);
    }
  </script>

</body>
</html>