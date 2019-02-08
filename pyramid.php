<?php

$height = $argv[1];

if ($height&1) {
    $top = $bottom = ($height+1)/2;

    for ($i = 1; $i < $top; $i++) {
        for ($j = $i; $j < $top; $j++)
            echo "  ";
        for ($j = 2 * $i - 1; $j > 0; $j--)
            echo (" *");
        echo PHP_EOL;
    }

    for ($i = $bottom; $i > 0; $i--) {
        for ($j = $bottom - $i; $j > 0; $j--)
            echo "  ";
        for ($j = 2 * $i - 1; $j > 0; $j--)
            echo (" *");
        echo PHP_EOL;
    }
} else {
    echo 'Error. Enter an odd number', PHP_EOL;
}
