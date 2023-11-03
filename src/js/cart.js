document.addEventListener("DOMContentLoaded", initPage);

function initPage() {
  const cartItems = document.querySelectorAll(".art-item");

  cartItems.forEach((cartItem) => {
    cartItem.addEventListener("click", (e) => {
        const id = e.target.getAttribute('data-id'); 
        document.querySelector(`#art-item-${id}`)?.remove();
    });
  });
}
