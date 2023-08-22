document.addEventListener("DOMContentLoaded", function () {
  const editButtons = document.querySelectorAll(".edit-button");
  const editModal = document.getElementById("editModal");
  const closeModalButton = editModal.querySelector(".close-button");
  const productNameInput = editModal.querySelector("#productName");
  const productPriceInput = editModal.querySelector("#productPrice");
  const productIdInput = editModal.querySelector("#productId"); // Added this line
  const editForm = editModal.querySelector("form");

  editButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const productInfo = button.closest(".product").dataset;
      productNameInput.value = productInfo.name;
      productPriceInput.value = parseFloat(productInfo.price);
      productIdInput.value = productInfo.id; // Set the product ID value
      editForm.action = "update-product.php?id=" + productInfo.id;
      editModal.style.display = "block";
    });
  });

  closeModalButton.addEventListener("click", () => {
    editModal.style.display = "none";
  });
});