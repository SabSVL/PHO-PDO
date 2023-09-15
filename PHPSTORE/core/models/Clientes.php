<?php 

namespace core\models;
use core\classes\Database;
use core\classes\Store;



class Clientes{
    public function verificar_email_existe($email){

        // verifica se já existe outra conta com o mesmo email
        $bd = new Database();
        $parametros = [
            ':email' => strtolower(trim($email)) 
        ];
        $resultados = $bd->select('SELECT email FROM clientes WHERE email = :email', $parametros);
    
        //verifica se o cliente já existe
        if(count($resultados) != 0){
           return true;
        }else{
           return false;

        }

    }

    public function registrar_cliente(){

        //registra o novo cliente na base de dados
        $bd = new Database();

        // cria um hash para o registro do cliente
        $purl = Store::criarHash();

        $parametros =[ 
           ':email' => strtolower(trim($_POST['text_email'])),
           ':senha' => password_hash(trim($_POST['text_senha_1']), PASSWORD_DEFAULT),
           ':nome_completo' => (trim($_POST['text_nome_completo'])),
           ':morada' => trim($_POST['text_morada']),
           ':cidade' => trim($_POST['text_cidade']),
           ':telefone' => trim($_POST['text_telefone']),
           ':purl' => $purl,
           ':activo' => 0
        ];

        $bd->insert("
        INSERT INTO clientes VALUES( 
           0,
           :email,
           :senha,
           :nome_completo,
           :morada,
           :cidade,
           :telefone,
           :purl,
           :activo,
           NOW(),
           NOW(),
           NULL
           )
        ", $parametros);

    // retorna o purl criado
    return $purl;

    }


  
}


?>