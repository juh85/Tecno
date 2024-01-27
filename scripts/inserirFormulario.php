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
    echo "Registro inserido com sucesso.";
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}
// Fechar a conexão
$conn->close();

echo '<br/> <a href="../login.php"> Listar Cadastro</a> <br/>'; 
echo '<a href="../index.php">Voltar</a>';
?>



