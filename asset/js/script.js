document.addEventListener('DOMContentLoaded', function () {
    const decreaseButton = document.getElementById('decrease');
    const increaseButton = document.getElementById('increase');
    const quantityInput = document.getElementById('quantity');

    decreaseButton.addEventListener('click', function () {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > parseInt(quantityInput.min)) {
            quantityInput.value = currentValue - 1;
        }
    });

    increaseButton.addEventListener('click', function () {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue < parseInt(quantityInput.max)) {
        quantityInput.value = currentValue + 1;
        }
    });
});
const buybtns = document.querySelectorAll(".js-buy-ticket");
      const modal = document.querySelector(".js-modal");
      const modalClose = document.querySelector(".js-modal-close");
      const modalContainer = document.querySelector(".js-modal-container");
      function openModal() {
        modal.classList.add("open");
      }
      function closeModal() {
        modal.classList.remove("open");
      }
      function stopClose(event) {
        event.stopPropagation();
      }
      for (const buybtn of buybtns) {
        buybtn.addEventListener("click", openModal);
      }
      modalClose.addEventListener("click", closeModal);
      modal.addEventListener("click", closeModal);
      modalContainer.addEventListener("click", stopClose);