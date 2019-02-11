<?php

$A = [4, 7, 1, 3, 2, 6];

function merge(&$A, $p, $q, $r)
{
    $n1 = $q - $p + 1;
    $n2 = $r - $q;

    $L = [];
    $R = [];

    for ($i = 0; $i < $n1; $i++) {
        $L[$i] = $A[$p + $i];
    }

    for ($j = 0; $j < $n2; $j++) {
        $R[$j] = $A[$q + $j + 1];
    }

    $L[$n1] = $R[$n2] = $i = $j = 0;

    for ($k = $p; $k <= $r; $k++) {
        if($L[$i] >= $R[$j]) {
            $A[$k] = $L[$i];
            $i++;
        } else {
            $A[$k] = $R[$j];
            $j++;
        }
    }
}

function mergeSoft(&$A, $p, $r)
{
    if ($p < $r) {
        $q = floor(($p + $r) / 2);
        mergeSoft($A, $p, $q);
        mergeSoft($A, $q + 1, $r);
        merge($A, $p, $q, $r);
	}
}

mergeSoft($A, 0, count($A) - 1);
echo json_encode($A), PHP_EOL;
