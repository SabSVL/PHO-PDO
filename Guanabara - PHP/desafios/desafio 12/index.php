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
       $segundos = $valor = $_POST['segundos'] ?? 0;
         $semana = floor($segundos / 604800);
         $segundos -= $semana * 604800;
         
         $dia = floor($segundos / 86400);
         $segundos -= $dia * 86400;
         
         $hora = floor($segundos / 3600);
         $segundos -= $hora * 3600;
         
         $minuto = floor($segundos / 60);
         $segundos -= $minuto * 60;

        ?>

        <h1>Calculadora de Tempo</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="segundos">Qual é o total de segundos?:</label>
            <input type="number" name="segundos" id="segundos" value="<?= $valor ?>">
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section>
        <h2>Totalizando tudo</h2>
        <?php
        echo " <p>Analisado o valor que você digitou, <strong> $valor segundos</strong> equivalem a um total de:  </p>";
        echo "<ul>";
        echo "<li>$semana semanas</li>";
        echo "<li>$dia dias </li>";
        echo "<li>$hora horas </li>";
        echo "<li>$minuto minutos </li>";
        echo "<li>$segundos segundos </li>";
        echo "</ul>";
        ?>

    </section>

</body>

</html>