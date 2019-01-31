<?php
function bankomat($argv)
{
foreach ($argv as $cash)
{
	if ($cash < 100000) {
    	$banknote = array(500, 200, 100, 50, 20, 10, 5, 2, 1);
    	$banknoteCounter = array(0, 0, 0, 0, 0, 0, 0, 0, 0);

    		for ($i = 0; $i < 9; $i++)
    		{
        		if ($cash >= $banknote[$i]) {
           		$banknoteCounter[$i] = intval($cash / $banknote[$i]);
            		$cash = $cash - $banknoteCounter[$i] * $banknote[$i];
       	 		}
    		}

    		for ($i = 0; $i < 9; $i++)
   		{
      			if ($banknoteCounter[$i] != 0) {
            		echo $banknote[$i] . ': ' . $banknoteCounter[$i] . PHP_EOL;
        		}
    		}
	} else {
		echo "Maximum value - 100000 UAH" . PHP_EOL;
	}
}
}

bankomat($argv);
