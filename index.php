<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="css/estilo.css" />

<head>
    <meta charset="UTF-8" />
    <title>Pagina</title>
    <style>

    </style>
    <!-- Importar jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Importar mascara do jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <!-- Importar Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Importar Icones -->
    <script src="https://kit.fontawesome.com/6538a247f3.js" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        $('#cTelefone').inputmask('(99)99999-9999');

    })
    </script>
</head>

<body>
    <?php
    include 'scripts/conexao.php';
    $sqlPuxarEs = "SELECT * FROM estado";
    $result = $conn->query($sqlPuxarEs);
    // Agora $resposta contém os resultados da consulta
    $resultEstados = $result->fetch_all(MYSQLI_ASSOC);

    // Fechar a conexão
    $conn->close();

    // echo '<pre>';
    // var_dump($resultEstados);

    ?>

    <div class="container mt-4" id="corpo">
        <header id="cabecalho">
            <hgroup>
                <h1 id="titulo">Tudo em Desenvolvimento</h1>
                <h2 id="subtitulo">Descubra tudo que esta em desenvolvimento hoje no mundo</h2>
            </hgroup>
            <nav>
                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formulario.php">Formulario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quem Somos</a>
                    </li>
                </ul>
            </nav>

        </header>

        <section>
            <article id="noticia-pricipal">
                <header id="cabecalho-artigo">
                    <h3>Noticia Principal</h3>
                    <p>O desenvolvimento atual está intrinsecamente ligado à inovação tecnológica, preocupações
                        socioambientais e mudanças na forma como percebemos e abordamos os desafios globais. O
                        cenário
                        em constante evolução cria oportunidades e desafios, exigindo uma abordagem flexível e
                        colaborativa para enfrentar os complexos problemas do século XXI.</p>
                    <img id="foto" src="fotos/principal.jpg">
                </header>
            </article>

        </section>

        </aside>
        <footer id="rodape">
            <p id="legroda"> &copy; 2023 - by Juliana </p>
        </footer>


    </div>
</body>

</html>