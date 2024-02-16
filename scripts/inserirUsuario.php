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
$senhacriptografada = md5($senha);

$sqlInsertCad="insert into usuario (cpf, senha, nome, email)
values('$cpf', '$senhacriptografada', '$nome', '$email')";

// Executar a query de inserção
if ($conn->query($sqlInsertCad) === TRUE) {
    $_SESSION["alertaUsuario"] = 'success';
    
} else {
    $_SESSION["alertaUsuario"] = 'error';
}
// Fechar a conexão
$conn->close();
$redirectUrl = '../listarUsuario.php';
header('Location: ' . $redirectUrl);

?>


 