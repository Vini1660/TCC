<?php
require_once "config.php";

// Captura os dados enviados pelo formulário
$nome = $_POST['nome'];
$nomeEstabelecimento = $_POST['nomeEstabelecimento'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Realiza o tratamento necessário dos dados, como validação e sanitização

// Executa a consulta SQL de inserção
$sql = "INSERT INTO usuarios (nome, nomeEstabelecimento, email, senha) VALUES ('$nome', '$nomeEstabelecimento', '$email', '$senha')";

if (mysqli_query($conn, $sql)) {
   // Inserção bem-sucedida
   echo "Dados inseridos com sucesso";
} else {
   // Erro na inserção
   echo "Erro ao inserir os dados: " . mysqli_error($conn);
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
