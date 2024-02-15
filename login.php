<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            background-image: url('https://img.freepik.com/fotos-premium/fundo-abstrato-do-edificio-de-escritorios-moderno-exterior-no-novo-distrito-de-negocios_31965-133971.jpg') !important;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .login-permissao {
            max-width: 300px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white !important;
        }

        #titLog {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
    <!-- Importar Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <div class="container">
        <div class="login-permissao">
            <form action="scripts/validaLogin.php" method="post">
                <h2 id="titLog" class="text-primary font-weight-light">Login</h2>
                <div class="form-group">
                    <label for="cCpf">CPF:</label>
                    <input type="text" class="form-control" name="tCpf" id="cCpf" required>
                </div>
                <div class="form-group">
                    <label for="cPassword">Senha:</label>
                    <input type="password" class="form-control" name="tPassword" id="cPassword" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</body>

</html>