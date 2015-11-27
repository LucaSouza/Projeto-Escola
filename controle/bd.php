<?php
/**
* Sistema de segurança com acesso restrito
*
* Usado para restringir o acesso de certas páginas do seu site
*
* @author Thiago Belem <contato@thiagobelem.net>
* @link http://thiagobelem.net/
*
* @version 1.0
* @package SistemaSeguranca
*/

//  Configurações do Script
// ==============================
//$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
//$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?

//$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'

$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
// Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.



//$_SG['paginaLogin'] = '/index.php'; // Página de login

//$_SG['tabela'] = 'adm';       // Nome da tabela onde os usuários são salvos
// ==============================

// ======================================
//   ~ Não edite a partir deste ponto ~
// ======================================
function conectar(){
    $_SG['servidor'] = 'localhost';    // Servidor MySQL
    $_SG['usuario'] = 'root';          // Usuário MySQL
    $_SG['senha'] = 'root';                // Senha MySQL
    $_SG['banco'] = 'apae';            // Banco de dados MySQL
    $conexao = mysql_connect($_SG['servidor'],$_SG['usuario'],$_SG['senha']);
    mysql_select_db($_SG['banco']);
    return $conexao;
}

// Verifica se precisa iniciar a sessão
//if ($_SG['abreSessao'] == true){
//  session_start();
//}
//    return true;
//}
/**
* Função que valida um usuário e senha
*
* @param string $usuario - O usuário a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/
function validaUsuario($usuario, $senha) {
    global $_SG;
  $_SG['tabela'] = 'adm';       // Nome da tabela onde os usuários são salvos
  // Usa a função addslashes para escapar as aspas sql injector
  $nusuario = addslashes($usuario);
  $nsenha = addslashes($senha);

  // Monta uma consulta SQL (query) para procurar um usuário
  $sql = "SELECT `id_adm`, `registro_adm` FROM `".$_SG['tabela']."` WHERE `registro_adm` = '".$nusuario."' AND `senha_adm` = '".$nsenha."' LIMIT 1";
  $query = mysql_query($sql);
  $resultado = mysql_fetch_assoc($query);

  // Verifica se encontrou algum registro
  if (empty($resultado)) {
    // Nenhum registro foi encontrado => o usuário é inválido
    return false;
  } else {
    session_start();
    // Definimos dois valores na sessão com os dados do usuário
    $_SESSION['usuarioID'] = $resultado['id_adm']; // Pega o valor da coluna 'id do registro encontrado no MySQL
    $_SESSION['usuarioNome'] = $resultado['registro_adm']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL

    // Verifica a opção se sempre validar o login
    if ($_SG['validaSempre'] == true) {
      // Definimos dois valores na sessão com os dados do login
      $_SESSION['usuarioLogin'] = $usuario;
      $_SESSION['usuarioSenha'] = $senha;
    }

    return true;
  }
}

/**
* Função que protege uma página
*/
function protegePagina() {
  $_SG['validaSempre'] = true;

  if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
    // Não há usuário logado, manda pra página de login
    return expulsaVisitante();
  } else if (isset($_SESSION['usuarioID']) && isset($_SESSION['usuarioNome'])) {
    // Há usuário logado, verifica se precisa validar o login novamente
    if ($_SG['validaSempre'] == true) {
      // Verifica se os dados salvos na sessão batem com os dados do banco de dados
      if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
        // Os dados não batem, manda pra tela de login
        return expulsaVisitante();
      }
    }
  }
    return true;
}

/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
  global $_SG;

  // Remove as variáveis da sessão (caso elas existam)
  unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);

  // Manda pra tela de login
  return false;
}