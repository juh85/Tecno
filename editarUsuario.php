<?php
if (isset($_GET['id'])) {
    $idEditUsu = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
}
if (isset($idEditUsu)) {
    include 'scripts/conexao.php';
    $sqlDadosUsu = 'SELECT * FROM usuario where id_usuario="' . $idEditUsu . '"';
    $result = $conn->query($sqlDadosUsu);
    // Agora $resposta contém os resultados da consulta
    if ($result->num_rows > 0) {
        $resposta = $result->fetch_all(MYSQLI_ASSOC);
        $nome = $resposta[0]['nome'];
        $cpf = $resposta[0]['cpf'];
        $email = $resposta[0]['email'];
    } else {
        echo 'Erro! usuario informado não localizado';
        die;
    }
    $conn->close();
} else {
    echo 'Erro! Não foi informado usuario para edição';
    die;
}
?>

<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>

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
        <h1 id="tit">Editar Usuario</h1>
        <form action="scripts/updateUsuario.php" method="post">
            <input type="hidden" name="tId"  value="<?php echo $idEditUsu; ?>">
            <p><label for="cNome"></label> Nome Completo:<input type="text" name="tNome" id="cNome" value="<?php echo $nome; ?>">
            </p>
            <p><label for="cCpf"></label> CPF:<input type="text" name="tCpf" id="cCpf" value="<?php echo $cpf; ?>">
            </p>
            <p><label for="cEmail"></label> Email:<input type="text" name="tEmail" id="cEmail" value="<?php echo $email; ?>">
            </p>
            <input type="submit" value="Editar Usuario" id="botao"/>

        </form>
    </div>
</body>