<?php
function bankomat($cash)
{
    if (ctype_digit($cash) === false) {
        echo "Invalid number" . PHP_EOL;
    } elseif ($cash < 100000) {
    	$banknote = [500, 200, 100, 50, 20, 10, 5, 2, 1];
    	$banknoteCounter = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    	for ($i = 0; $i < 9; $i++) {
            if ($cash >= $banknote[$i]) {
                $banknoteCounter[$i] = intval($cash / $banknote[$i]);
            	$cash = $cash - $banknoteCounter[$i] * $banknote[$i];
       	    }
    	}
    	for ($i = 0; $i < 9; $i++) {
      	    if ($banknoteCounter[$i] != 0) {
                echo $banknote[$i] . ': ' . $banknoteCounter[$i] . PHP_EOL;
            }
    	}
    } else {
        echo "Maximum value - 100000 UAH" . PHP_EOL;
    }
}

if (empty($argv[1]) == true) {
    $cash = false;
} else {
    $cash = $argv[1];
}

bankomat($cash);
