<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{

    private $ligacao;
    
    // ===================================================

    private function ligar(){
        
        $this->ligacao = new PDO(
            'mysql:'.
            'host='. MYSQL_SERVER.';'.
            'dbname='. MYSQL_DATABASE. ';'.
            'charset='. MYSQL_CHARSET, 
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        //debug

        $this->ligacao->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
    }

    // ===================================================

    private function desligar(){
        // desliga o banco de dados
        $this->ligacao = null;
    }

    // CRUD
    // ===================================================

    public function select($sql, $parametros = null){
        
        // verifica se é uma instrução select

        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception("Base de dados - não é uma instrução SELECT");
        }

        //executa função de pesquisa de SQL

        $this->ligar();

        $resultados = null;

        try{
            // comunicao com a bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);

            }

        }catch( PDOException $e){
            //caso exista erro

            return false;

        }

        $this->desligar();
        // devolver parametros
        return $resultados;
    }

    
    // ===================================================

    public function insert($sql, $parametros = null){
        
        // verifica se é uma instrução INSERT

        if(!preg_match("/^INSERT/i", $sql)){
            throw new Exception("Base de dados - não é uma instrução INSERT");
        }

        //executa função de pesquisa de SQL

        $this->ligar();

        try{
            // comunicao com a bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        }catch( PDOException $e){
            //caso exista erro

            return false;

        }
        $this->desligar();
    }

    
    // ===================================================

    public function update($sql, $parametros = null){
        
        // verifica se é uma instrução UPDATE

        if(!preg_match("/^UPDATE/i", $sql)){
            throw new Exception("Base de dados - não é uma instrução UPDATE");
        }

        //executa função de pesquisa de SQL

        $this->ligar();
        try{
            // comunicao com a bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();

            }

        }catch( PDOException $e){
            //caso exista erro

            return false;

        }

        $this->desligar();
    }

    // ===================================================

    public function delete($sql, $parametros = null){
        
        // verifica se é uma instrução DELETE

        if(!preg_match("/^DELETE/i", $sql)){
            throw new Exception("Base de dados - não é uma instrução DELETE");
        }

        //executa função de pesquisa de SQL

        $this->ligar();
        try{
            // comunicao com a bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();

            }

        }catch( PDOException $e){
            //caso exista erro

            return false;

        }

        $this->desligar();
    }

     // ===================================================
        // GENERICA
     // ===================================================

     public function statement($sql, $parametros = null){
        
        // verifica se é uma instrução diferente das outras

        if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i", $sql)){
            throw new Exception("Base de dados - instrução invalida");
        }

        //executa função de pesquisa de SQL

        $this->ligar();
        try{
            // comunicao com a bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();

            }

        }catch( PDOException $e){
            //caso exista erro

            return false;

        }

        $this->desligar();
    }






}

?>