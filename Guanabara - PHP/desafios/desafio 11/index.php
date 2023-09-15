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

        $preco =  $_POST['preco'] ?? 0;
        $porcentagem = $_POST['porcentagem'] ?? 1;
        ?>

        <h1>Reajustador de Preços</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco" value="<?= $preco ?>">

            <label for="atual">Qual será o percentual de reajuste? <strong> (<span id="resultadoTempoReal">50 </span>%)</strong></label>
            <input type="range" name="porcentagem" id="porcentagem">
            <input type="submit" value="Reajustar">
        </form>
    </main>
    <section>
        <h2>Resultado do Reajuste</h2>
        <?php


        echo " <p>O produto que custava R$ ".  number_format($preco, '2', ',', '.'). ", com <strong> $porcentagem% de aumento </strong> vai passar a custar <strong> R$" . number_format($preco * ( $porcentagem/ 100) + $preco, '2', ',', '.' ) . " </strong> a partir de agora.</p>";

        ?>

    </section>
    <script>
        // Resultado em tempo Real
        let $range = document.querySelector('#porcentagem'),
            $value = document.querySelector('#resultadoTempoReal');

        $range.addEventListener('input', function() {
            $value.textContent = this.value;
        });
    </script>

</body>

</html>