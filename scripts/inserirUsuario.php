<?php
// Inserir o cadastro
include 'conexao.php';
$nome = $_POST['tNome'];
$cpf = $_POST['tCpf'];
$email = $_POST['tEmail'];
$senha = $_POST['tSenha'];

$sqlInsertCad="insert into usuario (cpf, senha, nome, email)
values('$cpf', '$senha', '$nome', '$email')";

// Executar a query de inserção
if ($conn->query($sqlInsert) === TRUE) {
    echo "Registro inserido com sucesso.";
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}
// Fechar a conexão
$conn->close();

echo '<a href="../admin.php">Voltar</a>';
?>
