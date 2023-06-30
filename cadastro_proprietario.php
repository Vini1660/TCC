<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel_acesso = 'Proprietário';

    $query = "INSERT INTO usuario (nome, email, senha, nivel_acesso) VALUES ('$nome', '$email', '$senha', '$nivel_acesso')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        // Código de sucesso
    } else {
        // Código de erro
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TCC/CSS/cadastro_proprietario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <title>Cadastro proprietário</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main">
        <div class="left">

        <form action="/TCC/cadastro_proprietario.php" method="POST" id="cadastroForm" onsubmit="return cadastrar()">
    

            <div class="card">
                <div class="textfield">
                    <h1>Crie sua <span>conta</span> <br> e <span>gerencie</span> sua loja</h1>

                    <label for="nome">Nome</label>
                    <input type="text" placeholder="Digite seu nome..." id="nome" name="nome"
                        onkeypress="return apenasLetras(event)">

                    <div class="textfield">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Digite seu Email..." id="email" name="email">
                    </div>

                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" placeholder="Digite sua senha..." id="senha" name="senha">
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn" onclick="cadastrar()">Cadastrar</button>
                </div>

                <a href="/TCC/index.php" class="link"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>
        </form>

    </div>

    <div class="right">
        <img src="" class="img">
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<script>
    function apenasLetras(event) {
        const key = event.keyCode;
        return (
            (key >= 65 && key <= 90) || // letras maiúsculas
            (key >= 97 && key <= 122) || // letras minúsculas
            key === 8 || // tecla Backspace
            key === 32 // espaço
        );
    }

    function apenasLetrasENumeros(event) {
        const key = event.keyCode;
        return (
            (key >= 65 && key <= 90) || // letras maiúsculas
            (key >= 97 && key <= 122) || // letras minúsculas
            (key >= 48 && key <= 57) || // números
            key === 8 || // tecla Backspace
            key === 32 // espaço
        );
    }

    function validarEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function cadastrar() {
        const nome = document.getElementById("nome").value.trim();
        const email = document.getElementById("email").value.trim();
        const senha = document.getElementById("senha").value.trim();

        if (!nome || !email || !senha) {
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Por favor, preencha todos os campos.',
                timer: 3000
            });
            return false;
        }

        if (!validarEmail(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Por favor, insira um endereço de email válido.',
                timer: 3000
            });
            return false;
        }

        if (senha.length < 8) {
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'A senha deve conter pelo menos 8 dígitos.',
                timer: 3000
            });
            return false;
        } else
        // Cadastro realizado com sucesso
        Swal.fire({
            icon: 'success',
            title: 'Cadastro realizado',
            text: 'Usuário cadastrado com sucesso!',
            timer: 3000, // Tempo em milissegundos (3 segundos)
            showConfirmButton: false // Remove o botão "OK"
        });
    }
</script>
