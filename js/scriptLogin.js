$(document).ready(function(){
     $("#entrar").click(function(){
            var registroForm = $("#registro").val();
            var senhaForm = $("#senha").val();
    
            $.post("controle/controleLogin.php",{registro: registroForm, senha: senhaForm},function(data){
                if(data){
                    //$(location).attr('href','/perfil.php');
                    alert(data);
                 }else{
                     //emitirMensagem(data);
                    alert(data);
            }})
     })
});
