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

$grid1 = new Grid();
$grid1->abreColuna(12);

# Título
botaoVoltar("menuInicial.php");        
titulo('Filmes');
br();

$grid2 = new Grid();
$grid2->abreColuna(2);

    $menu = new Menu();
    $menu->add_item('titulo',"Categoria","#");
    $menu->add_item('link','Pocoyo','?fase=pocoyo');
    $menu->add_item('link','Bita','?fase=bita');
    $menu->show();
    br();    

 $grid2->fechaColuna();
 $grid2->abreColuna(10);

switch ($fase){	
    # Exibe o Menu de Vídeos
    case "pocoyo" :
        $video = new MenuVideo();
        $video->add_item("ytVideo","5fNN4uNtLp0","Coleção nº1");
        $video->add_item("ytVideo","SQTk4fgjpHI","Coleção nº2");
        $video->add_item("ytVideo","uPDB5I9wfp8","Coleção nº3");
        $video->show();
        break;
    
     case "bita" :
        $video = new MenuVideo();
        $video->add_item("ytVideo","0GIgk4yuHOQ","Dinossauro");
        $video->add_item("ytVideo","Oa5BaUBXpho","Festa na Lagoa");
        $video->add_item("ytVideo","5TVsXxsFJps","De Estimacao");
        $video->add_item("ytVideo","j7A9ANT2aVQ","Insetos");
        $video->add_item("ytVideo","cjONzZPJONc","Fazendinha");
        $video->add_item("ytVideo","iY91JoMWQoM","No Fundo do Mar");
        $video->add_item("ytVideo","2ZB6dQ-Fjho","Como e Verde na Floresta");
        $video->add_item("ytVideo","rUeaT5eqCyg","Nem Tudo que Sobra e Lixo");
        $video->add_item("ytVideo","hgFfC4cCnec","Voa Passarinho");
        $video->add_item("ytVideo","eLtzvypcurE","A Diferença é o que nos une");
        $video->add_item("ytVideo","eulFsmcNHos","Natal do Bita");
        $video->add_item("ytVideo","4hmTy4mTCtc","A Boneca e o Boneco");
        $video->add_item("ytVideo","cnzgHAIRqmc","Xic Xic Xic");
        $video->add_item("ytVideo","31iBxkTTAfc","Bom Banho");
        $video->show();
        break;
}

$grid2->fechaColuna();
$grid2->fechaGrid();
 
$grid1->fechaColuna(); 
$grid1->fechaGrid();

$page->terminaPagina();