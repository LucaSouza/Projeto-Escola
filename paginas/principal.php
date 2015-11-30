<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../estilo/header.css">
</head>
<body>
   <?php
        include "../controle/bd.php";
        if(protegePagina()){
            echo "<div id='content'>";
            include 'header.php';
            echo "<main id='main'></main><footer id='footer'></footer></div>"; 
        }else{
            echo "Erro";
        }
    ?>
    
</body>
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/scriptPrincipal.js"></script>
</html>