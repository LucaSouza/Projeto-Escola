$(document).ready(function(){
     $("#entrar").click(function(){
            var usuarioForm = $("#usuario").val();
            var senhaForm = $("#senha").val();
    
            $.post("controle/controleLogin.php",{usuario: usuarioForm, senha: senhaForm},function(data){
                if(data=='true'){
            $(location).attr('href','paginas/principal.php');
                 }else{
                     emitirMensagem(data);
            }})
     })
     
      function emitirMensagem(mensagem){
        $("#mensagem").html(mensagem);
        $( "#mensagem" ).slideDown( "fast", "linear" ).delay(2000);
        $( "#mensagem" ).slideUp( "fast", "linear" );
    }
});
