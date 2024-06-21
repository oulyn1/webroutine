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
        quantityInput.value = currentValue + 1;
    });
});

document.getElementById('toggle-button').addEventListener('click', function() {
    const productDetails = document.getElementById('product-details');
    const button = document.getElementById('toggle-button');

    if (productDetails.classList.contains('fade')) {
        productDetails.classList.remove('fade');
        button.textContent = 'XEM THÊM';
    } else {
        productDetails.classList.add('fade');
        button.textContent = 'ẨN BỚT';
    }
});