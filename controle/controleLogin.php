<?php
include "bd.php";

$registro = $_POST['registro'];
$senha = $_POST['senha'];
    
if(empty($registro) || empty($senha)){
    echo "Preencha os campos corretamente";
}else{
    echo "certinho";
}  

?>