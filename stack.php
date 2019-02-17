<?php

class Queue
{
    private $head = 0;
    private $tail = 0;
    private $hranilishche = [];

    public function in($value)
    {
        $this->hranilishche[$this->tail++] = $value;
    }
    public function isEmpty()
    {
        return $this->head === $this->tail;
    }
    public function out()
    {
        if($this->isEmpty()) {
            throw new RuntimeException("Queue is empty");
        }
        $res = $this->hranilishche[$this->head++];
        if($this->head > $this->tail) {
            $this->head = $this->tail = 0;
        }
        return $res;
    }
}


class stack
{
    private $oneQueue;
    private $twoQueue;

    public function __construct()
    {
        $this->oneQueue = new Queue();
        $this->twoQueue = new Queue();
    }

    public function in($value)
    {
        if ($this->twoQueue->isEmpty()) {
            while(!$this->oneQueue->isEmpty()) {
                $this->twoQueue->in($this->oneQueue->out());
            }
            $this->oneQueue->in($value);
            while (!$this->twoQueue->isEmpty()) {
                $this->oneQueue->in($this->twoQueue->out());
            }
        } else {
            $this->oneQueue->in($value);
        }
    }

    public function out()
    {
        return $this->oneQueue->out();
    }

    public function isEmpty()
    {
        return ($this->oneQueue && $this->twoQueue) === 0;
    }
}

$obj = new stack();

foreach (range(0, 15) as $number) {
    $obj->in($number);
}
print_r($obj->isEmpty());

for ($i = 0; $i <= 15; $i++) {
    echo $obj->out() . PHP_EOL;
}
print_r($obj->isEmpty());
