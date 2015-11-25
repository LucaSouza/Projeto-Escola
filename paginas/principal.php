<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../estilo/header.css">
</head>
<body>
    <div id="content">
        <?php include "header.php"?>
        <main id="main">
            <div id="container-formulario">
                <div id="cabecario-formulario">Cabeçario</div>
                <form action="" method="post" id="form">
                    <input type="text" class="input-form input100" placeholder="Nome Completo">
                    <input type="text" class=" input-form input25" placeholder="99.999.999-9">
                    <input type="text" class="input-form input25 marginleft" placeholder="Orgão Expedidor">
                    <input type="select" class="input-form input25 marginleft" placeholder="999.999.999-99">
                    <input type="date" class="input-form input25 marginleft" placeholder="Nascimento">
                    <input type="text" class=" input-form input25" placeholder="Naturalidade">
                    <input type="text" class="input-form input25 marginleft" placeholder="Estado">
                    <input type="text" class="input-form input5 marginleft" placeholder="Sexo">
                    <input type="text" class="input-form input20 marginleft" placeholder="Cor">
                    <input type="text" class="input-form input25 marginleft" placeholder="Profissão">
                    <input type="text" class="input-form input100" placeholder="Nome da Mãe">
                    <input type="text" class="input-form input100" placeholder="Nome do Pai">
                    <input type="text" class=" input-form input25" placeholder="Rua">
                    <input type="text" class="input-form input25 marginleft" placeholder="Número">
                    <input type="text" class="input-form input25 marginleft" placeholder="Bairro">
                    <input type="text" class="input-form input25 marginleft" placeholder="Complemento">
                    <input type="text" class=" input-form input25" placeholder="Cidade">
                    <input type="text" class="input-form input25 marginleft" placeholder="UF">
                    <input type="text" class="input-form input25 marginleft" placeholder="Telefone">
                    <input type="text" class="input-form input25 marginleft" placeholder="Telefone">
                    <button type="button" id="botao-form">Cadastrar</button>
                </form>
            </div>
        </main>
        <footer id="footer"></footer>
    </div>
</body>
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/scriptPrincipal.js"></script>
</html>