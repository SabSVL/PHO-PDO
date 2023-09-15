<?php 

// colecao de rotas
$rotas = [
    'inicio' => 'main@index',
    'loja' => 'main@loja',
    'carrinho' => 'main@carrinho',

    // cliente

    'novo_cliente' => 'main@novo_cliente',
    'criar_cliente' => 'main@criar_cliente',
];

// difine ação por defeito

$acao = 'inicio';


// verifica se existe a ação na query string

if(isset($_GET['a'])){

    // verifica se a ação existe nas rotas
    if(!key_exists( $_GET['a'], $rotas)){
        $acao = 'inicio';
    }else{
        $acao = $_GET['a'];
    }
}

// trata a definição de rota
$partes = explode('@',$rotas[$acao]);
$controlador = 'core\\controllers\\' .ucfirst($partes[0]);
$metodo =  $partes[1];


$ctr = new $controlador();
$ctr->$metodo();
?>