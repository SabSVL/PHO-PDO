<?php

namespace core\controllers;
use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Store;
use core\models\Clientes;
use core\models\Produtos;

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

        // apresenta a págin da loja
        // busca a lisat de produtos disponiveis
        $produto = new Produtos();

        // analisa que categoria é para mostrar
        $c = 'todos';
        if(isset($_GET['c'])){
            $c = $_GET['c'];
        }
        // buscar informação á base de dados
        $lista_produtos = $produto->lista_produtos_disponiveis($c);
        $lista_categorias = $produto->lista_categorias();
        $dados = [
            'produtos' => $lista_produtos,
            'categorias' => $lista_categorias
        ];

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'loja',
            'layouts/footer',
            'layouts/html_footer',
        ],$dados);
        
    
    }
    
    // =================================================================

    public function login(){
            // verifica se já existe um utilizdor logado

            if(Store::clienteLogado()){
                Store::redirect();
                return;

            }
            // apresentaçãoo do formulario delogin
            Store::Layout([
                'layouts/html_header',
                'layouts/header',
                'login_frm',
                'layouts/footer',
                'layouts/html_footer',
            ]);
        
    }
        // =================================================================

    public function login_submit(){
        
        if(Store::clienteLogado()){
            Store::redirect();
            return;

        }

        //verifica se foi efetuado o post do formulario de login

        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            Store::redirect();
            return;
        }

        // Validar se os campo vieram corretamento preenchidos
        if(
        !isset($_POST['text_usuario']) || 
        !isset($_POST['text_password']) || 
        !filter_var(trim($_POST['text_usuario']), FILTER_VALIDATE_EMAIL)){

            /// erro de preeenchimento do formulario
            $_SESSION['erro'] = 'Login invalido';
            Store::redirect('login');
            return;

        }

        // prepara os dados para o model

        $usuario = trim(strtolower($_POST['text_usuario']));
        $password = trim($_POST['text_password']); 

    // carrega o model e verifica se o login é valido
        $cliente = new Clientes();
        $resultado = $cliente->validar_login($usuario, $password);
        
        //login invalido

        if(is_bool($resultado)){
            $_SESSION['erro'] = 'Login invalido';
            Store::redirect('login');
            return;
        }
        else{
            //login válido. Coloca os dados na sessão
            $_SESSION['cliente'] = $resultado->id_cliente;
            $_SESSION['usuario'] = $resultado->email;
            $_SESSION['nome'] = $resultado->nome_completo;

            // redirecionar para o inicio da nossa loja
            Store::redirect();

        }
    
    }
    // =================================================================
         
    public function logout(){
        // remove as variaveis da sessão
        unset( $_SESSION['cliente']);
        unset( $_SESSION['usuario']);
        unset( $_SESSION['nome']);

        // redireciona para o inicio da loja
        Store::redirect();
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
            // apresenta o layout para informar o envo do email
            Store::Layout([
                'layouts/html_header',
                'layouts/header',
                'criar_cliente_sucesso',
                'layouts/footer',
                'layouts/html_footer',
            ]);
            
                
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

        $cliente = new Clientes();
        $resultado =  $cliente->validar_email($purl);

        if($resultado){
                // apresenta o layout para informar a conta foi confirmada com sucesso 
                Store::Layout([
                    'layouts/html_header',
                    'layouts/header',
                    'conta_confirmada_sucesso',
                    'layouts/footer',
                    'layouts/html_footer',
                ]);
                
        }
        else{
            // redirecionar para a página inicial
            Store::redirect();
        }



    }

}
