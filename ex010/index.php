<?php 
    echo "Digite o valor me R$:";
    $stdin = fopen ("php://stdin","r");
    $num = fgets($stdin);

    $numInt = intval($num);
    $numFrac = fmod($num, 1);

    echo "A parte inteira é: $numInt \n";
    echo "A parte fracionária é: $numFrac";
?>