<?php
require_once 'app/database/DB.php';
class Model{
  public static $table = null;
  public static $protected = ['id'];
  public static $convertions =  ['id' => 'int'];
  public static $fillable = [];

  public function __construct($object = []){
    foreach($object as $col => $value){
      if(
        !in_array($col, static::$protected) &&
        !in_array($col, static::$fillable)
      ) continue;

      if(isset(static::$convertions[$col])){
        switch(static::$convertions[$col]){
          case 'int':         $this->$col = (int) $value;                                break;
          case 'float':       $this->$col = (float) $value;                              break;
          case 'csv':         $this->$col = $value ? explode(',',$value) : $value;       break;
          case 'json-object': $this->$col = $value ? json_decode($value) : $value;       break;
          case 'json-array':  $this->$col = $value ? json_decode($value, true) : $value; break;
          case 'boolean':     $this->$col = (boolean) $value;                            break;
          default: throw new Error('Tipo de conversão não encontrada: ' . static::$convertions[$col]);
        }
      }
      else $this->$col = $value;
    }
  }
  
  public static function getTableName($onlyDefault = false){
    if(!static::$table || $onlyDefault){
      $defaultTableName = strtolower(preg_replace(
        '/(?<!^)[A-Z]/', '_$0', 
        get_class(new static)
      ));

      if(substr($defaultTableName, -1) === 'y') $defaultTableName = substr(
        $defaultTableName, 
        0,
        strlen($defaultTableName) - 1
      ).'ies';
      else $defaultTableName.= 's';
      return $defaultTableName;
    }
    return static::$table;
  }

  public static function count(){
    $table = static::getTableName();
    if(!$table) throw new Error('Invalid table name on Model');

    $sql = "select count(*) qtd from $table";
    $data = DB::query($sql);
    
    return $data->fetch_array()[0];
  }
  public static function get($where = null, $columns = '*'){
    $table = static::getTableName();
    if(!$table) throw new Error('Invalid table name on Model');

    $sql = "select $columns from $table" . ($where ? " where $where" : "");
    $data = DB::query($sql);

    $products = [];
    while($res = $data->fetch_assoc()){
      $products[] = new static($res);
    }

    return $products;
  }
  public static function first($where = '', $columns = '*'){
    $products = static::get("$where limit 1", $columns);
    if(count($products) === 0) return null;
    return $products[0];
  }
  public static function create($data){
    $table = static::getTableName();
    if(!$table) throw new Error('Invalid table name on Model');

    [$columns, $parsedData] = static::handleFillableColumns($data);

    $joinedColumns = '`' . implode('`, `', $columns) . '`';
    $joinedData = implode(", ", $parsedData);

    $sql = "insert into $table($joinedColumns) values ($joinedData)";
    $data = DB::query($sql);
    if($data){
      return static::first('1=1 order by id desc');
    }
    return null;
  }
  public static function delete($id){
    $table = static::getTableName();
    if(!$table) throw new Error('Invalid table name on Model');

    $sql = "delete from $table where id = $id";
    $data = DB::query($sql);

    return $data;
  }
  public static function deleteAll(){
    $table = static::getTableName();
    if(!$table) throw new Error('Invalid table name on Model');

    $sql = "delete from $table where 1=1";
    $data = DB::query($sql);

    return $data;
  }
  public static function update($where, $data){
    $table = static::getTableName();
    if(!$table) throw new Error('Invalid table name on Model');

    [$columns, $parsedData] = static::handleFillableColumns($data);
    
    $merge = [];
    for($i = 0; $i < count($columns); $i++){
      $merge[]= "`{$columns[$i]}` = " . addslashes($parsedData[$i]);
    }

    $joinedSets = implode(', ', $merge);

    $sql = "update $table set $joinedSets where $where";
    $data = DB::query($sql);

    return $data;
  }

  #region HELPERS
  public static function handleFillableColumns($data){
    $columns = array_filter(array_keys($data), function($col){
      return in_array($col, static::$fillable);
    });
    
    $parsedData = [];
    foreach($data as $key => $value){
      if(!in_array($key, $columns)) continue;
      $parsedData[]= $value ? "'" . addslashes($value) . "'" : 'null';
    }
    return [$columns, $parsedData];
  }
  #endregion HELPERS
}