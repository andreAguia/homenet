<?php
header('Content-Type: text/html; charset=ISO-8859-1');
/**
 * Intranet Domética - Menu Inicial
 *  
 * By Alat
 */

# Configuração
include ("_config.php");


# Pega as variáveis
$fase = get('fase','menu'); 
$nome = get('nome');

# Começa uma nova página
$page = new Page();
$page->set_jscript('<link rel="stylesheet" href="'.PASTA_ESTILOS_GERAIS.'/svvg-styles.css">');
$page->iniciaPagina();

# Cabeçalho
cabecalho();

$grid = new Grid();
$grid->abreColuna(12);

switch ($fase){	
    # Exibe o Menu de Vídeos
    case "menu" :
        botaoVoltar("menuInicial.php");        
        titulo('Filmes');
        br();
        
        $grid = new Grid();
        
        $video = new MenuVideo();
        $video->add_item("ytVideo","5fNN4uNtLp0","Coleção nº1");
        $video->add_item("ytVideo","SQTk4fgjpHI","Coleção nº2");
        $video->add_item("ytVideo","uPDB5I9wfp8","Coleção nº3");
        $video->show();
        
        $grid->fechaGrid();
        break;
}
$grid->fechaColuna(); 
$grid->fechaGrid();

$page->terminaPagina();