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
<table>
    <tr>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Estado</th>
        <th>Telefone</th>
        <th>Email</th>
    </tr>
    <?php
    foreach ($resposta as $dados) {
        echo '<tr>';
        echo '<td>' . $dados["nome"] . '</td>';
        echo '<td>' . date('d/m/Y',  strtotime($dados["dtnascimento"] )) . '</td>';
        echo '<td>' . $dados["estado"] . '</td>';
        echo '<td>' . $dados["telefone"] . '</td>';
        echo '<td>' . $dados["email"] . '</td>';
        echo '</tr>';
    }
    ?>
</table>
<br/>
<a href="index.php">Voltar</a>

<!-- alt + shift + F //deixa bonito -->


