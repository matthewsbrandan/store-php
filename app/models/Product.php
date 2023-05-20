<?php

require_once 'app/models/Model.php';
class Product extends Model{  
  public static $fillable = [
    'name',
    'slug',
    'description',
    'price',
    'image',
    'additional_images',
    'size',
    'color',
    'stock_qtd',
    'category_id',
    'group_id',
  ];
  public static $convertions =  [
    'id' => 'int',
    'price' => 'float',
    'additional_images' => 'csv',
    'stock_qtd' => 'int',
    'category_id' => 'int',
    'group_id' => 'int',
  ];
  public $price_formatted;

  public function __construct($product = []){
    parent::__construct($product);

    if(count($product) > 0){
      $this->price_formatted = 'R$ ' . number_format($product['price'], 2, ',', '.');
    }
  }
}