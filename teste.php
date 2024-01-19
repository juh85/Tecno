<?php
// var_dump($_POST['tNome']);
$nome = $_POST['tNome'];
$idade = $_POST['tIdade'];
$estado = $_POST['tEstado'];
$telefone = $_POST['tTelefone'];
$mail = $_POST['tMail'];
echo $nome . $idade . $estado . $telefone . $mail . '<br/>'; 
echo '<a href="Pagina.html">Voltar</a>';



$sqlInsert = "insert into cadastro (nome, idade, estado, telefone, email)
values ('$nome', '$idade', '$estado', '$telefone', '$mail')";
echo $sqlInsert;