<?php
function cabecalho()
{
    
    # tag do cabeçalho
    echo '<header>';

    # Verifica se a imagem é comemorativa
    if(date("d.m") == "08.03"){
            $imagem = new Imagem(PASTA_FIGURAS.'uenf_mulher.jpg','Dia Internacional da Mulher',190,60);
    }else{
            $imagem = new Imagem(PASTA_FIGURAS.'homenet.jpg','Intranet da Casa',190,60);
    }

    $cabec = new Div('center');
    $cabec->abre();            
        $imagem->show();
    $cabec->fecha();
    br();
    
    echo '</header>';
}