<?php

abstract class Product
{
    protected $name;
    protected $purchasePrice;
    protected $tax;
    protected $description;
    protected $products;

    public function __construct($name, $purchasePrice, $tax, $description)
    {
        $this->name = $name;
        $this->purchasePrice = $purchasePrice;
        $this->tax = $tax;
        $this->description = $description;
    }

    abstract public function ProductInfo();
}

class Music extends Product
{
    protected $songName;
    protected $type = 'Music';

    public function __construct($name, $purchasePrice, $tax, $description, $songName)
    {
        parent::__construct($name, $purchasePrice, $tax, $description);
        $this->songName = $songName;
    }

    public function ProductInfo()
    {
        foreach ($this->products as $product)
        {
            if ($product->type == 'Music')
            {
                echo 'Categorie: '.$product;
            }
        }
    }
}

class Movie extends Product
{
    protected $quality;
    protected $type = 'Movie';

    public function __construct($name, $purchasePrice, $tax, $description, $quality)
    {
        parent::__construct($name, $purchasePrice, $tax, $description);
        $this->quality = $quality;
    }

    public function ProductInfo()
    {
        foreach ($this->products as $product)
        {
            if ($product->type == 'Movie')
            {
                echo 'Categorie: '.$product;
            }
        }
    }
}

class Game extends Product
{
    protected $genre;
    protected $cpu;
    protected $gpu;
    protected $ram;
    protected $storage;
    protected $type = 'Game';

    public function __construct($name, $purchasePrice, $tax, $description, $genre, $cpu, $gpu, $ram, $storage)
    {
        parent::__construct($name, $purchasePrice, $tax, $description);
        $this->genre = $genre;
        $this->cpu = $cpu;
        $this->gpu = $gpu;
        $this->ram= $ram;
        $this->storage = $storage;
    }

    public function ProductInfo()
    {
        foreach ($this->products as $product)
        {
            if ($product->type == 'Game')
            {
                echo 'Categorie: '.$product;
            }
        }
    }
}

class ProductList
{
    protected $products = [];
    protected $listName;

    public function __construct($listName)
    {
        $this->listName = $listName;
    }

    public function AddProduct($product)
    {
        $this->products[] = $product;
    }
}

$list = new ProductList('Products');
$list->AddProduct(new Movie('hello', '$20', '$2', 'Good movie!', 'dvd'));
$list->AddProduct(new Movie('hello2', '$22', '$4', 'Yea Boy!!!', 'blue-ray'));
$list->AddProduct(new Game('My Game', '$50', '$5', 'Good Game', 'RPG', 'Intel i9', 'Nvdia RTX2080', '8GB', '120MB'));
$list->AddProduct(new Game('My Game2', '$50', '$5', 'Good Game!!', 'RPG', 'Intel i7', 'Nvdia RTX1060', '4GB', '120MB'));
$list->AddProduct(new Music('Hello', '$30', '$3', 'Nice song', 'Hello'));
$list->AddProduct(new Music('Hello2', '$15', '$2', 'Nice song!!', 'Hello2'));
var_dump($list);