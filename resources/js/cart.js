/**
 * FUNÇÕES
 * 
 * [x] Adicionar ao carrinho
 * [] Adicionar quantidade de itens
 * [] Remover quantidade de itens
 * [] Finalizar Compra
 */ 
if(!products) console.error('Const of products not found');

var productsOnCart = [];
function addProductToCart(id){
  // PROCURAR UM PRODUTO NA LISTA DE PRODUTOS PELO ID
  const product = products.find((prod) => prod.id === id);
  if(!product){
    alert('Produto não encontrado');
    // PARAR EXECUÇÃO DA FUNÇÃO
    return;
  }

  let findedProductOnCart = productsOnCart.find((prod) => prod.id === product.id);
  if(findedProductOnCart){
    if(hasQtdInStock(product, findedProductOnCart.qtd + 1)){
      findedProductOnCart.qtd++;
    }
    else{
      alert('Não há mais este produto em estoque');
      return;
    }
  }
  else productsOnCart.push({
    ...product,
    qtd: 1
  });    

  renderProductsOnCart();

  if(!document.querySelector('#cartOffcanvas.show')){
    document.querySelector('[data-bs-target="#cartOffcanvas"]').click();
  }
}
function removeProductToCart(id){
  let findedProductOnCart = productsOnCart.find((prod) => prod.id === id);
  if(!findedProductOnCart){
    alert('Produto não está mais no carrinho');
    return;
  }
  
  if(findedProductOnCart.qtd <= 1){
    productsOnCart = productsOnCart.filter((prod) => prod.id !== id);
  }
  else findedProductOnCart.qtd--;

  renderProductsOnCart();
}
function hasQtdInStock(product, qtd){
  return product.stock_qtd >= qtd;
}
function renderProductsOnCart(){
  let container = document.getElementById('container-cart-products');

  if(productsOnCart.length === 0) container.innerHTML = `
    <li class="list-group-item py-5 px-1 bg-light text-center">
      <em class="text-sm text-muted">Carrinho vazio</em>
    </li>
  `;
  else container.innerHTML = productsOnCart.map((product) => `
    <li class="list-group-item py-3 px-1">
      <div class="d-flex align-items-center column-gap-3">
        <img
          src="${product.image}"
          alt="Imagem da camisa software developer preta"
          class="rounded shadow"
          style="width: 5rem; height: 5rem; object-fit: cover;"
        />
        <div class="d-flex flex-column">
          <h6 class="mb-1">${product.name}</h6>
          <span class="text-muted">${product.price_formatted}</span>
        </div>
        <div class="ms-auto border rounded d-flex">          
          <button
            type="button"
            class="btn m-0 fw-bold text-muted"
            onclick="removeProductToCart(${product.id})"
          >-</button>
          <span class="align-self-center px-1 text-sm text-muted">${product.qtd}</span>
          <button
            type="button"
            class="btn m-0 fw-bold text-muted"
            onclick="addProductToCart(${product.id})"
          >+</button>
        </div>
      </div>
    </li>
  `).join(' ');
}