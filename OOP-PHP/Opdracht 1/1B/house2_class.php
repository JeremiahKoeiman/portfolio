<?php

class house
{
    protected $house;
    public $rooms;
    protected $totPrice;

    public function __construct($house)
    {
        $this->house = $house;
        $this->rooms = array();
    }

    public function AddRoom(room $room)
    {
        array_push($this->rooms, $room);
    }

    public function setPrice($price = 1447)
    {
        foreach ($this->rooms as $room) {
            $this->totPrice += $price * ($room->width * $room->dept);
        }
    }
}

class room
{
    public $width;
    public $height;
    public $dept;
    public $volume;

    public function __construct($width, $height, $dept)
    {
        $this->width = $width;
        $this->height = $height;
        $this->dept = $dept;
        $this->volume = $width * $height * $dept;
    }
}