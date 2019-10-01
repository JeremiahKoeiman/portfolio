<?php


class Figure
{
    protected $width;
    protected $height;
    //protected $surface;
}

class Square extends Figure
{
    protected $imgS;
    public function getSurface($width, $height)
    {
        global $imgS;
        $this->width = $width;
        $this->height = $height;
        //$this->surface = $width*$height;

        //header type for image output
        header('Content-type: image/jpeg');
        //create image resource variable
        $imgS = imagecreatetruecolor($width, $height);
        //fill image with color
        imagefill($imgS, 10, 10, imagecolorallocate($imgS, 255, 0, 0));
        //output image
        imagejpeg($imgS);
    }
}

class Triangle extends Figure
{
    public function getSurface($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        //$this->surface = .5*$width*$height;
    }
}

class Circle extends Figure
{
    protected $diameter;
    public function getSurface($diameter)
    {
        $this->diameter = $diameter;
        //$this->surface = pow($diameter, 2)*pi()/4;
    }
}

class Rect extends Figure
{
    protected $imgR;
    public function getSurface($width, $height)
    {
        global $imgR;
        $this->width = $width;
        $this->height = $height;
        //$this->surface = $width*$height;

        //header type for image output
        header('Content-type: image/jpeg');
        //create image resource variable
        $imgR = imagecreatetruecolor($width, $height);
        //fill image with color
        imagefill($imgR, -10, -10, imagecolorallocate($imgR, 255, 0, 0));
        //output image
        imagejpeg($imgR);
    }
}