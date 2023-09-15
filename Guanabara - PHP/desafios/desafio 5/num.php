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
        <h1>Conversor de Moedas v2.0</h1>

        <?php
        $numero = $_POST['numero'] ?? "";
        if ($numero != "") {

            $inicio = date("m-d-Y", strtotime("- 7 days"));
            $fim = date("m-d-Y");
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'' . $inicio . '\'&@dataFinalCotacao=\'' . $fim . '\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

            $dados = json_decode(file_get_contents($url), true);

            $cotacao = $dados['value'][0]['cotacaoCompra'];

            echo "<p>Seus R$". number_format($numero, '2',',', '.') ." equivalem a US$ " . number_format($numero / $cotacao, '2',',', '.') . "</p>";
            echo "<p>* A contação atual é <strong>$cotacao</strong>. </p>";
            echo "<p>* Vindo diretamente do <strong>Banco do Brasil</strong>. </p> ";
        } else {
            echo "<p>Digite um numero! </p>";
        }
        ?>
        <a href="index.html"><button>Voltar</button></a>


    </section>

</body>

</html>