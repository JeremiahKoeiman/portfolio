<?php
require 'huizen_class.php';

$house1 = new houses('2', '5', '5 meter', '3 meter', '10 meter', '€750');
$house2 = new houses('1', '2', '3 meter', '3 meter', '7 meter', '€550');
$house3 = new houses('3', '7', '8 meter', '4 meter', '14 meter', '€1250');

var_dump($house1, $house2, $house3);