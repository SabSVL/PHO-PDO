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
    // CADASTRAR PESSOA
    if (isset($_POST['nome'])) // clicou cadastrar ou editar
    {
        if (isset($_GET['id_up'])  && !empty($_GET['id_up'])) { // verificar se clicou no editar e se a variavel nao esta vazia
            $id_up = addslashes($_GET['id_up']);
            $nome = addslashes($_POST['nome']); // previnir que tenha um codigo malicioso ou coisa do tipo
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);

            if (!empty($nome) && !empty($telefone) && !empty($email)) {
                // EDITAR
                $p->atualizarDados($id_up, $nome, $telefone, $email);
                header("location: index.php");
            } else {
                echo "Preencha todos os campos";
            }
        } else {
            $nome = addslashes($_POST['nome']); // previnir que tenha um codigo malicioso ou coisa do tipo
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);

            if (!empty($nome) && !empty($telefone) && !empty($email)) { // verifica se se esta vazio
                if (!$p->cadastrarPessoa($nome, $telefone, $email)) {
                    echo "Email ja cadastrado";
                }
            } else {
                echo "Preencha todos os campos";
            }
        }
    }
    ?>

    <?php
    //ATUALIZAR DADOS
    if (isset($_GET['id_up'])) // so vai executar se existir um id_up
    {
        $id_update = addslashes($_GET['id_up']);
        $res = $p->buscarDadosPessoa($id_update);
    }


    ?>

    <section id="esquerda">
        <form method="POST">
            <h2>CADASTRAR PESSOA</h2>

            <Label for="nome">Nome</Label>
            <input type="text" name="nome" id="nome" value="<?php if (isset($res)) {echo $res['nome']; } ?>">

            <Label for="telefone">Telefone</Label>
            <input type="text" name="telefone" id="telefone" value="<?php if (isset($res)) {  echo $res['telefone']; } ?>">

            <Label for="email">Email</Label>
            <input type="text" name="email" id="email" value="<?php if (isset($res)) { echo $res['email'];  } ?>">
            <input type="submit" value="<?php if (isset($res)) {  echo "Atualizar";  } else {  echo "Cadastrar"; } ?>">
        </form>

    </section>

    <section id="direita">

        <table>
            <tr id="titulo">
                <td>NOME</td>
                <td>TELEFONE</td>
                <td colspan="2">EMAIL</td>
            </tr>


            <?php

            $dados = $p->buscarDados();
            if (count($dados) > 0) { // se tem pessoas cadastradas no banco
                for ($i = 0; $i < count($dados); $i++) {
                    echo '<tr>';
                    foreach ($dados[$i] as $k => $v) {
                        if ($k != 'id') {
                            echo '<td>' . $v . '</td>';
                        }
                    }
            ?><td>
                        <a href="index.php?id_up=<?php echo $dados[$i]['id'] ?>">Editar</a>
                        <a href="index.php?id=<?php echo $dados[$i]['id'] ?>">Excluir</a>
                    </td><?php
                            echo '</tr>';
                        }
                    } else { // o banco de dados etsa vazio
                        echo "Ainda não há pessoas cadastradas ";
                    }
                            ?>
        </table>

    </section>

</body>

</html>

<?php
// EXCLUIR PESSSOA
if (isset($_GET['id'])) {
    $id_pessoa = addslashes($_GET['id']);
    $p->excluirPessoa($id_pessoa);
    header("location: index.php"); // atualizar a pagina
}

?>
