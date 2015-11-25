function menuPrincipal(){
        $("#menu").html("<ul><li id='item-1' onclick='subPessoa()'>1</li><li id='item-2' onclick='subRelogio()'>2</li><li id='item-3'>3</li><li id='item-4'>4</li><li id='item-5'>5</li></ul>");
};

function subPessoa(){
    $("#menu").html("<ul><li id='item-voltar' onclick='menuPrincipal()'>voltar</li><li id='item-1'>6</li><li id='item-2'>7</li><li id='item-3'>8</li><li id='item-4'>9</li><li id='item-5'>10</li></ul>");
};

function subRelogio(){
    $("#menu").html("<ul><li id='item-voltar' onclick='menuPrincipal()'>voltarr</li><li id='item-1'>6</li><li id='item-2'>7</li><li id='item-3'>8</li><li id='item-4'>9</li><li id='item-5'>10</li></ul>");
};

function criarFormCadastroPessoal(){
    $("#main").html();
};

$( "#button-menu" ).click(function() {
    $("#menu").toggleClass( "mostraMenu" );
    $("#button-menu").toggleClass("moveButtonMenu");
});

$("main").click(function(){
    if($("#menu").hasClass("mostraMenu")){
        $("#menu").removeClass( "mostraMenu" );
        $("#button-menu").removeClass("moveButtonMenu");
    }
});
$( document ).ready(criarFormCadastroPessoal(), menuPrincipal())
