<?php

namespace core\classes;

use Exception;

class Store {

    public static function Layout($estruturas, $dados =null){
        //verifica se estruturas é um array
        if(!is_array($estruturas)){
            throw new Exception("Colecao de estruturas inválida");
        }

        // variaveis
        if(!empty($dados) && is_array($dados)){
            extract($dados);
        }

        // apresentar as viewa da aplicação
        foreach($estruturas as $estrutura){
            include("../core/views/$estrutura.php");
        };

    }

    // =================================================================

    public static function clienteLogado(){
        // verifica se existe um cliente com sessao

        return (isset($_SESSION['cliente']));
    }
  // =================================================================

  public static function criarHash($num_caracteres = 12){
    // criar hashes
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($chars), 0, $num_caracteres);

    
  }

}

/*
html_header.php
nav_bar.php
inicio.php
html_footer.php


*/

?>