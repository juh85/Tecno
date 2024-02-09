<?php
session_start();//iniciar sessao

// Verifica se o usuário está logado, se não estiver, redireciona para a página de login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}
?>