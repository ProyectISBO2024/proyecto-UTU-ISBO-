document.getElementById('product-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('product-name').value;
    const description = document.getElementById('product-description').value;
    const price = document.getElementById('product-price').value;

    const product = { name, description, price };
   const productList = document.getElementById('product-list');
    const li = document.createElement('li');
    li.textContent = `${name} - ${description} - $${price}`;
    productList.appendChild(li);


    this.reset();
});
