<?php
session_start();
// Inserir o cadastro
include 'conexao.php';
include 'verificaLogado.php';
$nome = $_POST['tNome'];
$cpf = $_POST['tCpf'];
$email = $_POST['tEmail'];
$id = $_POST['tId'];

$cpf = preg_replace('/[^0-9]/', '', $cpf);

$sqlUpdateCad="update usuario SET cpf = '$cpf', nome= '$nome', email= '$email' WHERE id_usuario = '$id'"; 
// echo $sqlUpdateCad;die;

// Executar a query de inserção
if ($conn->query($sqlUpdateCad) === TRUE) {
    // echo "Registro alterado com sucesso.";
    $_SESSION["alertaUsuario"] = 'success';

} else {
    // echo "Erro ao alterar registro: " . $conn->error;
    $_SESSION["alertaUsuario"] = 'error';
}
// Fechar a conexão
$conn->close();

$redirectUrl = '../listarUsuario.php';
header('Location: ' . $redirectUrl);
exit();
?>
