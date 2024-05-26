document.addEventListener("DOMContentLoaded", function () {
    const sizeLabels = document.querySelectorAll('.custom-select-form label.sizeLabel');
    let selectedSize = null;

    sizeLabels.forEach(function (label) {
        label.addEventListener('click', function () {
            selectedSize = label.innerText.trim();

            // Loại bỏ lớp focus từ tất cả các label trước đó
            sizeLabels.forEach(function (otherLabel) {
                otherLabel.classList.remove('focus');
            });

            // Thêm lớp focus cho label được click
            label.classList.add('focus');
        });
    });

    const quantityInput = document.getElementById("quantity_1");
    quantityInput.addEventListener('focus', function () {
        sizeLabels.forEach(function (label) {
            if (label.innerText.trim() === selectedSize) {
                label.classList.add('focus');
            } else {
                label.classList.remove('focus');
            }
        });
    });
});
function showQuantity(quantity) {
    document.getElementById("quantityDisplay").innerHTML = "Số lượng còn trong kho: " + quantity;
    const quantityInput = document.getElementById("quantity_1");
    quantityInput.max = quantity;
}