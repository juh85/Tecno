<?php
include 'conexao.php';
include 'verificaLogado.php';

if (isset($_POST['id'])) {
    $idDelCad = filter_input(INPUT_POST, 'id', FILTER_DEFAULT); //protecao contra terceiros ou sem $_GET['id']
}
if (isset($idDelCad)) {
    $sqlDelCad = 'delete from dados where id="' . $idDelCad . '"';
    if ($conn->query($sqlDelCad) === TRUE) {
        echo "Registro apagado com sucesso.";
    } else {
        echo "Erro ao apagar registro: " . $conn->error;
    }
    $conn->close();
}
?>