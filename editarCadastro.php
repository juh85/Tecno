<?php
include 'scripts/conexao.php';
include 'scripts/verificaLogado.php';
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
    <title>Editar Cadastro</title>

    <style>
    #cad {
        padding: 0px 60px 0px 60px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: rgb(189, 209, 221);
    }

    </style>


    <!-- Importar jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Importar Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Area Administrativa</a></li>
                <li class="breadcrumb-item"><a href="listarCadastro.php">Gerenciar Cadastro</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Cadastro</li>
            </ol>
        </nav>
        <div id="cad">
            <h1 id="tit" class="font-weight-light text-center">Editar Cadastro</h1>
            <form action="scripts/updateCadastro.php" method="post">
                <input type="hidden" name="tId" value="<?php echo $idEditCad; ?>">

                <div class="form-group">
                    <label for="cNome">Nome Completo:</label>
                    <input class="form-control" type="text" name="tNome" id="cNome" value="<?php echo $nome; ?>" />
                </div>

                <div class="form-group">
                    <label for="cNascimento">Data de Nascimento:</label>
                    <input class="form-control" type="date" name="tNascimento" id="CNascimento"
                        value="<?php echo $nascimento; ?>" />
                </div>
                <div class="form-group">
                    <label for="cEstado">Estado:</label>
                    <select class="form-control" name="tEstado" id="cEstado" required>
                        <option value="">Selecione</option>
                        <?php
                        foreach ($estados as $estadoOption) {
                            $selected = ($estadoOption["id"] == $estado) ? 'selected="selected"' : '';
                            echo '<option value="' . $estadoOption["id"] . '" ' . $selected . '>' . $estadoOption["estado"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cTelefone">Telefone:</label>
                    <input class="form-control" type="text" name="tTelefone" id="cTelefone" size="15" maxlength="15"
                        value="<?php echo $telefone; ?>" />
                </div>
                <div class="form-group">
                    <label for="cEmail">E-mail: </label>
                    <input class="form-control" type="text" name="tEmail" id="cEmail" maxlength="50"
                        placeholder="E-mail" value="<?php echo $email; ?>" required />
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="Enviar" id="botao" />
                </div>
            </form>
        </div>
    </div>
</body>