<?php 
require_once 'classe-pessoa.php';
$p = new Pessoa("crudpdo", "localhost", "root", "");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Pessoa</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']); // previnir que tenha um codigo malicioso ou coisa do tipo
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);

        if(!empty($nome) && !empty($telefone) && !empty($email)){ // verifica se se esta vazio
               if( !$p->cadastrarPessoa($nome, $telefone, $email)){
                    echo "Email ja cadastrado";
               }
        }
        else{
            echo "Preencha todos os campos";
        }

    }
        
    ?>

<section id="esquerda">
<form method="POST"> 
    <h2>CADASTRAR PESSOA</h2>

    <Label for="nome">Nome</Label>
    <input type="text" name="nome" id="nome">

    <Label for="telefone">Telefone</Label>
    <input type="text" name="telefone" id="telefone">

    <Label for="email">Email</Label>
    <input type="text" name="email" id="email">
    <input type="submit" value="Cadastrar">
</form>

</section>
    
<section id="direita">
    
<table>
        <tr id="titulo">
            <td >NOME</td>
            <td>TELEFONE</td>
            <td colspan="2">EMAIL</td>
        </tr>


    <?php 
    $dados = $p->buscarDados();
    if(count($dados) > 0){ // se tem pessoas cadastradas no banco
        for ($i=0; $i < count($dados); $i++) {
            echo '<tr>';
            foreach ($dados[$i] as $k => $v)
            {
                if($k != 'id'){
                    echo '<td>'.$v. '</td>';
                }
            }
            ?><td>
            <a href="">Editar</a>
            <a href="index.php?id=<?php echo $dados[$i]['id'] ?>">Excluir</a></td><?php
            echo '</tr>';
        }
    }
    else { // o banco de dados etsa vazio
        echo "Ainda não há pessoas cadastradas ";
    }
    ?>
    </table>

</section>

</body>
</html>

<?php 
if(isset($_GET['id'])){
    $id_pessoa = addslashes($_GET['id']);
    $p->excluirPessoa($id_pessoa);
    header("location: index.php"); // atualizar a pagina
}

?>