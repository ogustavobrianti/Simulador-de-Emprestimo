<?php

$nome = $_POST['nome'];
$cliente = $_POST['cliente'];
$serasa = intval($_POST['score']);
$parcelas = intval($_POST['parcelas']);
$seguro = $_POST['seguro'];
$emprestimo = floatval($_POST['emprestimo']);

$taxa_juros = 4;
$tarifa = 0;

if ($cliente === 'nao') {
    $tarifa = 35;

    if ($score >= 700) {
        $taxa_juros = 5;
    }
    elseif ($score >= 500) {
        $taxa_juros = 10;
    }
    elseif ($score>= 300) {
        $taxa_juros = 15;
    }
    else {
        $taxa_juros = 20;
    }
}

$imposto_iof = $emprestimo * 0.38;
$seguro_desemprego = ($seguro === "sim") ? $emprestimo * 3.5 : 0;
$custo_parcela_com_juros = ($emprestimo / $parcelas * (1 + $taxa_juros / 100));
$custo_efetivo_total = $custo_parcela_com_juros * $parcelas + $tarifa + $imposto_iof + $seguro_desemprego;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Simulador de Empréstimo</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <center>
        <div class="caixas">
            <h1>Resultado do Simulador de Empréstimo</h1>
            <p><label>Nome:</label> <?= $nome; ?></p>
            <p><label>Quantidade de parcelas:</label> <?= $parcelas; ?></p>
            <p><label>Valor das parcelas:</label> <?= number_format($custo_parcela_com_juros, 2); ?></p>
            <p><label>Taxa de Juros:</label> <?= number_format($taxa_juros, 1); ?></p>
            <p><label>Custo Efetivo Total:</label> <?= number_format($custo_efetivo_total, 2); ?></p>
            <br>
            <br>
            <a href="simulador.html">Voltar</a>
            
        </div>
</center>
</body>
</html>

