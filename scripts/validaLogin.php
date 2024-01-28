<?php
$cpf = $_POST['tCpf'];
$senha = $_POST['tPassword'];
include 'conexao.php';

$cpf = preg_replace('/[^0-9]/', '', $cpf); // limpar cpf para somente numero
$sql = "SELECT * FROM usuario where cpf='$cpf' and senha='$senha'";

$result = $conn->query($sql);

if ($result) {
    // Verifica se encontrou algum registro
    if ($result->num_rows > 0) {
        // Usuário encontrado, $resposta contém os resultados da consulta
        $resposta = $result->fetch_all(MYSQLI_ASSOC);
        // Redireciona para a página desejada
        header("Location: ../admin.php");
        exit();
    } else {
        // Nenhum registro encontrado, usuário não existe
        echo "Usuário não encontrado!";
    }
} else {
    // Erro na consulta SQL
    echo "Erro na consulta: " . $conn->error;
}

// Fechar a conexão
$conn->close();
