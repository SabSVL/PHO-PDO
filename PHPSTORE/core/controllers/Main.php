<?php

namespace core\controllers;
use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Store;
use core\models\Clientes;

class Main{
    
    public function index(){

       
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'inicio',
            'layouts/footer',
            'layouts/html_footer',
        ]);

    }
    
        // =================================================================

    public function loja(){

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'loja',
            'layouts/footer',
            'layouts/html_footer',
        ]);
        
    
    }
    
        // =================================================================
    public function carrinho(){

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'carrinho',
            'layouts/footer',
            'layouts/html_footer',
        ]);
        
    
    }

         // =================================================================
         public function novo_cliente(){

            // vericica se já existe sessão aberta
            if(Store::clienteLogado()){
                $this->index();
                return;
            }
        


            Store::Layout([
                'layouts/html_header',
                'layouts/header',
                'criar_cliente',
                'layouts/footer',
                'layouts/html_footer',
            ]);
            
        
        }
        
         // =================================================================
         public function criar_cliente(){

            // vericica se já existe sessão aberta
            if(Store::clienteLogado()){
                $this->index();
                return;
            }
        
            // verifica se houve submissao de um formuario
            if($_SERVER['REQUEST_METHOD'] != 'POST'){
                $this->index();
                return;
            }


            // verifica se a senha 1 é = a senha 2
            if($_POST['text_senha_1'] !== $_POST['text_senha_2']){
                $_SESSION['erro'] = 'As senhas não estão iguais';
                  $this->novo_cliente();
                  return;
            }

            // verifica na base de dados se existe cliente com o mesmo email

            $cliente = new Clientes();
            if($cliente->verificar_email_existe($_POST['text_email'])){
                $_SESSION['erro'] = 'Já existe um cliente com o mesmo email.';
                $this->novo_cliente();
                return ;
                
            }


            // inserir novo cliente na base de dados e devolver o purl

            $email_cliente =  strtolower(trim($_POST['text_email']));
            $purl = $cliente->registrar_cliente();
            
             // envio do email para o cliente email
             $email = new EnviarEmail();
            $resultado = $email-> envar_email($email_cliente, $purl);
             
            if($resultado){
                echo "Email enviado";
            }else{
                echo 'Aconteceu um erro';
            }

        }
        // =======================================================================

        public function confirmar_email(){

            // verifica se já existe sessao
            if(Store::clienteLogado()){
                $this->index();
                return;
            }

            // verifica se existe na query string um purl
            if(!isset($_GET['purl'])){
                $this->index();
                return;
            }

            $purl = $_GET['purl'];

            // verifica se o purl é valido
            if(strlen($purl) !=12){
                $this->index();
                return;
            }

            $cliente = new Clientes(){
                
            }
            



        }

}


?>