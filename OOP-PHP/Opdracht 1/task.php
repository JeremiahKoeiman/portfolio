<?php

class Task{
    public $description;
    public $title;
    public $completed = false;

    public function __construct($description, $title)
    {
        $this->description = $description;
        $this->title = $title;
    }

    public function completed()
    {
        $this->completed = true;
    }
}

$task = new Task('This is my discription', 'This is a sample title');
$task->completed();

var_dump($task->description);