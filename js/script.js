$(document).ready(function() {
    $.ajax({
        url: 'php/fetch_products.php',
        method: 'GET',
        success: function(data) {
            var products = JSON.parse(data);
            var productContainer = $('#products');
            products.forEach(function(product) {
                var productHTML = `<div class="product">
                    <img src="images/${product.image}" alt="${product.name}">
                    <h2>${product.name}</h2>
                    <p>${product.description}</p>
                    <p>$${product.price}</p>
                </div>`;
                productContainer.append(productHTML);
            });
        }
    });
});
