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

$sql = "SELECT * FROM dados INNER JOIN estado ON dados.estado = estado.id";
$result = $conn->query($sql);

// Agora $resposta contém os resultados da consulta
$resposta = $result->fetch_all(MYSQLI_ASSOC);

// Fechar a conexão
$conn->close();

// echo '<pre>';
// var_dump($resposta); // Exemplo de como visualizar os resultados

// echo $resposta[0]['nome']; --caso nao montar foreach ou for para acessar o array

?>
<a href="admin.php">Area Administrativa</a>
<table id='tabelaC'>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Estado</th>
            <th>Telefone</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($resposta as $dados) {
            echo '<tr>';
            echo '<td>' . $dados["nome"] . '</td>';
            echo '<td>' . date('d/m/Y',  strtotime($dados["dtnascimento"])) . '</td>';
            echo '<td>' . $dados["estado"] . '</td>';
            echo '<td>' . $dados["telefone"] . '</td>';
            echo '<td>' . $dados["email"] . '</td>';
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

<!-- alt + shift + F //deixa bonito -->