let cart = []; 
function mostrarProductos(productos) {
    const productContainer = document.getElementById("product-container");
    productContainer.innerHTML = ""; 

    productos.forEach(producto => {
        const productDiv = document.createElement("div");
        productDiv.className = "product";

        productDiv.innerHTML = `
            <img src="${producto.imagen}" alt="${producto.nombre}">
            <h2>${producto.nombre}</h2>
            <p>${producto.descripcion}</p>
            <p>Precio: $${producto.precio.toFixed(2)}</p>
            <button onclick="agregarAlCarrito(${producto.idA})">Agregar al Carrito</button>
        `;

        productContainer.appendChild(productDiv);
    });
}


function agregarAlCarrito(productId) {
    const producto = productos.find(p => p.idA === productId);
    if (producto) {
        cart.push(producto);
        actualizarCarrito(); 
        alert(`${producto.nombre} agregado al carrito.`);
    }
}

function actualizarCarrito() {
    const cartContainer = document.getElementById("cart");
    cartContainer.innerHTML = "";

    cart.forEach(item => {
        const li = document.createElement("li");
        li.textContent = `${item.nombre} - $${item.precio.toFixed(2)}`;
        cartContainer.appendChild(li);
    });
}

document.addEventListener("DOMContentLoaded", () => {
   
    fetch('../modelos/Producto.php') 
        .then(response => response.json())
        .then(data => {
            productos = data; 
            mostrarProductos(productos);
        })
        .catch(error => console.error('Error al cargar productos:', error));
});


document.getElementById("checkout").addEventListener("click", function() {
    if (cart.length === 0) {
        alert("Tu carrito está vacío ");
    } else {
        alert("Gracias por tu compra!");
        cart.length = 0; 
        actualizarCarrito(); 
    }
});
