<?php

// Inserir o cadastro
include 'conexao.php';
include 'verificaLogado.php';
$nome = $_POST['tNome'];
$email = $_POST['tEmail'];
$id = $_POST['tId'];
$telefone = $_POST['tTelefone'];
$estado = $_POST['tEstado'];
$nascimento = $_POST['tNascimento'];

$sqlUpdateCad = "update dados set nome='$nome', email='$email', telefone='$telefone', estado='$estado', dtnascimento='$nascimento' where id ='$id'";

// Executar a query de inserção
if ($conn->query($sqlUpdateCad) === TRUE) {
    $_SESSION["alertaUsuario"] = 'success';
} else {
    $_SESSION["alertaUsuario"] = 'error';
}
// Fechar a conexão
$conn->close();

$redirectUrl = '../listarCadastro.php';
header('Location: ' . $redirectUrl);
exit();
