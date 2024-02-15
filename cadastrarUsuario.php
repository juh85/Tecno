<?php
include 'scripts/verificaLogado.php';
?>

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuario</title>

    <style>
    #cad {
        padding: 0px 60px 0px 60px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: rgb(189, 209, 221);
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
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Area Administrativa</a></li>
                <li class="breadcrumb-item"><a href="listarUsuario.php">Gerenciar Usuario</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastro de Usuario</li>
            </ol>
        </nav>
        <div id="cad">
            <h1 id="tit" class="font-weight-light text-center">Cadastrar Usuario</h1>
            <form action="scripts/inserirUsuario.php" method="post">
                <div class="form-group">
                    <label for="cNome">Nome Completo:</label>
                    <input class="form-control" type="text" name="tNome" id="cNome">
                </div>
                <div class="form-group">
                    <label for="cCpf">CPF:</label>
                    <input class="form-control" type="text" name="tCpf" id="cCpf">
                </div>
                <div class="form-group">
                    <label for="cEmail">Email:</label>
                    <input class="form-control" type="text" name="tEmail" id="cEmail">
                </div>
                <div class="form-group">
                    <label for="cSenha">Senha:</label>
                    <input class="form-control" type="password" name="tSenha" id="cSenha">
                </div>
                <div class="form-group">
                    <label for="cConfS">Confirme sua senha:</label>
                    <input class="form-control" type="password" name="tConfS" id="cConfS">
                </div>
                <div class="text-center">
                    <input type="submit" value="Cadastrar Usuario" id="botao" class="btn btn-success ">
                </div>
            </form>


        </div>
    </div>
</body>