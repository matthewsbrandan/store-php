<?php
  require_once 'app/database/DB.php';

  DB::seedsIfEmpty();
  $products = Product::get();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lem's Teams</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous"
  />
  
  <link rel="stylesheet" href="./resources/css/global.css"/>
  <link rel="stylesheet" href="./resources/css/home.css"/>

  <link rel="shortcut icon" href="./resources/images/icon.jpg" type="image/jpg">
</head>
<body>
  <main class="container mt-4">
    <!-- 1rem == 16px -->
    <nav class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center" style="gap: 0.7rem;">
        <h1>Lems Teams</h1>
      </div>
  
      <div class="d-flex align-items-center" style="gap: 0.7rem;">
        <div class="d-none d-sm-flex flex-column text-end">
          <strong class="text-sm">Meu Carrinho</strong>
          <span class="text-xs fw-light">0 itens</span>
        </div>

        <button
          class="btn p-0 m-0"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#cartOffcanvas"
          aria-controls="cartOffcanvas"
        >
          <?php include 'resources/components/icons/cart.php'; ?>
        </button>
      </div>
    </nav>

    <section class="mt-3 mt-sm-4 mt-lg-5 mb-5 px-2 px-lg-4" id="container-products">
      <?php foreach($products as $product){ include 'resources/components/product-item.php'; } ?>
    </section>
    <?php include 'resources/components/cart-offcanvas.php'; ?>
  </main>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"
  ></script>
  <script> const products = <?php echo json_encode($products); ?>; </script>
  <script src="./resources/js/cart.js"></script>
</body>
</html>