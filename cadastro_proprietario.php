<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/cadastro_proprietario.css">
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
            <form id="cadastroForm" onsubmit="cadastrar()">
                <div class="card">
                    <div class="textfield">
                        <h1>Crie sua <span>conta</span> <br> e <span>gerencie</span> sua loja</h1>

                        <label for="nome">Nome</label>
                        <input type="text" placeholder="Digite seu nome..." id="nome" onkeypress="return apenasLetras(event)" required>

                        <label for="nome-estabelecimento">Nome do estabelecimento</label>
                        <input type="text" placeholder="Digite o nome do estabelecimento..." id="nomeEstabelecimento" onkeypress="return apenasLetrasENumeros(event)" required>

                        <div class="textfield">
                            <label for="email">Email</label>
                            <input type="email" placeholder="Digite seu Email..." id="email" required>
                        </div>

                        <div class="textfield">
                            <label for="senha">Senha</label>
                            <input type="password" placeholder="Digite sua senha..." id="senha" required>
                        </div>

                        <button type="button" class="btn">Cadastrar</button>
                    </div>

                    <a href="/HTML/index.html" class="link"><i class="fas fa-arrow-left"></i> Voltar</a>
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
            const nome = document.getElementById("nome").value;
            const nomeEstabelecimento = document.getElementById("nomeEstabelecimento").value;
            const email = document.getElementById("email").value;
            const senha = document.getElementById("senha").value;

            if (nome === "" || nomeEstabelecimento === "" || email === "" || senha === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Por favor, preencha todos os campos.'
                });
                return;
            }


            if (!validarEmail(email)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Por favor, insira um endereço de email válido.'
                });
                return;
            }

            if (senha.length < 8) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'A senha deve conter pelo menos 8 dígitos.'
                });
                return;
            }
                }
    </script>

    <script>
         function cadastrar() {
   var nome = document.getElementById('nome').value;
   var nomeEstabelecimento = document.getElementById('nomeEstabelecimento').value;
   var email = document.getElementById('email').value;
   var senha = document.getElementById('senha').value;

   // Cria um objeto FormData para enviar os dados
   var formData = new FormData();
   formData.append('nome', nome);
   formData.append('nomeEstabelecimento', nomeEstabelecimento);
   formData.append('email', email);
   formData.append('senha', senha);

   // Envia os dados para o PHP usando AJAX
   var xhr = new XMLHttpRequest();
   xhr.open('POST', 'cadastrar.php', true);
   xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         
   };
   xhr.send(formData);
}
</script>
</body>
</html>
