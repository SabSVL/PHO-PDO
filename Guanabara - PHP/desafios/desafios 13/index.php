<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisor</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    img {
        width: 100px;
    }
</style>

<body>
    <main>
        <?php
        $cem = $cinquenta = $dez = $cinco = 0; 
       $valor2 =  $valor = $_POST['valor'] ?? 0;

        while($valor >=100){
            $cem++;
            $valor -=100;
        }

        while($valor >=50){
            $cinquenta++;
            $valor -=50;
        }

        while($valor >=10){
            $dez++;
            $valor -=10;

        }

        while($valor >=5){
            $cinco++;
            $valor -=5;

        }

        ?>

        <h1>Caixa Eletrônico</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="valor">Qual valor deseja sacar? (R$)*</label>
            <input type="number" name="valor" id="valor" step="05" value="<?= $valor2 ?>">
            <input type="submit" value="Sacar">
        </form>
    </main>
   <img src="" alt="">
    <section>
        <h2>Saque de <?=number_format($valor2, '2', ',', '.') ?> realizado</h2>
        <?php
        echo " <p>O caixa eletrônico vai te entregar as seguintes notas: </p>";
        echo "<ul>";
        echo "<li>  <img src='https://acdn.mitiendanube.com/stores/001/538/425/products/11298087_11-c91c149132a072071c16440772671936-640-0.jpg' alt='100 reais'>x $cem </li>";
        echo "<li>  <img src='https://upload.wikimedia.org/wikipedia/commons/e/e5/50_Brazil_real_Second_Obverse.jpg' alt='50 reais'>x $cinquenta </li>";
        echo "<li>  <img src='https://dw0jruhdg6fis.cloudfront.net/producao/26916513/G/cedula_nacional_cn2658.jpg' alt='10 reais'>x $dez </li>";
        echo "<li>  <img src='https://upload.wikimedia.org/wikipedia/commons/8/80/5_Brazil_real_Second_Obverse.jpg' alt='05 reais'>x $cinco </li>";
        echo "</ul>";
        ?>

    </section>

</body>

</html>