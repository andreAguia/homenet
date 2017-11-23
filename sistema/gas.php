<?php
/**
 * Cadastro de Estado Civil
 *  
 * By Alat
 */

# Configuração
include ("_config.php");

# Conecta ao Banco de Dados
$homenet = new Homenet();

# Verifica a fase do programa
$fase = get('fase','listar');

# pega o id (se tiver)
$id = soNumeros(get('id')); 

# Começa uma nova página
$page = new Page();			
$page->iniciaPagina();

# Cabeçalho
cabecalho();

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
$objeto->set_linkEditar('?fase=editar');
$objeto->set_linkExcluir('?fase=excluir');
$objeto->set_linkGravar('?fase=gravar');
$objeto->set_linkListar('?fase=listar');
$objeto->set_botaoHistorico(FALSE);
$objeto->set_botaoEditar(FALSE);
$objeto->set_botaoIncluir(FALSE);
$objeto->set_log(FALSE);
#$objeto->set_exibeInfoObrigatoriedade(FALSE);
#$objeto->set_botaoVoltarForm(FALSE);
#$objeto->set_topBarIncluir(FALSE);
$objeto->set_topBarListar(FALSE);

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

# Botão Extra Incluir (usado para a rotina alternativa sem carregar a página)
$botao = new Button("Incluir");
$botao->set_title("Inclui nova compra de gás");
$botao->set_onClick("abreDivId('gasInclusao');fechaDivId('gasLista');");

$objeto->set_botaoListarExtra(array($botao)); 

################################################################
switch ($fase)
{
    case "" :
    case "listar" :
        
        $div = new Div("gasInclusao");
        $div->abre();
            $objeto->editar();
        $div->fecha();
            
        $div3 = new Div("gasLista");
        $div3->abre();
        $objeto->listar();
        $div3->fecha();
            
            
        break;

    case "editar" :	
    case "excluir" :	
    case "gravar" :
        $objeto->$fase($id);
        break;
}									 	 		

$page->terminaPagina();