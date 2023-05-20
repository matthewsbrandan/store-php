<?php

require_once '../app/database/DB.php';

class Product{
  public $id;
  public $name;
  public $slug;
  public $description;
  public $price;
  public $image;
  public $additional_images;
  public $size;
  public $color;
  public $stock_qtd;
  public $category_id;
  public $group_id;

  public function __construct($data){
    $this->id = $data->id;
    $this->name = $data->name;
    $this->slug = $data->slug;
    $this->description = $data->description;
    $this->price = $data->price;
    $this->image = $data->image;
    $this->additional_images = $data->additional_images;
    $this->size = $data->size;
    $this->color = $data->color;
    $this->stock_qtd = $data->stock_qtd;
    $this->category_id = $data->category_id;
    $this->group_id = $data->group_id;
  }

  public function verifyStockQtd($number){
    return $this->stock_qtd >= $number;
  }

  public static function create($product){
    $name = $product->name;
    $slug = $product->slug;
    $description = $product->description;
    $price = $product->price;
    $image = $product->image;
    $additional_images = $product->additional_images;
    $size = $product->size;
    $color = $product->color;
    $stock_qtd = $product->stock_qtd;
    $category_id = $product->category_id;
    $group_id = $product->group_id;

    $sql = "insert into products(name, slug, description, price, image, additional_images, size, color, stock_qtd, category_id, group_id) values ('$name', '$slug', '$description', $price, '$image', '$additional_images', '$size', '$color', $stock_qtd, $category_id, $group_id)";

    $data = DB::query($sql);
    if($data){
      $sql = "select * from products order by id desc limit 1";
      $data = DB::query($sql);
      $createdProduct = $data->fetch_assoc();
      if($createdProduct){
        return new Product((object) $createdProduct);
      }
    }

    return null;
  }
}

$product = Product::create((object)[
  'name' => 'Camiseta básica',
  'slug' => 'camiseta-basica',
  'description' => 'Camiseta básica de algodão',
  'price' => 29.90,
  'image' => 'https://cdn.awsli.com.br/1000x1000/608/608801/produto/133246931/44b83527a3.jpg',
  'additional_images' => null,
  'size' => 'M',
  'color' => 'Branco',
  'stock_qtd' => 50,
  'category_id' => 1,
  'group_id' => 1
]);

var_dump($product); // IRÁ PRINTAR O OBJETO CRIADO
var_dump($product->verifyStockQtd(52)); // IRÁ PRINTAR FALSE POIS NÃO EXISTE QTD EM ESTOQUE
var_dump($product->verifyStockQtd(48)); // IRÁ PRINTAR TRUE POIS EXISTE QTD EM ESTOQUE