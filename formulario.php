<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="css/estilo.css" />

<head>
    <meta charset="UTF-8" />
    <title>Formulario</title>
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


    <h1>Formulario</h1>
    <p>Deixe seu contato para receber mais informações sobre os desenvolvimento do mundo</p>
    <nav>
        <fieldset id="formulario">
            <legend>Seus dados</legend>
            <p><label for="cNome">Nome:</label> <input type="text" name="tNome" id="cNome" size="20" maxlength="30"
                    placeholder="Nome Completo"> </p>
            <p><label for="cNascimento">Data de Nascimento:</label> <input type="date" name="tNascimento"
                    id="cNascimento"> </p>
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
            <p> <label for="cTelefone">Telefone: <input type="text" name="tTelefone" id="cTelefone" size="15"
                        maxlength="15"></label></p>
            <p><label for="cMail">E-mail: <input type="text" name="tMail" id="cMail" size="30" maxlength="50"
                        placeholder="E-mail"></label></p>

        </fieldset>
        <button type="button" class="enviaForm btn btn-primary" style="margin-top:3px;">Cadastrar</button>


        </aside>
        <footer id="rodape">
            <p id="legroda"> &copy; 2023 - by Juliana </p>
        </footer>


        </div>
</body>

</html>
<script>
$('.enviaForm').click(function() {
    var nome = $("#cNome").val();
    var nascimento = $("#cNascimento").val();
    var estado = $("#cEstado").val();
    var telefone = $("#cTelefone").val();
    var email = $("#cMail").val();
    if (nome == "") {
        alert("Preencha o campo nome")
        $("#cNome").focus()
        return false;
    }
    if (nascimento == "") {
        alert("Preencha o campo Nascimento")
        $("#cNascimento").focus()
        return false;
    }
    if (estado == "") {
        alert("Preencha o campo Estado")
        $("#cEstado").focus()
        return false;
    }
    if (telefone == "") {
        alert("Preencha o campo Telefone")
        $("#cTelefone").focus()
        return false;
    }
    if (email == "") {
        alert("Preencha o campo Email")
        $("#cMail").focus()
        return false;
    }

    $.ajax({
        type: "POST",
        data: {
            tNome: nome,
            tNascimento: nascimento,
            tEstado: estado,
            tTelefone: telefone,
            tMail: email
        },
        url: 'scripts/inserirFormulario.php'
    }).done(function(resposta) {
        alert(resposta)
        $("#cNome").val("");
        $("#cNascimento").val("");
        $("#cEstado").val("");
        $("#cTelefone").val("");
        $("#cMail").val("");
    })

})
</script>