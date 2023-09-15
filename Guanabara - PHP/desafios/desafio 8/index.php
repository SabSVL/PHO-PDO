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

        $numero =  $_POST['numero'] ?? 0;
        $raizQ = sqrt($numero);
        $raizC = pow($numero, 1/3);
        ?>

        <h1>Informe seu salário</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="numero">Número:</label>
            <input type="number" name="numero" id="numero" value="<?= $numero ?>">
            <input type="submit" value="Calcular Raizes">
        </form>
    </main>
    <section>
        <h2>Resultado Final</h2>
        <?php
        echo " <p>Analisado o  <strong> número $numero </strong> , temos: </p>";
        echo "<ul>";
        echo "<li> A sua raiz quadrada é  <strong>  " . number_format($raizQ, '3', ',', '.') . " </strong> </li>";
        echo "<li> A sua raiz cubica é <strong> " . number_format($raizC, '3', ',', '.') . "  </strong> </li>";
        echo "</ul>";
        ?>

    </section>

</body>

</html>