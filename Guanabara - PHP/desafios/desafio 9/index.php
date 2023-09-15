<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisor</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <?php

        $v1 =  $_POST['v1'] ?? 0;
        $v2 =  $_POST['v2'] ?? 0;
        $p1 =  $_POST['p1'] ?? 0;
        $p2 =  $_POST['p2'] ?? 0;

            $simples = ($v1 + $v2) / 2;
            $ponderada = (($v1 * $p1) + ($v2 * $p2)) / ($p1 + $p2);
        

        ?>

        <h1>Informe seu salário</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="v1">1º Valor:</label>
            <input type="number" name="v1" id="v1" value="<?= $v1 ?>">
            <label for="p1">1º Peso:</label>
            <input type="number" name="p1" id="p1" value="<?= $p1 ?>">
            <label for="v2">2º Valor:</label>
            <input type="number" name="v2" id="v2" value="<?= $v2 ?>">
            <label for="p2">2º Peso:</label>
            <input type="number" name="p2" id="p2" value="<?= $p2 ?>">
            <input type="submit" value="Calcular Médias">
        </form>
    </main>
    <section>
        <h2>Resultado Final</h2>
        <?php
        echo " <p>Analisado os valores $v1 e $v2: </p>";
        echo "<ul>";
        echo "<li> A <strong> Média Aritmética Simples </strong>entre os valores é igual a " . number_format($simples ?? 0, '2', ',', '.') . " </li>";
        echo "<li> A <strong> Média Aritmética Ponderada </strong>com pesos $p1 e $p2 é igual a " . number_format($ponderada ?? 0, '2', ',', '.') . "</li>";
        echo "</ul>";
        ?>

    </section>

</body>

</html>