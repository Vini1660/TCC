<?php
$servername = "db4free.net";
$username = "root64";
$password = "idfc9856";
$database = "pdvhermes";

// Estabelecer conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>