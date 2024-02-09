<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<!-- IMPORTAÇÕES TABELA -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Inclua os arquivos CSS e JS do DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<?php
include 'scripts/conexao.php';
include 'scripts/verificaLogado.php';

$sql = "SELECT estado.id as estado_id, estado.estado as nome_estado,dados.* FROM dados INNER JOIN estado ON dados.estado = estado.id";
$result = $conn->query($sql);

// Agora $resposta contém os resultados da consulta
$resposta = $result->fetch_all(MYSQLI_ASSOC);

// Fechar a conexão
$conn->close();

// echo '<pre>';
// var_dump($resposta); // Exemplo de como visualizar os resultados

// echo $resposta[0]['nome']; --caso nao montar foreach ou for para acessar o array
if (isset($_SESSION["alertaUsuario"])) {
    if ($_SESSION["alertaUsuario"] == 'success') {
        $successMessage = 'Solicitação processada com sucesso';
    } elseif ($_SESSION["alertaUsuario"] == 'error') {
        $errorMessage = 'Erro na solicitação.';
    }
    unset($_SESSION["alertaUsuario"]);
}
?>

<a href="admin.php">Area Administrativa</a>
<?php
if (isset($successMessage)) {
    echo '
                <div id="alert-success" class="alert alert-success alert-dismissible">
                    ' . $successMessage . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
} elseif (isset($errorMessage)) {
    echo '
                <div id="alert-error" class="alert alert-danger alert-dismissible">
                    ' . $errorMessage . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
}
?>
<table id='tabelaC'>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Estado</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($resposta as $dados) {
            echo '<tr>';
            echo '<td>' . $dados["nome"] . '</td>';
            echo '<td>' . date('d/m/Y',  strtotime($dados["dtnascimento"])) . '</td>';
            echo '<td>' . $dados["nome_estado"] . '</td>';
            echo '<td>' . $dados["telefone"] . '</td>';
            echo '<td>' . $dados["email"] . '</td>';
            echo '<td> <a href= "editarCadastro.php?id=' . $dados["id"] . '">Editar</a> / 
            <button type="button" class="apagaCad" name="' . $dados["id"] . '" style="margin-top:3px;">Excluir </button>
             </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>


<script>
    $('#tabelaC').dataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json" // Inclua o arquivo de tradução para português
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // Fecha o alerta ao clicar no botão de fechar (X)
        $('#alert-success .close').on('click', function() {
            var alertSuccess = $('#alert-success');
            alertSuccess.fadeOut(500, function() {
                alertSuccess.remove();
            });
        });

        $('#alert-error .close').on('click', function() {
            var alertError = $('#alert-error');
            alertError.fadeOut(500, function() {
                alertError.remove();
            });
        });

        // Desaparece o alerta após 4 segundos (4000 milissegundos)
        var alertSuccess = $('#alert-success');
        var alertError = $('#alert-error');

        if (alertSuccess.length) {
            setTimeout(function() {
                alertSuccess.fadeOut(500, function() {
                    alertSuccess.remove();
                });
            }, 4000);
        }

        if (alertError.length) {
            setTimeout(function() {
                alertError.fadeOut(500, function() {
                    alertError.remove();
                });
            }, 4000);
        }
    });

    $('.apagaCad').click(function() {
        var idCad = $(this).attr("name");
        $.ajax({
            type: "POST",
            data: {
                id: idCad,
            },
            url: 'scripts/deletarCadastro.php'
        }).done(function(resposta) {
            alert(resposta)
            setTimeout(function() {
                window.location.reload(true);
            }, 1000);

        })
    })
</script>
<!-- alt + shift + F //deixa bonito -->