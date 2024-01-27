<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            background-color: white;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        div.login-permissao {
            background-color: rgb(189, 209, 221);
            width: 30%;
            margin: 15%;
            float: left;
            display: flex;
            justify-content: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #titLog {
            text-align: center;
            color: rgba(0, 0, 0, .8)

        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #botao {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <!-- Importar jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Importar mascara do jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cCpf').inputmask('999.999.999-99');

        })
    </script>
</head>

<body>
    <div class="login-permissao">
        <form action="scripts/validaLogin.php" method="post">
            <h2 id="titLog">Login</h2>
            <label for="cCpf">CPF:</label><input type="text" name="tCpf" id="cCpf" required> 
            <label for="cPassword">Senha: </label><input type="password" name="tPassword" id="cPassword" required>
            <input type="submit" id="botao" value="Login" />
            <a href="scripts/listarCadastro.php"></a>
        </form>
    </div>
</body>

</html>