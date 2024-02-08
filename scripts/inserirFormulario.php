<?php
include 'conexao.php';

// dados que vieram do formulario
$nome = $_POST['tNome'];
$nascimento = $_POST['tNascimento'];
$estado = $_POST['tEstado'];
$telefone = $_POST['tTelefone'];
$mail = $_POST['tMail'];
// echo $nome . $nascimento . $estado . $telefone . $mail . '<br/>';

$sqlInsert = "insert into dados (nome, dtnascimento, estado, telefone, email)
values ('$nome', '$nascimento', '$estado', '$telefone', '$mail')";

// Executar a query de inserção
if ($conn->query($sqlInsert) === TRUE) {
    echo "Cadastro realizado com sucesso.";
} else {
    echo "Falha ao cadastrar, Tente novamente.";
}
// Fechar a conexão
$conn->close();


?>



