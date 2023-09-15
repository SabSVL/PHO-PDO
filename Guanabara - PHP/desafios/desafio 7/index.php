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

       $salarioFinal =  $salario =  $_POST['salario'] ?? 0;
        $cont = 0;
        while ($salarioFinal >= 1380) {
            $cont++;
            $salarioFinal -= 1380;
           
        }
        ?>

        <h1>Informe seu salário</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="salario">Salaraio(R$):</label>
            <input type="number" name="salario" id="salario" value="<?= $salario ?>">
            <p>Considere o salário mínimo de <strong>R$ 1.380,00</strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section>
        <h2>Resultado Final</h2>
        <?php 
       echo " <p>Quem recebe um salário de R$". number_format($salario, '2', ',' , '.'). " <strong>ganha $cont salários mínimos </strong> + $salarioFinal</p>";
        ?>

    </section>

</body>

</html>