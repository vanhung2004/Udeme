
function validateAndSubmit() {
    var size = document.getElementById('size').value;
    var quantityInput = document.getElementById('quantity_1');
    var quantity = parseInt(quantityInput.value);

    // Check if the quantity is a positive integer
    if (isNaN(quantity) || quantity <= 0 || Math.floor(quantity) !== quantity) {
        alert('Vui lòng nhập số lượng hợp lệ.');
        return;
    }

   
    var availableQuantity = 10; // Replace with the actual available quantity

    if (quantity > availableQuantity) {
        alert('Số lượng tồn kho không đủ.');
        return;
    }

    // If validation passes, submit the form
    document.getElementById('addtocart').submit();
}
