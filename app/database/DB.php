<?php
require_once 'app/models/Product.php';
require_once 'app/models/Category.php';
require_once 'app/models/ProductGroup.php';

class DB{
  public static function query($sql){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cr_lemsteams";

    $conn = new mysqli($servername, $username, $password, $database);
    mysqli_set_charset($conn, 'utf8');

    if($conn->connect_error){ die("Connection failed: " . $conn->connect_error); }	

    $data = $conn->query($sql);
    if(isset($conn->error)&&!empty($conn->error)) throw new Error($conn->error);
    $conn->close();

    return $data;
  }

  public static function seeds(){
    $categories = [
      ['name' => 'Camiseta Básica'],
      ['name' => 'Camiseta Estampada']
    ];
    $categoryIds = [];
    foreach($categories as $category){
      $createdCategory = Category::create($category);
      if(!$createdCategory){
        var_dump('Não foi possível criar a categoria ' . $category['name']);
        die;
      }

      $categoryIds[] = (int) $createdCategory->id;
    }
    
    $productGroup = ['name' => 'Camisa de Time'];
    $createdProductGroup = ProductGroup::create($productGroup);
    if(!$createdProductGroup){
      var_dump('Não foi possível criar o grupo de produtos ' . $productGroup['name']);
      die;
    }
    $productGroupId = (int) $createdProductGroup->id;

    $products = [
      [
        'name' => 'Camiseta básica',
        'slug' => 'camiseta-basica',
        'description' => 'Camiseta básica de algodão',
        'price' => 29.90,
        'image' => 'https://cdn.awsli.com.br/1000x1000/608/608801/produto/133246931/44b83527a3.jpg',
        'additional_images' => null,
        'size' => 'M',
        'color' => 'Branco',
        'stock_qtd' => 50,
        'category_id' => $categoryIds[0],
        'group_id' => null
      ],[
        'name' => 'Camiseta estampada',
        'slug' => 'camiseta-estampada',
        'description' => 'Camiseta estampada em algodão',
        'price' => 39.90,
        'image' => 'https://hugobossstore.vtexassets.com/arquivos/ids/241400/4063535199447-Conjunto-3-Camisetas-BOSS-Gola-Redonda-Classic-Multicolorido_1.jpg?v=638025897554430000',
        'additional_images' => null,
        'size' => 'L',
        'color' => 'Azul',
        'stock_qtd' => 30,
        'category_id' => $categoryIds[1],
        'group_id' => null
      ],[
        'name' => 'Camiseta polo',
        'slug' => 'camiseta-polo',
        'description' => 'Camiseta polo em algodão',
        'price' => 59.90,
        'image' => 'https://ae01.alicdn.com/kf/H5d9ddc1882fb4700aff0eb5ca0f5199eX/Camiseta-con-estampado-Vintage-hecho-en-1993-para-hombre-con-todas-las-partes-originales-Camisa-de.jpg',
        'additional_images' => null,
        'size' => 'XL',
        'color' => 'Preto',
        'stock_qtd' => 20,
        'category_id' => $categoryIds[0],
        'group_id' => $productGroupId
      ],
    ];

    foreach($products as $product){
      $createdProduct = Product::create($product);
      if(!$createdProduct){
        var_dump('Não foi possível criar o produto ' . $product['name']);
        die;
      }
    }
  }
  public static function seedsIfEmpty(){
    $countProducts = Product::count();
    if($countProducts == 0){
      Category::deleteAll();
      ProductGroup::deleteAll();
      DB::seeds();
    }
  }
  public static function reset(){
    Product::deleteAll();
    Category::deleteAll();
    ProductGroup::deleteAll();
    
    DB::seeds();
  }
}
