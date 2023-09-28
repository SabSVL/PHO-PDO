<?php 
namespace core\controllers;
use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Store;
use core\models\Clientes;
use core\models\Produtos;

class Carrinho
{
    // =================================================================
    public function adicionar_carrinho(){



        // vai buscar o id_produto à query string
        if(!isset($_GET['id_produto'])){
            echo  isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : '';
            return;
        }
        // define o id do produto
        $id_produto = $_GET['id_produto'];

        $produtos = new Produtos();
        $resultados = $produtos->verificar_stock_prodtos($id_produto);
        if(!$resultados){
            echo  isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : '';
            return;
        } 
      

        // adiciona/ gestão da variável de sessão do carrinho
        $carrinho = [];

        if(isset($_SESSION['carrinho'])){
            $carrinho = $_SESSION['carrinho'];
        }

        // adicionar o produto ao carinho
        if(key_exists($id_produto, $carrinho)){

            // já existe o produto. Acrescenta mais uma unidade
            $carrinho[$id_produto]++;

        }else{
            // adicona novo produto ao carrinho
            $carrinho[$id_produto] = 1;
        }
        
        // atualiza os dados do carrinho
        $_SESSION['carrinho'] = $carrinho;

        // devolve a resposta (número de produtos do carrinho)
        $total_produtos = 0;

        foreach($carrinho as $produto_quantidade){
            $total_produtos += $produto_quantidade;
        }
        echo $total_produtos;
    }
    // =================================================================

    public function limpar_carrinho(){
        //limpa o carrinho de todos os produtos
        unset($_SESSION['carrinho']);

        // refrescar a página do carrinho 
        $this->carrinho();

    }


    // =================================================================

    public function carrinho(){

         // verifica se existe carrinho
         if(!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0){
            $dados = [
                'carrinho' => null
            ];
         } else{

            /* id buscar á bd os dodas dos produtos que extiem no carrinho criar um ciclo que constroi a estrutura dos dados para o carrinho */
            $ids = [];
            foreach($_SESSION['carrinho'] as $id_produto => $quantidade){
                array_push($ids, $id_produto);
            }     
            
            $ids = implode(",", $ids);
            $produtos = new Produtos();
            $resultados = $produtos->busccar_produtos_por_ids($ids);

            /* 
            Fazer um ciclo por cada produto no carrinho
                - identifficar e usar os dados da bd para criar uma coleção de dados para apáina do carrinho

            */
            $dados_tmp = [];
            foreach($_SESSION['carrinho'] as $id_produto => $quantidade_carrinho){
                // buscar imagem do produto
                foreach($resultados as $produto){
                    if($produto->id_produto == $id_produto){
                        $imagem = $produto->imagem;
                        $titulo = $produto->nome_produto;
                        $quantidade = $quantidade_carrinho;
                        $preco = $produto->preco * $quantidade;

                        // colocar o produto na coleção
                        array_push($dados_tmp, [
                            'imagem' => $imagem,
                            'titulo' => $titulo,
                            'quantidade' => $quantidade,
                            'preco' => $preco,
                        ]);
                        break;
                    }
                }
                
            }
            $total_da_ecomenda = 0;
            foreach($dados_tmp as $item){
                $total_da_ecomenda += $item['preco'];
            }
            array_push($dados_tmp, $total_da_ecomenda);


     
            
            $dados = [  
                'carrinho' => $dados_tmp,
            ]; 

         }
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'carrinho',
            'layouts/footer',
            'layouts/html_footer',
        ], $dados);
        
    
    }
}


?>