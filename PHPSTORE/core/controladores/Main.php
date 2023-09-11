<?php

namespace core\controladores;

use core\classes\Functions;

class Main{
    public function index(){
        /*
        
        1 -  carrega e tratar dados (cálculos) (base de dados)
       */
        $clientes = ['joao', 'ana', 'carlos'];

        $dados = [
            'titulo' => 'Este é o titulo',
            'clientes' => ['joao', 'ana', 'carlos']

        ];

        Functions::Layout([
            'layouts/html_header',
            'pagina_inicial',
            'layouts/html_footer',
        ], $dados);
        
    

    }

    public function loja(){
        echo "loja";
    }

}


?>