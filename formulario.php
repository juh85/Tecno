<?php include 'nav.php'; ?>


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
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-5">
        <h2>Se inscreva para receber notícias</h2>
        <p class="font-weight-light">Deixe seu contato para receber mais informações sobre os desenvolvimento do mundo</p>
        </div>
        <div class="col-md-7">
            <legend>Seus dados</legend>
            <div class="form-group">
                <label for="cNome">Nome:</label>
                <input class="form-control" type="text" name="tNome" id="cNome" size="20" maxlength="30"
                    placeholder="Nome Completo">
            </div>
            <div class="form-group">
                <label for="cNascimento">Data de Nascimento:</label>
                <input class="form-control" type="date" name="tNascimento" id="cNascimento">
            </div>
            <div class="form-group">
                <label for="cEstado">Estado:</label>
                <select class="form-control" name="tEstado" id="cEstado" required>
                    <option value="">Selecione</option>
                    <?php
                            foreach ($resultEstados as $estados) {
                                echo '<option value="' . $estados["id"] . '">' . $estados["estado"] . '</option>';
                            }
                            ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cTelefone">Telefone:</label>
                <input class="form-control" type="text" name="tTelefone" id="cTelefone" size="15" maxlength="15">
            </div>
            <div class="form-group">
                <label for="cMail">E-mail:</label>
                <input class="form-control" type="text" name="tMail" id="cMail" size="30" maxlength="50"
                    placeholder="E-mail">
            </div>
            <button type="button" class="enviaForm btn btn-primary" style="margin-top:3px;">Inscreva-se</button>
        </div>
        
    </div>
</div>
<?php include 'footer.php'; ?>

<script>
$(document).ready(function() {
    $('#cTelefone').inputmask('(99)99999-9999');

})

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