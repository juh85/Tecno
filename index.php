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

    <div id="corpo">
        <header id="cabecalho">
            <hgroup>
                <h1 id="titulo">Tudo em Desenvolvimento</h1>
                <h2 id="subtitulo">Descubra tudo que esta em desenvolvimento hoje no mundo</h2>
            </hgroup>
            
        
        </header>
        
        <section id="secao">
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
        <aside id="lateral">
            <h1>Formulario</h1>
            <p>Deixe seu contato para receber mais informações sobre os desenvolvimento do mundo</p>
            <nav>
                <form method="post" action="scripts/inserirFormulario.php">
                    <fieldset id="formulario">
                        <legend>Seus dados</legend>
                        <p><label for="cNome">Nome:</label> <input type="text" name="tNome" id="cNome" size="20" maxlength="30" placeholder="Nome Completo"> </p>
                        <p><label for="cNascimento">Data de Nascimento:</label> <input type="date" name="tNascimento" id="CNascimento"> </p>
                        <p><label for="cEstado">Estado:</label>
                            <select name="tEstado" id="cEstado" required>
                                <option value="">Selecione</option>
                                <?php
                                foreach ($resultEstados as $estados) {
                                    echo '<option value="' . $estados["id"] . '">' . $estados["estado"] . '</option>';
                                }
                                ?>
                            </select>
                        </p>
                        <p> <label for="cTelefone">Telefone: <input type="text" name="tTelefone" id="cTelefone" size="15" maxlength="15"></label></p>
                        <p><label for="cMail">E-mail: <input type="text" name="tMail" id="cMail" size="30" maxlength="50" placeholder="E-mail"></label></p>

                    </fieldset>
                    <input type="submit" id="botao" value="Enviar" />
                </form>

        </aside>
        <footer id="rodape">
            <p id="legroda"> &copy; 2023 - by Juliana </p>
        </footer>


    </div>
</body>

</html>