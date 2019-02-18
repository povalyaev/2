<?php

class stack
{
    private $top = 0;
    private $hranilishche = [];

    public function in($value)
    {
        $this->hranilishche[$this->top++] = $value;
    }

    public function out()
    {
        if($this->isEmpty()) {
            throw new RuntimeException("Stack is empty!");
        }
        return $this->hranilishche[--$this->top];
    }

    public function isEmpty()
    {
        return $this->top === 0;
    }
}

function testing($symmetry)
{
    $bracket = ['[' => ']', '<' => '>', '{' => '}', '(' => ')'];
    $symmetryok = new stack();
    $symmetryoff = false;
    $length = strlen($symmetry);

    for ($i = 0; $i < $length; $i++) {
        if (array_key_exists($symmetry[$i], $bracket)) {
            $symmetryok->in($bracket[$symmetry[$i]]);
        }
    }

    while (!$symmetryok->isEmpty()) {
        $symmetryoff .= $symmetryok->out();
    }

    if ($symmetryoff === substr($symmetry, $length/2)) {
        echo substr($symmetry, $length/2) . ' === ';
        echo $symmetryoff . PHP_EOL;
        return true;
    } else {
        echo substr($symmetry, $length/2) . ' === ';
        echo $symmetryoff . PHP_EOL;
        return false;
    }
}

var_dump(testing("(<{}>)"));
var_dump(testing("[(<{}>)]"));
var_dump(testing("(<{)"));
var_dump(testing("[(<{}>])"));
