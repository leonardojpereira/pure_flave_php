const cartButtonHeader = document.querySelector(".cart");
const cartModal = document.querySelector(".cart-modal");
const closeModal = document.querySelector(".close-modal");

cartButtonHeader.addEventListener("click", () => {
  cartModal.classList.add("active");
});

closeModal.addEventListener("click", () => {
  cartModal.classList.remove("active");
});

const cartItems = document.querySelector(".cart-items");
const cartTotal = document.querySelector(".cart-total");
const checkoutBtn = document.querySelector(".checkout-btn");
const cartCounter = document.querySelector(".counter");

const addToCartButtons = document.querySelectorAll(".cart-btn");

const cart = [];

addToCartButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const productId = button.getAttribute("data-product-id");
    const productName = button.getAttribute("data-name");
    const productPrice = parseFloat(button.getAttribute("data-price"));
    const productImage = button.getAttribute("data-image");

    const existingCartItem = cart.find((item) => item.id === productId);

    if (existingCartItem) {
      existingCartItem.quantity += 1;
    } else {
      cart.push({
        id: productId,
        name: productName,
        price: productPrice,
        image: productImage,
        quantity: 1,
      });
    }

    updateCart();
  });
});

const controlAddBtn = document.querySelector(".control-btn.add");
const controlRemoveBtn = document.querySelector(".control-btn.remove");

let selectedCartItemIndex = 0;

controlAddBtn.addEventListener("click", () => {
  if (cart[selectedCartItemIndex]) {
    cart[selectedCartItemIndex].quantity += 1;
    updateCart();
  }
});

controlRemoveBtn.addEventListener("click", () => {
  if (cart[selectedCartItemIndex]) {
    if (cart[selectedCartItemIndex].quantity > 1) {
      cart[selectedCartItemIndex].quantity -= 1;
    } else {
      cart.splice(selectedCartItemIndex, 1);
      selectedCartItemIndex = 0;
    }
    updateCart();
  }
});

function updateCart() {
  cartItems.innerHTML = "";
  let totalItems = 0;
  let totalPrice = 0;

  if (cart.length === 0) {
    cartItems.innerHTML = "Seu carrinho está vazio :(";
    cartTotal.innerHTML = "<span>Total: R$ 0.00</span>";
    checkoutBtn.disabled = true;
  } else {
    cart.forEach((item, index) => {
      const cartItem = document.createElement("div");
      cartItem.classList.add("cart-item");
      cartItem.innerHTML = `
        <img src="${item.image}" alt="${item.name}">
        <div class="item-details">
            <span class="item-name">${item.name}</span>
            <span class="item-price">R$ ${item.price.toFixed(2)}</span>
            <div class="item-controls">
                <span class="item-quantity">Quantidade: ${
                  item.quantity
                }</span>
                <div class="btn-container">
                    <button class="control-btn add" data-index="${index}">+</button>
                    <button class="control-btn remove" data-index="${index}">-</button>
                </div>
            </div>
        </div>
      `;
      cartItems.appendChild(cartItem);

      totalItems += item.quantity;
      totalPrice += item.price * item.quantity;
    });

    cartTotal.innerHTML = `<span>Total: R$ ${totalPrice.toFixed(2)}</span>`;
    checkoutBtn.disabled = false;
  }

  cartCounter.textContent = totalItems;

  const addButtons = document.querySelectorAll(".control-btn.add");
  const removeButtons = document.querySelectorAll(".control-btn.remove");

  addButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const index = parseInt(button.getAttribute("data-index"));
      cart[index].quantity += 1;
      updateCart();
    });
  });

  removeButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const index = parseInt(button.getAttribute("data-index"));
      if (cart[index].quantity > 1) {
        cart[index].quantity -= 1;
      } else {
        cart.splice(index, 1);
      }
      updateCart();
    });
  });
}