<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 3</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <h1>Analisador de Números Real</h1>

        <?php
        $numero = $_GET['numero'] ?? "";
        if ($numero != "") {
            $inteiro = intval($numero);
            $frac =  explode('.', $numero);
            echo "<p>Analisando o número $numero informado pelo usuário: </p>";
            echo " <ul>";
            echo " <li> A parte inteira do número é <strong>". number_format($inteiro, 0, ',', '.')."</strong> </li>";
            echo " <li> A parte fracionária do número é <strong>0,".($frac[1] ?? '00') ."</strong> </li>";
        } else {
            echo "<p>Digite um numero</p>";
        }
        ?>
         <a href="index.html"><button>Voltar</button></a>



    </section>

</body>

</html>