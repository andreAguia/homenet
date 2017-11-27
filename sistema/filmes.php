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

# Define os valores do diretório
$types = array('mp4','ogg','webm');
$path = '../_filmes';
$dir = new DirectoryIterator($path);

# Começa uma nova página
$page = new Page();
$page->iniciaPagina();

# Cabeçalho
cabecalho();

$grid = new Grid();
$grid->abreColuna(12);

switch ($fase)
{	
    # Exibe o Menu de Vídeos
    case "menu" :
        botaoVoltar("menuInicial.php");        
        titulo('Filmes');
        br();
        $tamanhoImage = 64;
        $tituloAnterior = NULL;
        
        $grid = new Grid();
                
        # Percorre a pasta
        foreach($dir as $fileInfo){
            $ext = strtolower($fileInfo->getExtension());
            if( in_array($ext,$types)){
                $arquivosRecolhidos[] = $fileInfo->getFilename();
            }
        }
        
        sort($arquivosRecolhidos);
        
        foreach($arquivosRecolhidos as $lista){
            $partesNome = explode('-',$lista);
            $titulo = $partesNome[0];
            $arquivo = $partesNome[1];
                
            # Verifica se inicia ou não um novo título
            if($tituloAnterior <> $titulo){
                if(!is_null($tituloAnterior)){
                    $grid->fechaColuna(); 
                }
                   
                $grid->abreColuna(12,6,4);
                tituloTable($titulo);
                $tituloAnterior = $titulo;
            }
                
            $link = new Link($arquivo,"?fase=filme&nome=".$lista);
            $link->show(); 
            br();
        }
        $grid->fechaGrid();
        break;
        
    case "filme" :
        botaoVoltar("?");    
        titulo($nome);
        br();
        
        $grid = new Grid("center");
        $grid->abreColuna(8);
        echo '<video width="100%" height="100%" controls>';
        echo '<source src="'.$path.'/'.$nome.'" type="video/mp4">';
        echo '<source src="'.$path.'/'.$nome.'" type="video/ogg">';
        echo '<source src="'.$path.'/'.$nome.'" type="video/webm">';
        echo 'Your browser does not support the video tag.';
        echo '</video>';
        $grid->fechaColuna();
        $grid->fechaGrid();
        break;
        
}
$grid->fechaColuna(); 
$grid->fechaGrid();

$page->terminaPagina();