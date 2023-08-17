document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".edit-button");
    const editModal = document.getElementById("editModal");
    const closeModalButton = editModal.querySelector(".close-button");
  
    editButtons.forEach((button) => {
      button.addEventListener("click", () => {
        editModal.style.display = "block";
      });
    });
  
    closeModalButton.addEventListener("click", () => {
      editModal.style.display = "none";
    });
  });