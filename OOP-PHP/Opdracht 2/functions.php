<?php

class Figure
{
    protected $shapes;

    public function __construct()
    {
        $this->shapes = array();
    }

    public function AddSquare(Square $square)
    {
        array_push($this->shapes , $square);
    }

    public function AddCircle(Circle $circle)
    {
        array_push($this->shapes , $circle);
    }

    public function AddRect(Rect $rect)
    {
        array_push($this->shapes , $rect);
    }

    public function AddTriangle(Triangle $triangle)
    {
        array_push($this->shapes , $triangle);
    }

}

class Square
{
    protected $width;
    protected $height;
    protected $blue;
    protected $bg;
    protected $img;

    public function __construct($width, $height)
    {
       $this->width = $width;
       $this->height = $height;
       global $img;
       $img = imagecreate($width, $height);
       $this->blue = imagecolorallocate($img, 255, 255, 255);
       $this->bg = imagecolorallocate($img,0,0,255);
       imagerectangle($img, 50, 50, 150, 150, $this->blue);
       imagefilledrectangle($img, 50, 50, 150, 150, $this->bg);
       imagepng($img, "square.png");
       imagedestroy($img);
    }
}

class Triangle
{
    protected $blue;
    protected $bg;
    protected $img;

    public function __construct()
    {
        global $img;
        $img = imagecreate(200, 200);
        $this->bg = imagecolorallocate($img,255,255,255);
        $this->blue = imagecolorallocate($img, 0, 0, 255);
        imageline($img, 113, 113, 275, 275, $this->blue);
        imageline($img, 112, 112, -5, 200, $this->blue);
        imageline($img, 0, 198, 1000000, 198, $this->blue);
        imagepng($img, "triangle.png");
        imagedestroy($img);
    }
}

class Circle
{
    protected $width;
    protected $height;
    protected $blue;
    protected $bg;
    protected $img;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        global $img;
        $img = imagecreate($width, $height);
        $this->blue = imagecolorallocate($img, 255, 255, 255);
        $this->bg = imagecolorallocate($img,0,0,255);
        imageellipse($img, 50, 50, $width, $height, $this->blue);
        imagefilledellipse($img, 75, 75, ($width/1.5), ($height/1.5), $this->bg);
        imagepng($img, "circle.png");
        imagedestroy($img);
    }
}

class Rect
{
    protected $width;
    protected $height;
    protected $blue;
    protected $bg;
    protected $img;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        global $img;
        $img = imagecreate($width, $height);
        $this->bg = imagecolorallocate($img,0,0,255);
        imagefilledrectangle($img, 50, 50, 150, 150, $this->bg);
        imagepng($img, "rect.png");
        imagedestroy($img);
    }
}