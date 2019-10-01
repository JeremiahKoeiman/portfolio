<?php
require 'functions.php';

$figures = new Figure(200, 200);
$figures->AddSquare(new Square(200, 200));//, new Circle(200, 200));
$figures->AddCircle(new Circle(200, 200));
$figures->AddRect(new Rect(250, 200));
$figures->AddTriangle(new Triangle());
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<img alt="image" src="square.png">
<img alt="image" src="circle.png">
<img alt="image" src="rect.png">
<img alt="image" src="triangle.png">
</body>
</html>