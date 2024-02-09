<?php
session_start();

// Destroi a sessão (faz logout)
session_destroy();

// Redireciona de volta para a página de login
header("Location: ../login.php");
exit;
?>