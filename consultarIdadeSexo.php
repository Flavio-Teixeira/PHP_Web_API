<?php
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
    
    require_once('Classes/Conexao.php');
    require_once('Classes/DAO/UsuarioDAO.php');

    $respostas  = array();

    if($_GET)
    {
        $idade = $_GET['idade'];
        $sexo  = $_GET['sexo'];

        $UsuarioDAO = new UsuarioDAO();
        $consulta   = $UsuarioDAO->ConsultarIdadeSexo($idade, $sexo);

        if($consulta == true)
        {
            for($i = 0; $i < mysqli_num_rows($consulta); $i++)
            {
                $linha = mysqli_fetch_array($consulta);
                $respostas[] = array
                (
                    'id'        => $linha['id'],
                    'nome'      => utf8_encode($linha['nome']),
                    'sobrenome' => utf8_encode($linha['sobrenome']),
                    'idade'     => $linha['idade'],
                    'sexo'      => $linha['sexo'],
                );
            }
        }    
    }
    else
    {
        $respostas[] = array
        (
            'erro' => 'Nenhum parâmetro foi informado.'
        );
    }

    echo json_encode($respostas);
?>