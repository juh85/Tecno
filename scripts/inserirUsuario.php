<?php
// Inserir o cadastro
include 'conexao.php';
include 'verificaLogado.php';
$nome = $_POST['tNome'];
$cpf = $_POST['tCpf'];
$email = $_POST['tEmail'];
$senha = $_POST['tSenha'];
$senhaConf = $_POST['tConfS'];

$cpf = preg_replace('/[^0-9]/', '', $cpf);

if($senha != $senhaConf){
    echo 'As senhas não estão iguais.. ';
    echo '<a href="../admin.php">Voltar</a>';
    die;
}
$sqlInsertCad="insert into usuario (cpf, senha, nome, email)
values('$cpf', '$senha', '$nome', '$email')";

// Executar a query de inserção
if ($conn->query($sqlInsertCad) === TRUE) {
    echo "Registro inserido com sucesso." ;
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}
// Fechar a conexão
$conn->close(); 

$redirectUrl = '../admin.php';
header('Location: ' . $redirectUrl);

echo '<a href="../admin.php">Voltar</a>';
?>


 