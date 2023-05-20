<?php

require_once 'app/models/Model.php';
class ProductGroup extends Model{
  public static $fillable = [
    'name'
  ];
}