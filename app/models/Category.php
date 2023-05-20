<?php

require_once 'app/models/Model.php';
class Category extends Model{  
  public static $fillable = [
    'name'
  ];
}