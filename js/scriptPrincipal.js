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
    $("#main").html("<div id='container-formulario'><div id='cabecario-formulario'>CADASTRO PESSOAL</div><form action='' method='post' id='form'><input type='text' class='input-form input1' placeholder='Nome Completo'><input type='text' class='input-form input2' placeholder='Identidade'><input type='text' class='input-form input2 marginleft1' placeholder='Orgão Expedidor'><input type='select' class='input-form input2' placeholder='CPF'><input type='date' class='input-form input2 marginleft1' placeholder='Nascimento'><input type='text' class='input-form input2' placeholder='Naturalidade'><input type='text' class='input-form input2 marginleft1' placeholder='Estado'><select class='input-form input3'><option value='sexo'>Sexo</option><option value='Masculino'>Masculino</option><option value='Feminino'>Feminino</option></select><input type='text' class='input-form input3 marginleft1' placeholder='Cor'><input type='text' class='input-form input2 marginleft1' placeholder='Profissão'><input type='text' class='input-form input1' placeholder='Nome da Mãe'><input type='text' class='input-form input1' placeholder='Nome do Pai'><input type='text' class=' input-form input2' placeholder='Rua'><input type='text' class='input-form input4 marginleft1' placeholder='Número'><input type='text' class='input-form input5 marginleft1' placeholder='Bairro'><input type='text' class='input-form input2' placeholder='Complemento'><input type='text' class=' input-form input5 marginleft1' placeholder='Cidade'><input type='text' class='input-form input4 marginleft1' placeholder='UF'><input type='text' class='input-form input2 ' placeholder='Telefone'><input type='text' class='input-form input2 marginleft1' placeholder='Telefone'></form><button type='button' id='botao-form'>Cadastrar</button></div>");
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
