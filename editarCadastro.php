<?php
include 'scripts/conexao.php';
if (isset($_GET['id'])) {
    $idEditCad = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
}
if (isset($idEditCad)) {
    // PEGAR DADOS CADASTRO
    $sqlDadosCad = 'SELECT * FROM dados where id ="' . $idEditCad . '"';
    $resultDados = $conn->query($sqlDadosCad);
    // Agora $resposta contém os resultados da consulta
    if ($resultDados->num_rows > 0) {
        $resposta = $resultDados->fetch_all(MYSQLI_ASSOC);
        $nome = $resposta[0]['nome'];
        $telefone = $resposta[0]['telefone'];
        $email = $resposta[0]['email'];
        $nascimento = $resposta[0]['dtnascimento'];
        $estado = $resposta[0]['estado'];
    } else {
        echo 'Erro! usuario informado não localizado';
        die;
    }
    // PEGAR ESTADOS
    $sqlDadosEstado = "SELECT * FROM estado";
    $resultEstados = $conn->query($sqlDadosEstado);
    $estados = $resultEstados->fetch_all(MYSQLI_ASSOC);

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
            $('#cTelefone').inputmask('(99)99999-9999');

        })
    </script>
</head>

<body>
    <div id="cad">
        <h1 id="tit">Editar Cadastro</h1>
        <form action="scripts/updateCadastro.php" method="post">
        <input type="hidden" name="tId" value="<?php echo $idEditCad; ?>">
        <p><label for="cNome">Nome Completo</label><input type="text" name="tNome" id="cNome" value="<?php echo $nome; ?>"/></p>
        <p><label for="cNascimento">Data de Nascimento:</label> <input type="date" name="tNascimento" id="CNascimento" value="<?php echo $nascimento; ?>"/></p>
        <select name="tEstado" id="cEstado" required>
            <option value="">Selecione</option>
            <?php
            foreach ($estados as $estadoOption) {
                $selected = ($estadoOption["id"] == $estado) ? 'selected="selected"' : '';
                echo '<option value="' . $estadoOption["id"] . '" ' . $selected. '>' . $estadoOption["estado"] . '</option>';
            }
            ?>
        </select>
        <p> <label for="cTelefone">Telefone: <input type="text" name="tTelefone" id="cTelefone" size="15" maxlength="15" value="<?php echo $telefone; ?>"/></label></p>
        <p><label for="cEmail">E-mail: <input type="text" name="tEmail" id="cEmail" maxlength="50" placeholder="E-mail" value="<?php echo $email; ?>"required/></label></p>
        <input type="submit" value="Enviar" id="botao"/>
        </form>
    </div>
</body>