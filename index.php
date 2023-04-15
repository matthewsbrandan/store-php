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
  <style>
    body{
      margin: 0;
      background: black;
      color: #ddd;
    }
    h1, strong, svg{ color: white; }
    .text-sm{ font-size: 0.875rem; }
    .text-xs{ font-size: 0.7rem;   }
  </style>
</head>
<body>
  <main class="container mt-4">
    <!-- 1rem == 16px -->
    <nav class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center" style="gap: 0.7rem;">
        <h1>Lems Teams</h1>
      </div>
  
      <div class="d-flex align-items-center" style="gap: 0.7rem;">
        <div class="d-flex flex-column text-end">
          <strong class="text-sm">Meu Carrinho</strong>
          <span class="text-xs fw-light">0 itens</span>
        </div>
        <div><?php include 'src/components/icons/cart.php'; ?></div>
      </div>
    </nav>

    <section class="mt-5">
      <div class="card-product card" style="width: 18rem;">
        <div class="card-body">
          <img
            src="https://cdn.awsli.com.br/1000x1000/608/608801/produto/133246931/44b83527a3.jpg"
            alt="Imagem da camisa software developer preta"
            class="card-img-top rounded shadow"
          />
          <div class="d-flex flex-column mt-2">
            <h5 class="card-title fs-6 mb-0">Camisa Software Developer preta</h5>
            <span class="fs-4 fw-semibold">R$ 179,90</span>
  
            <button type="button" class="btn btn-primary mt-3 d-flex align-items-center p-0 text-sm overflow-hidden">
              <div
                class="d-flex align-items-center"
                style="gap: .3rem; background: var(--bs-btn-active-bg); padding: .375rem .5rem;"
              >
                <?php include 'src/components/icons/add-card.php'; ?>
                0
              </div>
              <span class="text-uppercase text-center px-2 text-xs fw-semibold" style="flex: 1;">Adicionar ao carrinho</span>
            </button>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>