<?php
/**
 * Intranet Domética - Menu Inicial
 *  
 * By Alat
 */

# Configuração
include ("_config.php");


# Verifica a fase do programa
$fase = get('fase','menu'); # Qual a fase

# Começa uma nova página
$page = new Page();
$page->iniciaPagina();

# Limit a tela
$grid = new Grid();
$grid->abreColuna(12);

# Cabeçalho
cabecalho();

###############################################
# Controle do gás

# Conecta ao Banco de Dados
$homenet = new Homenet();

# pega o id (se tiver)
$id = soNumeros(get('id'));

# Abre um novo objeto Modelo
$objeto = new Modelo();

################################################################

# Nome do Modelo (aparecerá nos fildset e no caption da tabela)
$objeto->set_nome('Controle do Gás');

# botão de voltar da lista
$objeto->set_voltarLista('menuInicial.php');

# select da lista
$objeto->set_selectLista ('SELECT  data,
                                   idGas
                             FROM tbgas
                         ORDER BY data desc');

# select do edita
$objeto->set_selectEdita('SELECT data,
                                 idGas
                            FROM tbgas
                           WHERE idGas = '.$id);

# Caminhos
#$objeto->set_linkEditar('?fase=editar');
#$objeto->set_linkExcluir('?fase=excluir');
$objeto->set_linkGravar('?fase=gravar');
$objeto->set_linkListar('?');
$objeto->set_botaoHistorico(FALSE);
$objeto->set_botaoEditar(FALSE);
$objeto->set_botaoIncluir(FALSE);
$objeto->set_log(FALSE);
$objeto->set_botaoVoltarLista(FALSE);
$objeto->set_exibeInfoObrigatoriedade(FALSE);
$objeto->set_botaoVoltarForm(FALSE);
$objeto->set_topBarIncluir(FALSE);
$objeto->set_topBarListar(FALSE);
$objeto->set_exibeTempoPesquisa(FALSE);
$objeto->set_botaoCancelaEdita("fechaDivId('gasInclusao');abreDivId('gasLista');");

# Parametros da tabela
$objeto->set_label(array("Data da Compra","Durabilidade"));
$objeto->set_width(array(80,10));
$objeto->set_align(array("center"));
$objeto->set_funcao(array("date_to_php"));
$objeto->set_classe(array(NULL,"Homenet"));
$objeto->set_metodo(array(NULL,"gasDurabilidade"));

# Classe do banco de dados
$objeto->set_classBd('Homenet');

# Nome da tabela
$objeto->set_tabela('tbgas');

# Nome do campo id
$objeto->set_idCampo('idGas');

# Tipo de label do formulário
$objeto->set_formlabelTipo(1);

# Campos para o formulario
$objeto->set_campos(array(
    array ('linha' => 1,
           'nome' => 'data',
           'label' => 'Data da compra:',
           'tipo' => 'data',
           'required' => TRUE,
           'autofocus' => TRUE,
           'col' => 12,
           'size' => 10)));

##################################################

switch ($fase)
{	
    # Exibe o Menu Inicial
    case "menu" :        
        titulo('Intranet da Casa');
        br();
        $tamanhoImage = 64;
        
        $grid1 = new Grid();
        $grid1->abreColuna(12,8);
            $grid2 = new Grid();

            #################################################
            $grid2->abreColuna(12,6);            
            tituloTable('Filmes & Fotos');
            br();

            $menu = new MenuGrafico();

            # Filmes
            $botao = new BotaoGrafico();
            $botao->set_label('Filmes');
            $botao->set_url('filmes.php');
            $botao->set_image(PASTA_FIGURAS.'video.png',$tamanhoImage,$tamanhoImage);
            $botao->set_title('Filmes');
            #$botao->set_accesskey('C');
            $menu->add_item($botao);

            # Fotos
            $botao = new BotaoGrafico();
            $botao->set_label('Fotos');
            $botao->set_url('#');
            $botao->set_image(PASTA_FIGURAS.'fotos.png',$tamanhoImage,$tamanhoImage);
            $botao->set_title('Fotos');
            $menu->add_item($botao);

            $menu->show();

            br();            
            $grid2->fechaColuna();        
            #################################################
            $grid2->abreColuna(12,6);
            tituloTable('Controles');
            br();

            $menu = new MenuGrafico();

            # Sistemas da Uenf
            # Sistemas de Controle Financeiro
            $botao = new BotaoGrafico();
            $botao->set_label('Financeiro');
            $botao->set_url('../../financeiro/sistema/login.php');
            $botao->set_image(PASTA_FIGURAS.'dinheiro.jpg',$tamanhoImage,$tamanhoImage);
            $botao->set_title('Acessa o Sistema Financeiro Pessoal');
            $menu->add_item($botao);
            
            # Sistemas de Controle Despesas com o carro
            $botao = new BotaoGrafico();
            $botao->set_label('Manutenção do Carro');
            $botao->set_url('carro.php');
            $botao->set_image(PASTA_FIGURAS.'carro.png',$tamanhoImage,$tamanhoImage);
            $botao->set_title('Acessa o sistema de controle das manutenções do carro');
            $menu->add_item($botao);

            $menu->show();
            $grid2->fechaColuna();     
            
            #################################################
            $grid2->abreColuna(12,6);
            tituloTable('Leitura');
            br();

            $menu = new MenuGrafico();

            # Go Read
            $botao = new BotaoGrafico();
            $botao->set_label('GoRead');
            $botao->set_url('https://www.goread.com.br/login');
            $botao->set_image(PASTA_FIGURAS.'goread.png',$tamanhoImage,$tamanhoImage);
            $botao->set_title('Notícias');
            #$botao->set_accesskey('C');
            $menu->add_item($botao);

            # Notícias
            $botao = new BotaoGrafico();
            $botao->set_label('Notícias');
            $botao->set_url('?fase=noticias');
            $botao->set_image(PASTA_FIGURAS.'noticias.png',$tamanhoImage,$tamanhoImage);
            $botao->set_title('Notícias via feed');
            #$botao->set_accesskey('U');
            $menu->add_item($botao);

            $menu->show();
            $grid2->fechaColuna();     
            
            #################################################
            $grid2->abreColuna(12,6);
            tituloTable('Outros');
            br();

            $menu = new MenuGrafico();

           

            # Sistemas da Uenf
            $botao = new BotaoGrafico();
            $botao->set_label('Uenf');
            $botao->set_url('../../areaServidor/sistema/areaServidor.php');
            $botao->set_image(PASTA_FIGURAS.'uenf.gif',$tamanhoImage,$tamanhoImage);
            $botao->set_title('Acessa os Sistemas da Uenf');
            $botao->set_accesskey('U');
            $menu->add_item($botao);

            $menu->show();
            $grid2->fechaColuna(); 
            $grid2->fechaGrid();
            $grid1->fechaColuna(); 
            #################################################
            $grid1->abreColuna(12,4);
            tituloTable('Controle do Gás');
            
            $div = new Div("gasInclusao");
            $div->abre();
                $objeto->editar();
            $div->fecha();

            $div3 = new Div("gasLista");
            $div3->abre();
            $objeto->listar();  
            $div3->fecha();
            
            # Cria um menu
            $menu = new MenuBar();

            # Link de inclusão
            $linkIncluir = new Button("Incluir");
            $linkIncluir->set_title('Inclui uma data de compra');
            $linkIncluir->set_onClick("abreDivId('gasInclusao');fechaDivId('gasLista');");
            $menu->add_link($linkIncluir,"right");

            # Editar
            $linkGas = new Link("Editar","gas.php");
            $linkGas->set_class('button');
            $linkGas->set_title('Acessa o Controle de gas');
            $menu->add_link($linkGas,"right");

            $menu->show();
                
            $grid1->fechaColuna();
            
            #################################################
            
            $grid1->fechaGrid();
            break;
            
    #################################################
        
            case "editar" :	
            case "excluir" :	
            case "gravar" :
            $objeto->$fase($id);
            break;
    
    ##################################################
        
        case "noticias" :
            
            botaoVoltar("?");
            titulo('Notícias');
            br();

            $grid1 = new Grid();
            
            # Numero de itens a ser exibido
            $numItens = 10;
            
            # Pega as notícias
            $rss = array(
                   array("BBC Brasil","http://feeds.bbci.co.uk/portuguese/rss.xml"),
                   array("A Tarde","http://atarde.uol.com.br/arquivos/rss/brasil.xml"),
                   array("G1","http://g1.globo.com/dynamo/rss2.xml"),
                   array("Tecmundo","https://rss.tecmundo.com.br/feed"));
                
            # Percorre os feeds
            foreach($rss as $tt){
                $grid1->abreColuna(12,6,3);
                tituloTable($tt[0]);
                $noticias = feed($tt[1]);
                
                echo "<ul>";
                
                # Exibe
                $contador = 1;
                foreach($noticias->channel->item as $item ){
                    # Pega a data
                    if(!is_null($item->pubDate)){
                        $data = substr($item->pubDate,4,8);
                    }else{
                        $data = "";
                    }
                    
                    # Exibe o link
                    echo "<li>";
                    $link = new Link($data." - ".$item->title,$item->link);
                    $link->set_target("_blank");
                    $link->set_id("feed");
                    $link->show();
                    echo "</li>";
                   
                    # Verifica se já tem a quantidade
                    if($contador == $numItens){
                        break;
                    }else{
                        $contador++;
                    }
                }
                echo "</ul>";
                $grid1->fechaColuna();
            }
            $grid1->fechaGrid();
            break;
}

$grid->fechaColuna();
$grid->fechaGrid();

$page->terminaPagina();