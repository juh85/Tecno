<?php 
include 'scripts/verificaLogado.php';
?>
<head>
    <meta charset="UTF-8">
    <title>Area Administrativa</title>

    <style>
        body {
            background-color: white;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #admin {
            background-color: rgb(189, 209, 221);
            width: 30%;
            margin: 15%;
            float: left;
            justify-content: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #tit {
            text-align: center;
            color: rgba(0, 0, 0, .8);
        }

        a {
            text-decoration: none;
        }

        button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;

        }
    </style>

</head>

<body>
    <div id="admin">
        <h1 id="tit">Area Administrativa</h1>
        <p>Bem-vindo a Area Administrativa, <?php echo $_SESSION['nome_usuario'];?> 
        <button><a href='scripts/logout.php'>SAIR</a></button></p> 

        <button><a href='listarCadastro.php'>Listar Cadastro</a></button>
        <button><a href='cadastrarUsuario.php'>Cadastrar Usuario</a></button>
        <button><a href='listarUsuario.php'> Listar Usuario</a></button>

    </div>
</body>