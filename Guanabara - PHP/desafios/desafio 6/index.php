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

        $dividendo =  $_POST['dividendo'] ?? '1';
        $divisor =  $_POST['divisor'] ?? '1';
        if ($divisor != 0) {
            $resto = $dividendo % $divisor;
            $resultado =  $dividendo / $divisor;
        }

        ?>

        <h1>Anatomia da Divisão</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="dividendo">Dividendo:</label>
            <input type="number" name="dividendo" id="dividendo" value="<?= $dividendo ?>">
            <label for="divisor">Divisor:</label>
            <input type="number" name="divisor" id="divisor" value="<?= $divisor ?>">
            <input type="submit" value="Analisar">
        </form>
    </main>
    <section>
        <h2>Estrutura da Divisão</h2>
        
        <div class='anatomia'>
        <?php
        echo  "<div>$dividendo</div>";
        echo  "<div>$divisor</div>";
        echo  "<div>$resto</div>";
        echo  "<div>". number_format($resultado, '2', '.', ',') ."</div>";
        ?>
        </div>
    </section>

</body>

</html>