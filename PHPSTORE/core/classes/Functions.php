<?php

namespace core\classes;

use Exception;

class Functions {

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

}

/*
html_header.php
nav_bar.php
inicio.php
html_footer.php


*/

?>