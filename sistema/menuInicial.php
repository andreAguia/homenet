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

# Cabeçalho
cabecalho();

$grid = new Grid();
$grid->abreColuna(12);

switch ($fase)
{	
    # Exibe o Menu Inicial
    case "menu" :
        
        titulo('Intranet da Casa');
        $tamanhoImage = 64;

        $grid = new Grid();
        $grid->abreColuna(4);
        br();

        $menu = new MenuGrafico();
        
        # Sistemas de Controle financeiro
        $botao = new BotaoGrafico();
        $botao->set_label('Controle Financeiro');
        $botao->set_url('../../financeiro/sistema/login.php');
        $botao->set_image(PASTA_FIGURAS.'dinheiro.jpg',$tamanhoImage,$tamanhoImage);
        $botao->set_title('Acessa o Sistema Financeiro Pessoal');
        $botao->set_accesskey('C');
        $menu->add_item($botao);

        # Sistemas da Uenf
        $botao = new BotaoGrafico();
        $botao->set_label('Uenf');
        $botao->set_url('../../areaServidor/sistema/areaServidor.php');
        $botao->set_image(PASTA_FIGURAS.'uenf.gif',$tamanhoImage,$tamanhoImage);
        $botao->set_title('Acessa os Sistemas da Uenf');
        $botao->set_accesskey('U');
        $menu->add_item($botao);
        
        # PhpMyAdmin
        $botao = new BotaoGrafico();
        $botao->set_label('PhpMyAdmin');
        $botao->set_title('Executa o PhpMyAdmin');
        $botao->set_target('_blank');
        $botao->set_image(PASTA_FIGURAS.'mysql.png',$tamanhoImage,$tamanhoImage);
        $botao->set_url('http://127.0.0.1/phpmyadmin');
        $menu->add_item($botao);

       
        $menu->show();
        $grid->fechaColuna();
        break;
}

$grid->fechaColuna();
$grid->fechaGrid();

$page->terminaPagina();