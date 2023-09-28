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
 
  // =================================================================

  public static function redirect($rota = ''){
    // faz o redirecionamento para a URL desejada (rota)

    header("Location:" . BASE_URL . "?a=$rota");

  }

  // =================================================================

  public static function printData($data){
    if(is_array($data) || is_object($data)){
      echo '<pre>';
      print_r($data);
    }
    else{
      echo '<pre>';
      echo $data;

    }
    die("</br> foi");
  }

}

/*
html_header.php
nav_bar.php
inicio.php
html_footer.php


*/

?>