<?php
    include 'conexao.php';

    $sqlInserir = "insert into usuario (usuario, senha, cpf)
values ('$usario', '$senha', '$cpf')";

    ?>
    
$sql= "SELECT*FROM usuario";
$result= $conn->query ($sql);
