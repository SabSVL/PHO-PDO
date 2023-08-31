<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SendMail</title>
</head>

<body>
    <form action="sendMail.php" method="post">
        <label for="nome">Nome Completo:</label>
        <input type="text" name="nome" placeholder="Informe o seu nome...">
        <br><br>
        <label for="pais">País</label>
        <select name="pais" id="pais">
            <option value="">Selecione um País</option>
            <option value="brasil">Brasil</option>
            <option value="usa">Estados Unidos</option>
        
        </select>
        <br><br>
            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" id="mensagem" cols="30" rows="10" placeholder="Insira uma mensagem aqui.."></textarea>
            <br><br>
            <input type="submit" value="Enviar">
    </form>
</body>

</html>