<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <section>
        <h1>Resultado Final</h1>
        <?php 
      
        $numero = $_GET['numero'] ?? "";
        if($numero !=''){
            
        echo "<p>O numero escolhido foi <strong> $numero </strong></p>";
        echo "<p>O seu <i>antecessor</i> é ". ($numero-1). "</p>";
        echo "<p>O seu <i>sucessor</i> é ". ($numero+1). "</p>";
        }
        else{
            echo "<p>Digite um numero </p>";
        }
        ?>
        <a href="index.html"><button>Voltar</button></a>
    </section>
    
</body>
</html>