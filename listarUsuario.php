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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Inclua os arquivos CSS e JS do DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<?php
session_start();
include 'scripts/conexao.php';
include 'scripts/funcoes.php';
$sqlUS = "SELECT * FROM usuario";
$result = $conn->query($sqlUS);

// Agora $resposta contém os resultados da consulta
$resposta = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();

if (isset($_SESSION)) {
    if ($_SESSION["alertaUsuario"] == 'success') {
        $successMessage = 'Solicitação processada com sucesso';
    } elseif ($_SESSION["alertaUsuario"] == 'error') {
        $errorMessage = 'Erro na solicitação.';
    }
    unset($_SESSION["alertaUsuario"]);
}
?>
<a href="admin.php">
    < Area Administrativa</a>
        <br />
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
        <div id='tabela'>
            <table id='listarUsuario'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Email</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($resposta as $dados) {
                        echo '<tr>';
                        echo '<td>' . $dados["nome"] . '</td>';
                        echo '<td>' . formatar_cpf_cnpj($dados["cpf"]) . '</td>';
                        echo '<td>' . $dados["email"] . '</td>';
                        echo '<td> <a href="editarUsuario.php?id=' . $dados["id_usuario"] . '">Editar</a> /
                        <a href="deletarUsuario.php?id=' . $dados["id_usuario"] . '" onclick="return confirm(\'Tem certeza que deseja deletar este usuário?\')">Deletar</a> 
                        </td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <script>
            $('#listarUsuario').dataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json" // Inclua o arquivo de tradução para português
                }
            });
        </script>

        <!-- utilizar quando tiver bootstrap -->
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
        </script>