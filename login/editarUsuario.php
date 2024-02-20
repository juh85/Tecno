<?php
include 'scriptLogin/verificaLogado.php';
if (isset($_GET['id'])) {
    $idEditUsu = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
}
if (isset($idEditUsu)) {
    include 'scriptLogin/conexao.php';
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
    #cad {
        padding: 0px 60px 0px 60px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: rgb(189, 209, 221);
    }
    </style>

    <!-- Importar jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Importar mascara do jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <!-- Importar Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <li class="breadcrumb-item active" aria-current="page">Editar Usuario</li>
            </ol>
        </nav>
        <div id="cad">
            <h1 id="tit" class="font-weight-light text-center">Editar Usuario</h1>
            <form action="scriptLogin/updateUsuario.php" method="post">
                <input type="hidden" name="tId" value="<?php echo $idEditUsu; ?>">
                <div class="form-group">
                    <label for="cNome">Nome Completo:</label>
                    <input class="form-control" type="text" name="tNome" id="cNome" value="<?php echo $nome; ?>">
                </div>
                <div class="form-group">
                    <label for="cCpf">CPF:</label>
                    <input class="form-control" type="text" name="tCpf" id="cCpf" value="<?php echo $cpf; ?>">
                </div>
                <div class="form-group">
                    <label for="cEmail">Email:</label>
                    <input class="form-control" type="text" name="tEmail" id="cEmail" value="<?php echo $email; ?>">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="Editar Usuario" id="botao" />
                </div>


            </form>
        </div>
    </div>
</body>