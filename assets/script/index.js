const cartButton = document.querySelector('.cart');
const cartModal = document.querySelector('.cart-modal');
const closeModal = document.querySelector('.close-modal');

cartButton.addEventListener('click', () => {
    cartModal.classList.add('active');
});

closeModal.addEventListener('click', () => {
    cartModal.classList.remove('active');
});