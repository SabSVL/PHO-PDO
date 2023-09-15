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

        $anoNasc =  $_POST['anoNasc'] ?? 0;
        $atual = $_POST['atual'] ?? 0;
        ?>
        <h1>Calculadno a sua idade</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="anoNasc">Em que ano você nasceu?</label>
            <input type="number" name="anoNasc" id="anoNasc" value="<?= $anoNasc ?>">

            <label for="atual">Quer saber sua idade emm que ano? (ataulmente estamos em <strong> <?= date("Y") ?> </strong>)</label>
            <input type="number" name="atual" id="atual" value="<?= $atual ?>">

            <input type="submit" value="Qual será minha idade?">
        </form>
    </main>
    <section>
        <h2>Resultado</h2>
        <?php

        if ($anoNasc > $atual || $anoNasc == '' || $atual == '' ) {
            echo "Digite os valores corretamente!";
        } else {
            echo " <p>Quem nasceu em $anoNasc vai ter <strong>" . abs($atual - $anoNasc) . " </strong> em  $atual!</p>";
        }
        ?>

    </section>

</body>

</html>