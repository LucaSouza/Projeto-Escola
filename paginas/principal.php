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
                    <input type="text" class="input-form input25 " placeholder="Orgão Expedidor">
                    <input type="select" class="input-form input25 " placeholder="999.999.999-99">
                    <input type="date" class="input25 " placeholder="Nascimento">
                    <input type="text" placeholder="Naturalidade">
                    <input type="text" placeholder="Estado">
                    <input type="text" placeholder="Sexo">
                    <input type="text" placeholder="Cor">
                    <input type="text" placeholder="Profissão">
                    <input type="text" placeholder="Nome da Mãe">
                    <input type="text" placeholder="Nome do Pai">
                    <input type="text" placeholder="Rua">
                    <input type="text" placeholder="Número">
                    <input type="text" placeholder="Bairro">
                    <input type="text" placeholder="Complemento">
                    <input type="text" placeholder="Cidade">
                    <input type="text" placeholder="UF">
                    <input type="text" placeholder="Telefone">
                    <input type="text" placeholder="Telefone">
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