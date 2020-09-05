<?php
    $consulta = 'https://servicodados.ibge.gov.br/api/v1/projecoes/populacao';
    $dados = json_decode(file_get_contents($consulta),true);

    echo $dados['projecao']['populacao'];
?>