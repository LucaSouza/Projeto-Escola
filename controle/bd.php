<?php

//@param $_seguranca - Array utilizado para armazenar atributos para manipulação do banco de dados

$_seguranca['Sessao'] = true;              // utilizado para iniciar a sessão session_start()
$_seguranca['servidor'] = 'localhost';    // Servidor MySQL
$_seguranca['usuario'] = 'root';          // Usuário MySQL
$_seguranca['senha'] = 'root';            // Senha MySQL
$_seguranca['banco'] = 'apae';            // Banco de dados MySQL
$_seguranca['tabela'] = 'adm';            // Nome da tabela onde os usuários são salvos

// Verifica se precisa iniciar a sessão
if ($_seguranca['Sessao']){
  session_start();
}

// Conecta ao banco de dados
//@return $conexão - a conexao for feita com sucesso ou false para sem sucesso
function conectar(){
    global $_seguranca;
    $conexao = mysql_connect($_seguranca['servidor'],$_seguranca['usuario'],$_seguranca['senha']);
    mysql_select_db($_seguranca['banco']);
    if($conexao){
        return $conexao;    
    }else{
        return false;
    }
}

//Desconecta ao banco de dados
function desconexao(){
    global $_seguranca;
    mysql_close($_seguranca['banco']);
}

/*
  Função que recebe a validacao do metodo verificaSenhaLogin e cria sessão
  @param string $usuario - O usuário a ser validado
  @param string $senha - A senha a ser validada
  @return bool - Se o usuário foi validado ou não (true/false)
*/

function validaUsuario($usuario, $senha) {
  //Chamada de método para verificar senha e login do usuário    
  $resultadoValida = verificaSenhaLogin($usuario, $senha);

  //Verifica se encontrou algum registro
  if (empty($resultadoValida)) {
      return false;
  }else{
     // Valores atribuidos a sessao do usuario id e nome
     $_SESSION['usuarioID'] = $resultadoValida['id_adm']; // Pega o valor da coluna 'id do registro encontrado no MySQL
     $_SESSION['usuarioNome'] = $resultadoValida['registro_adm']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
      
      // Valores atribuidos a sessao do login senha e usuario para poder fazer a comparação a cada página carregada
      $_SESSION['usuarioLogin'] = addslashes($usuario);
      $_SESSION['usuarioSenha'] = addslashes($senha);

    return true;
  }
}

/*
  Função que valida o usuário e senha
  @param string $usuario - O usuário a ser validado
  @param string $senha - A senha a ser validada
  @return $resultado quando o usuário existe e false quando o usuario não existe
*/

function verificaSenhaLogin($usuario, $senha){
    global $_seguranca; 
    //Conectar ao banco de dados
    conectar();
    
    // Funçao addslashes é utilizada para escapar do sql injector
    $nusuario = addslashes($usuario);
    $nsenha = addslashes($senha);
    
    // SQL para procurar um usuário
    $sql = "SELECT `id_adm`, `registro_adm` FROM `".$_seguranca['tabela']."` WHERE `registro_adm` = '".$nusuario."' AND `senha_adm` = '".$nsenha."' LIMIT 1";
    $query = mysql_query($sql);
    $resultado = mysql_fetch_assoc($query);
    
    //Desconectar do banco de dados
    desconexao();
    
    if (!empty($resultado)){
        return $resultado;
    }else{
        return false; 
    }
}

//Função que protege uma página

function protegePagina() {
  global $_seguranca;
  
    if (!isset($_SESSION['usuarioID']) or !isset($_SESSION['usuarioNome'])) {
        // Não há usuário logado, manda pra página de login
        return expulsaVisitante();
    }else{ 
        if(isset($_SESSION['usuarioID']) and isset($_SESSION['usuarioNome'])){
            if(verificaSenhaLogin($_SESSION['usuarioLogin'],$_SESSION['usuarioSenha'])!=false){
                // Os dados batem, manda pra tela principal
                return true;
            }else{
                // Os dados não batem, manda pra página de login
                return expulsaVisitante();
            }
        }
    }
    return false;
}

//Função para retornar ao login caso a sessão expire ou tenha inconsistência de dados

function retornaLogin(){
  
  // Remove sessão
  unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);

  return false;
}
    
?>




