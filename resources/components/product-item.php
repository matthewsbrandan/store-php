<div class="card-product card">
  <div class="card-body">
    <img
      src="<?php echo $product->image; ?>"
      alt="Imagem da camisa software developer preta"
      class="card-img-top rounded shadow"
    />
    <div class="d-flex flex-column mt-2">
      <h5 class="card-title fs-6 mb-0"><?php echo $product->name; ?></h5>
      <span class="fs-4 fw-semibold"><?php echo $product->price_formatted; ?></span>

      <button
        type="button"
        class="btn btn-primary mt-3 d-flex align-items-center p-0 text-sm overflow-hidden"
        onclick="addProductToCart(<?php echo $product->id; ?>)"
      >
        <div
          class="d-flex align-items-center"
          style="gap: .3rem; background: var(--bs-btn-active-bg); padding: .375rem .5rem;"
        >
          <?php include 'resources/components/icons/add-card.php'; ?>
          0
        </div>
        <span class="text-uppercase text-center px-2 text-xs fw-semibold" style="flex: 1;">Adicionar ao carrinho</span>
      </button>
    </div>
  </div>
</div>