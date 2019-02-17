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

class queue
{
    private $oneStack;
    private $twoStack;

    public function __construct()
    {
        $this->oneStack = new stack();
        $this->twoStack = new stack();
    }

    public function in($value)
    {
        $this->oneStack->in($value);
    }

    public function out()
    {
        if ($this->twoStack->isEmpty()) {
            while (!$this->oneStack->isEmpty()) {
                $this->twoStack->in($this->oneStack->out());
            }
            return $this->twoStack->out();
        } else {
            return $this->twoStack->out();
        }
    }

    public function isEmpty()
    {
        return ($this->oneStack && $this->twoStack) === 0;
    }
}
$obj = new queue();

foreach (range(0, 15) as $number) {
    $obj->in($number);
}
print_r($obj->isEmpty());

for ($i = 0; $i <= 15; $i++) {
    echo $obj->out() . PHP_EOL;
}
print_r($obj->isEmpty());
