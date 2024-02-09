<?php 
include 'scripts/verificaLogado.php';
?>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuario</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: white;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    #cad {
        background-color: rgb(189, 209, 221);
        width: 30%;
        margin: 10%;
        float: left;
        justify-content: center;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #tit {
        text-align: center;
        color: rgba(0, 0, 0, .8);

    }

    form {
        display: flex;
        flex-direction: column;
        border-top: solid gray;
        padding: 10px;


    }

    input {
        width: 100%;
        padding: 4px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #botao {
        padding: 15px;
    }

    #botao:hover {
        background-color: #45a049;
    }
    </style>
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
    <div id="cad">
        <h1 id="tit">Cadastrar Usuario</h1>
        <form action="scripts/inserirUsuario.php" method="post">
            <p><label for="cNome"></label> Nome Completo:<input type="text" name="tNome" id="cNome">
            </p>
            <p><label for="cCpf"></label> CPF:<input type="text" name="tCpf" id="cCpf">
            </p>
            <p><label for="cEmail"></label> Email:<input type="text" name="tEmail" id="cEmail">
            </p>
            <p><label for="cSenha"></label>Senha:<input type="password" name="tSenha" id="cSenha">
            </p>
            <p><label for="cConfS"></label>Confirme sua senha:<input type="password" name="tConfS" id="cConfS">
            </p>

            <input type="submit" value="Cadastrar Usuario" id="botao">

        </form>


    </div>
</body>