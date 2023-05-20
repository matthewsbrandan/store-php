<pre>
<?php
  require_once '../app/database/DB.php';
  require_once '../app/models/Product.php';

  $sql = "select * from products";

  $data = DB::query($sql);
  $data->fetch_assoc();

  /**
   * [var_dump] CONSEGUE PRINTAR ESTRUTURAS COMPLEXAS (arrays, objetos, etc...)
   * [echo] PRINT ESTRUTURAS DE DADOS SIMPLES (string, number)
   */
  