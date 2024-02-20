<?php 
include 'scriptLogin/verificaLogado.php';
?>

<head>
    <meta charset="UTF-8">
    <title>Area Administrativa</title>
    <style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    #admin {
        float: left;
        justify-content: center;
    }

    #tit {
        text-align: center;

    }
    </style>
    <!-- Importar Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Importar Icones -->
    <script src="https://kit.fontawesome.com/6538a247f3.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="admin">
        <h1 id="tit" class="text-primary font-weight-light">Bem-vindo a Area Administrativa,
            <?php echo $_SESSION['nome_usuario'];?>.</h1>
        <div class="text-right">
            <a class="btn btn-primary" href='scriptLogin/logout.php'><i class="fa-solid fa-arrow-right-from-bracket"></i> SAIR</a>
        </div>
        <div class="row">
            <div class="col">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body text-primary d-inline-block">
                        <img src="../fotos/Listar.png" style="margin:3%;max-width:20%;max-height:20%;">
                        <a href='listarCadastro.php'>Gerenciar Cadastro</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body text-primary d-inline-block">
                        <img src="../fotos/Gerenciar.png" style="margin:3%;max-width:24%;max-height:25%;">
                        <a href='listarUsuario.php'>Gerenciar Usuario</a>
                    </div>
                </div>
            </div>
        </div>
</body>