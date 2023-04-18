<?php
    echo "Digite o valor me R$:";
    $stdin = fopen ("php://stdin","r");
    $numReal = fgets($stdin);
    $cotacaoDolar = 4.97;

    $sum = number_format($numReal / $cotacaoDolar, 2,  '.', '');
    
    echo "Seus R$: $numReal valem a US$ $sum";
?>