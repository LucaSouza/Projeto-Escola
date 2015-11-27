<?php
include "bd.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
    
if(empty($usuario) || empty($senha)){
    
    echo "Preencha os campos corretamente";
}else{
    if(conectar()){
        if(validaUsuario($usuario, $senha)){
            echo "true";
        }else{
            echo "Usuario Inexistente";
        }
        
    }else{
        echo "Não foi Possivel Conectar ao Banco de Dados";
    }
}  

?>