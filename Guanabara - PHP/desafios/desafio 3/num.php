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
        <h1>Conversor de Moedas v1.0</h1>

        <?php 
        $numero = $_GET['numero']?? "";
        if($numero != ""){
            echo "<p>Seus R$ $numero equivalem a US$ " .number_format($numero/5.22, 2). "</p>";
        echo "<p> *<strong>Cotação fixa de R$5,22 </strong> informada diretamente no código  </p>" ;
        }else{
        echo "<p>Digite um numero</p>";
        }
        ?>
        <a href="index.html"><button>Voltar</button></a>



    </section>
    
</body>
</html>