document.addEventListener("DOMContentLoaded", initPage);

function initPage() {
  const cartItems = JSON.parse(localStorage.getItem("cartItems")) ?? [];

  insertElements(cartItems);
  setPayment(cartItems);
  setEvents();
}

function insertElements(items) {
  if (!items.length) {
    return;
  }

  const fragment = document.createDocumentFragment();
  items.forEach(({ artItemId, name, autor, price, description, image }) => {
    const row = document.createElement("tr");
    row.classList.add("table__row");
    row.id = artItemId;
    row.innerHTML = `
        <td class="table__td cart-item__btn-close">
            <input value=${artItemId} class="cart-item__btn-close" type="image" src="/assets/images/close-icon.svg" alt="Botón de eliminar">
        </td>
        <td class="table__td cart-item__image-container">
            <img loading="lazy" class="cart-item__image" src="${image}" alt="imagen producto">
        </td>
        <td class="table__td cart-item__info-container">
            <p class="cart-item__info cart-item__info--name">${name}</p>
            <p class="cart-item__info">${description}</p>
            <p class="cart-item__info cart-item__info--autor">${autor}</p>
        </td>
        <td class="table__td cart-item__info-price">
            <p class="cart-item__price">${price}</p>
        </td>
    `;

    fragment.appendChild(row);
  });

  document.querySelector(".cart-item-container").appendChild(fragment);
}

function deleteElement({ target }) {
  const cartItems = JSON.parse(localStorage.getItem("cartItems")) ?? [];
  const artItemId = target.value; 

  const newCartItems = cartItems.filter(item => item.artItemId != artItemId);
  localStorage.setItem('cartItems', JSON.stringify(newCartItems));

  document.getElementById(artItemId).remove();
}

function setPayment(items) {
  if (!items.length) {
    return;
  }

  const subtotal = items.reduce((subtotal, {price}) => subtotal + parseFloat(price.replace("$", "")), 0); 
  const shippingCost = subtotal * .15; 

  document.getElementById("amount").textContent = items.length; 
  document.getElementById("subtotal").textContent = `$${subtotal}`; 
  document.getElementById("shippingCost").textContent = `$${shippingCost}`; 
  document.getElementById("total").textContent = `$${shippingCost + subtotal}`; 
}

function setEvents() {
  const closeBtns = document.querySelectorAll(".cart-item__btn-close");

  closeBtns.forEach((closeBtn) => {
    closeBtn.addEventListener("click", deleteElement);
  });
}
