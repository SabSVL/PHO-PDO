<?php

Class Pessoa {
private $pdo;

    public function __construct($dbname, $host, $user, $senha){

        try{
            $this-> pdo = new PDO("mysql:dbname=".$dbname. ";host=" . $host, $user, $senha);


        }catch (PDOException $e){
            echo "Erro com banco de dados:" .$e->getMessage();
           exit();
        }catch (Exception $e) {
            echo "Erro generico: " .$e->GetMessage();
            exit();
        }
    }
    //FUNÇÃO PARA BUSCAR OS DADOS E COLOCAR NO CONTA DIRETO/ TABELA
    public function buscarDados(){
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM pessoa ORDER BY nome");
        $res = $cmd-> fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // FUNÇÃO DE CADASTRAR PESSOA NO BANCO DE DADOS
    public function cadastrarPessoa($nome, $telefone, $email)
    {
        //  ANTES DE CADASTRAR VERIFICAR S JÁ TEM O EMAIL CADASTADO
        $cmd = $this->pdo->prepare("SELECT id FROM pessoa WHERE email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        if($cmd-> rowCount() > 0) // verifcar se o email ja existe no banco de dados
        {
            return false;

        }else{ // não foi encontrado
            $cmd = $this->pdo->prepare("INSERT INTO pessoa (nome, telefone, email) VALUES (:n, :t, :e)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":t", $telefone);
            $cmd->bindValue(":e", $email);
            $cmd->execute();
            return true;

        }
    }
    public function excluirPessoa($id) {
        $cmd = $this->pdo->prepare("DELETE FROM pessoa WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();


    }
}

?>