<?php 
    $initalNumber = 0;
    $finalNumber = 100;

    $resp = random_int($initalNumber, $finalNumber);
    $respMathRand = mt_rand($initalNumber, $finalNumber);

    echo "Using mt_rand: $respMathRand\n";
    echo "Using random_init: $resp"
?>