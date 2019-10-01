<?php
require 'house2_class.php';
$house = new house('Yea');
$house->AddRoom(new room(3, 4, 5));
$house->AddRoom(new room(2, 4, 6));
$house->AddRoom(new room(6, 7, 8));
$house->AddRoom(new room(6, 7, 8));
$house->AddRoom(new room(6, 7, 8));
$house->AddRoom(new room(6, 7, 8));
$house->AddRoom(new room(6, 7, 8));
$house->AddRoom(new room(6, 7, 8));
$house->setPrice();
var_dump($house);