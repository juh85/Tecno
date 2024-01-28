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
include 'scripts/conexao.php';
include 'scripts/funcoes.php';
$sqlUS = "SELECT * FROM usuario";
$result = $conn->query($sqlUS);

// Agora $resposta contém os resultados da consulta
$resposta = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();

//echo '<pre>';
// var_dump($resposta); // Exemplo de como visualizar os resultados

?>
<a href="admin.php">< Area Administrativa</a>
<br />
<div id='tabela'>
    <table id='listarUsuario'>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cpf</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resposta as $dados) {
                echo '<tr>';
                echo '<td>' . $dados["nome"] . '</td>';
                echo '<td>' . formatar_cpf_cnpj($dados["cpf"]) . '</td>';
                echo '<td>' . $dados["email"] . '</td>';
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