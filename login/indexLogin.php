<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            background-image: url('https://w.forfun.com/fetch/cf/cfdfd77abc060067ca6350eb2d1cd07b.jpeg?w=1000&r=0.5625') !important;
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
        .input-group {
            position: relative;
        }
        .input-group input {
            padding-right: 30px;
            /* Espaço para o ícone */
        }
        .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px; /* Ajuste a posição do ícone de acordo com suas preferências */
            transform: translateY(-50%);
            background-image: url('fotos/eyeOpen.png');
            /* Ícone de olho */
            background-size: cover;
            cursor: pointer;
            width: 20px; /* Ajuste o tamanho do ícone conforme necessário */
            height: 15px; /* Ajuste o tamanho do ícone conforme necessário */
        }
    </style>
    <!-- Importar Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Importar Icones -->
    <script src="https://kit.fontawesome.com/6538a247f3.js" crossorigin="anonymous"></script>
    <!-- Importar jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Importar mascara do jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#cCpf').inputmask('999.999.999-99');

        })
    </script>
</head>

<body>
    <div class="container">
        <div class="login-permissao">
            <form action="scriptLogin/validaLogin.php" method="post">
                <h2 id="titLog" class="text-primary font-weight-light">Login</h2>
                <div class="form-group">
                    <label for="cCpf">CPF:</label>
                    <input type="text" class="form-control" name="tCpf" id="cCpf" required>
                </div>
                <div class="form-group">
                    <label for="cPassword">Senha:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="tPassword" id="cPassword" required>
                        <span class="eye-icon" onclick="mudarVisibilidade()"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    function mudarVisibilidade() {
        var senhaInput = document.getElementById("cPassword");
        var eyeIcon = document.querySelector(".eye-icon");

        if (senhaInput.type === "password") {
            senhaInput.type = "text";
            eyeIcon.style.backgroundImage = "url('fotos/eyeOpen.png')"; // Ícone de olho aberto
        } else {
            senhaInput.type = "password";
            eyeIcon.style.backgroundImage = "url('fotos/eyeClose.png')"; // Ícone de olho fechado
        }
    }
    // mesma coisa com jQuery
    // $(".eye-icon").click(function() {  
    //     if ($("#cPassword").attr("type") === "password") {
    //         senhaInput.attr("type", "text");
    //         $(".eye-icon").css("background-image", "url('fotos/eyeOpen.png')"); // Ícone de olho aberto
    //     } else {
    //         senhaInput.attr("type", "password");
    //         $(".eye-icon").css("background-image", "url('fotos/eyeClose.png')"); // Ícone de olho fechado
    //     }
    // });
</script>
