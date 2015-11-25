<?php

    function conectar(){
        $conexao = mysql_connect("localhost","root","root");
        mysql_select_db("apae");
    }

    function fechar_conexao(){
        mysql_close("apae");
    }

    function buscarIdPessoa($registro, $senha){
        /*conectar();
        
        $sql = "select * from pessoa where registro = '$registro' and senha = '$senha';";
        $resultado = mysql_query($sql);
        $reg = mysql_fetch_row($resultado);
        fechar_conexao();
        if(!$resultado){
            return false;
        }
        return $reg[0];
    }*/
        return 'true';
    }
?>