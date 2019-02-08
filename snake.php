<?php

$size = $argv[1];     
$snake = [];
fillingSnake($size, 1);

function fillingSnake($size, $start)
{
    for ($i = 0; $i < $size; $i++) {
        if ($i&1) {
            for ($j = $size - 1; $j >= 0; $j--) {
                $snake[$i][$j] = $start;
                $start++;
            }
        } else {
            for ($j = 0; $j < $size; $j++) {
                $snake[$i][$j] = $start;
                $start++;
            }
        }   
    }
viewSnake($snake, $size);
}

function viewSnake($snake, $size)
{
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            echo $snake[$j][$i] . ' ';
        }
        echo PHP_EOL;
    }
}
