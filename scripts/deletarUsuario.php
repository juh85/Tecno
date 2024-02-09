<?php
include 'conexao.php';
include 'verificaLogado.php';

if (isset($_POST['id'])) {
    $idDelUsu = filter_input(INPUT_POST, 'id', FILTER_DEFAULT); //protecao contra terceiros ou sem $_GET['id']
}
if (isset($idDelUsu)) {
    $sqlDelUsu = 'delete from usuario where id_usuario="' . $idDelUsu . '"';
    if ($conn->query($sqlDelUsu) === TRUE) {
        echo "Registro apagado com sucesso.";
    } else {
        echo "Erro ao apagar registro: " . $conn->error;
    }
    $conn->close();
}
