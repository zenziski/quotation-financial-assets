<?php
$ch = curl_init();
$url = "https://api.hgbrasil.com/finance/quotations?key=fe55ea23";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
if ($error = curl_error($ch)) {
    echo $error;
}
$decodedResponse = json_decode($response, true);
$currencies = $decodedResponse['results']['currencies'];
$stocks = $decodedResponse['results']['stocks']
//print_r($decodedResponse['results']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Consulta</title>
</head>

<body>
    <div class="container">
        <div class="currencie-border">
            <h3>Cotação de moedas</h3>
            <div class="currencies">
            <div class="card">
                    <div class="name"><?php echo $currencies['EUR']['name'] ?></div>
                    <div class="value"><?php echo "R$ " . number_format($currencies['EUR']['buy'], 2, ',', '.') ?></div>
                </div>
                <div class="card">
                    <div class="name"><?php echo $currencies['GBP']['name'] ?></div>
                    <div class="value"><?php echo "R$ " . number_format($currencies['GBP']['buy'], 2, ',', '.') ?></div>
                </div>
                <div class="card">
                    <div class="name"><?php echo $currencies['JPY']['name'] ?></div>
                    <div class="value"><?php echo "R$ " . number_format($currencies['JPY']['buy'], 2, ',', '.') ?></div>
                </div>
                <div class="card">
                    <div class="name"><?php echo $currencies['BTC']['name'] ?></div>
                    <div class="value"><?php echo "R$ " . number_format($currencies['BTC']['buy'], 2, ',', '.') ?></div>
                </div>
                <div class="card">
                    <div class="name"><?php echo $currencies['USD']['name'] ?></div>
                    <div class="value"><?php echo "R$ " . number_format($currencies['USD']['buy'], 2, ',', '.') ?></div>
                </div>
            </div>
        </div>
        <div class="stock-border">
            <h3>Cotação Bolsas Mundiais</h3>
            <div class="stocks">
                <div class="card">
                    <div class="name"><?php echo $stocks['IBOVESPA']['name'] ?></div>
                    <div class="location"><?php echo $stocks['IBOVESPA']['location'] ?></div>
                    <div class="value"><?php echo number_format($stocks['IBOVESPA']['points'], 2, ',', '.') ?></div>
                    <div class="variation"><?php echo "Variação: " . $stocks['IBOVESPA']['variation'] . "%" ?></div>
                </div>
                <div class="card">
                    <div class="name"><?php echo $stocks['IFIX']['name'] ?></div>
                    <div class="location"><?php echo $stocks['IFIX']['location'] ?></div>
                    <div class="value"><?php echo number_format($stocks['IFIX']['points'], 2, ',', '.') ?></div>
                    <div class="variation"><?php echo "Variação: " . $stocks['IFIX']['variation'] . "%" ?></div>
                </div>
                <div class="card">
                    <div class="name"><?php echo $stocks['NASDAQ']['name'] ?></div>
                    <div class="location"><?php echo $stocks['NASDAQ']['location'] ?></div>
                    <div class="value"><?php echo number_format($stocks['NASDAQ']['points'], 2, ',', '.') ?></div>
                    <div class="variation"><?php echo "Variação: " . $stocks['NASDAQ']['variation'] . "%" ?></div>
                </div>
                <div class="card">
                    <div class="name"><?php echo $stocks['DOWJONES']['name'] ?></div>
                    <div class="location"><?php echo $stocks['DOWJONES']['location'] ?></div>
                    <div class="value"><?php echo number_format($stocks['DOWJONES']['points'], 2, ',', '.') ?></div>
                    <div class="variation"><?php echo "Variação: " . $stocks['DOWJONES']['variation'] . "%" ?></div>
                </div>
                <div class="card">
                    <div class="name"><?php echo $stocks['NIKKEI']['name'] ?></div>
                    <div class="location"><?php echo $stocks['NIKKEI']['location'] ?></div>
                    <div class="value"><?php echo number_format($stocks['NIKKEI']['points'], 2, ',', '.') ?></div>
                    <div class="variation"><?php echo "Variação: " . $stocks['NIKKEI']['variation'] . "%" ?></div>
                </div>
            </div>
        </div>

    </div>
</body>
<script>

    let variation = document.getElementsByClassName('variation');
    for (let index = 0; index < variation.length; index++) {
        let variationColor = variation.item(index).innerHTML;
        variationColor = variationColor.replace("Variação: ", "")
        variationColor = parseFloat(variationColor);
        //console.log(variationColor)
        if(variationColor >= 0){
            //console.log(variationColor)
            variation.item(index).style.color = "green";
        }else{
            variation.item(index).style.color = "red";
        }
        
    }
</script>
</html>