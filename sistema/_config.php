<?php
/**
 * Configuração do Sistema de Administração
 * 
 * By Alat
 */

# Classes
define("PASTA_CLASSES_GERAIS","../../_framework/_classesGerais/"); # Classes Gerais
define("PASTA_CLASSES","../_classes/");                            # Classes Específicas

# Funções
define("PASTA_FUNCOES_GERAIS","../../_framework/_funcoesGerais/");  # Funções Gerais
define("PASTA_FUNCOES","../_funcoes/");                             # Funções Específicas

# Figuras
define("PASTA_FIGURAS_GERAIS","../../_framework/_imgGerais/");     # Figuras Gerais
define("PASTA_FIGURAS","../_img/");                                # Figuras Específicas

# Estilos
define("PASTA_ESTILOS_GERAIS","../../_framework/_cssGerais/");     # Estilos Gerais (Foundation)
define("PASTA_ESTILOS","../_css/");                                # Estilos Específicos

# Inicia a Session
session_start();
session_cache_limiter('private'); 

# Funções	
include_once (PASTA_FUNCOES_GERAIS."funcoes.gerais.php");
include_once (PASTA_FUNCOES."funcoes.especificas.php");

# Dados do Browser
$browser = get_BrowserName();
define("BROWSER_NAME",$browser['browser']);	# Nome do browser
define("BROWSER_VERSION",$browser['version']);	# Versão do browser

# Pega o ip e nome da máquina
define("IP",getenv("REMOTE_ADDR"));        # Ip da máquina
#define("MAQUINA",getenv("REMOTE_HOST"));   # O nome da máquina
#define("SERVER",getenv("SERVER_NAME"));    # O nome do servidor

# Sistema Operacional
define("SO",get_So());

# Programa Chamador
$arquivo = explode("/",$_SERVER['PHP_SELF']);
$arquivo = end($arquivo);
define("CHAMADOR",$arquivo);

setlocale (LC_ALL, 'pt_BR');
setlocale (LC_CTYPE, 'pt_BR');

# Define se usa o input type data do html5 ou se usa o javascript
# Se usar o html 5 o controle não trabalha com formato brasileiro
# mas browsers exibem no format brasileiro ao 'perceber' o idioma do usuário
$browser = array('CHROME','OPR','VIVALDI');
if (in_array(BROWSER_NAME, $browser)){ 
    define('HTML5',TRUE);
}else{
    define('HTML5',FALSE);
}

# Define o horário
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

/**
 * Função que é chamada automaticamente pelo sistema
 * para carregar na memória uma classe no exato momento
 * que a classe é instanciada.
 * 
 * @param  $classe = a classe instanciada
 */

function __autoload($classe)
{
    # Verifica se existe essa classe nas classes gerais
    if (file_exists(PASTA_CLASSES_GERAIS."/class.{$classe}.php"))
        include_once PASTA_CLASSES_GERAIS."/class.{$classe}.php"; 
        
    if (file_exists(PASTA_CLASSES_GERAIS."/interface.{$classe}.php"))
        include_once PASTA_CLASSES_GERAIS."/interface.{$classe}.php";
        
    if (file_exists(PASTA_CLASSES_GERAIS."/container.{$classe}.php"))
        include_once PASTA_CLASSES_GERAIS."/container.{$classe}.php";    
        
    if (file_exists(PASTA_CLASSES_GERAIS."/html.{$classe}.php"))
        include_once PASTA_CLASSES_GERAIS."/html.{$classe}.php";
        
    if (file_exists(PASTA_CLASSES_GERAIS."/outros.{$classe}.php"))
        include_once PASTA_CLASSES_GERAIS."/outros.{$classe}.php";     

    if (file_exists(PASTA_CLASSES_GERAIS."/rel.{$classe}.php"))
        include_once PASTA_CLASSES_GERAIS."/rel.{$classe}.php";      
        
    if (file_exists(PASTA_CLASSES_GERAIS."/bd.{$classe}.php"))
        include_once PASTA_CLASSES_GERAIS."/bd.{$classe}.php";          

    # Verifica se existe a classe nas classes específicas
    if (file_exists(PASTA_CLASSES."/class.{$classe}.php"))
        include_once PASTA_CLASSES."/class.{$classe}.php";
        
    if (file_exists(PASTA_CLASSES."/interface.{$classe}.php"))
        include_once PASTA_CLASSES."/interface.{$classe}.php";
}
        
# Sobre o Sistema
define("SISTEMA","Intranet Doméstica do Águia"); # Nome do sistema
define("DESCRICAO","Sistema do Águia");          # Descrição do sistema
define("AUTOR","Alat");                          # Autor do sistema
define("EMAILAUTOR","alataguia@gmail.com");      # Autor do sistema
define("VERSAO","1.0");                          # Versão do sistema