<?php


class houses
{
    public $stories;
    public $rooms;
    public $width;
    public $height;
    public $dept;
    public $price;

    public function __construct($stories, $rooms, $width, $height, $dept, $price)
    {
        $this->stories = $stories;
        $this->rooms = $rooms;
        $this->width = $width;
        $this->height = $height;
        $this->dept = $dept;
        $this->price = $price;
    }
}