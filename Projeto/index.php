<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Pessoa</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<section id="esquerda">
<form>
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
        <tr>
            <td>Maria</td>
            <td>0000000</td>
            <td>Maria@gmail.com</td>
            <td><a href="">Editar</a><a href="">Excluir</a></td>
        </tr>
    </table>

</section>

</body>
</html>