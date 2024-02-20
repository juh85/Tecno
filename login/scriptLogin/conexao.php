<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "SiteTeste";

// Criando uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


?>