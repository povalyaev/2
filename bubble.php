<?php

$A = [5, 0, 35, -5, 8, 1];

function bubbleSort(&$A)
{
    for ($i = 0; $i < count($A); $i++) {
        for ($j = count($A) - 1; $j > $i; $j--) {
            if ($A[$j] < $A[$j - 1]) {
                $sort = $A[$j];
                $A[$j] = $A[$j - 1];
                $A[$j - 1] = $sort;
            }
        }
    }
}

bubbleSort($A);
echo json_encode($A), PHP_EOL;
