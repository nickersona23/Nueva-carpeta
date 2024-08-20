const btn_carrito = document.getElementById("btn-carrito")
const cerrar_carrito = document.querySelector(".cerrar_carrito")
const container_carrito = document.querySelector(".container_carrito")
const container = document.querySelector(".container")

function abrirCerrarCarrito(params) {
    cerrar_carrito.classList.toggle("hidden")
    container_carrito.classList.toggle("hidden")
}
btn_carrito.addEventListener("click", abrirCerrarCarrito)
cerrar_carrito.addEventListener("click", abrirCerrarCarrito)


// Función para guardar el ID del producto en localStorage
function guardarProductoEnLocalStorage(idProducto) {
    // Obtener los productos guardados en localStorage
    let productosGuardados = JSON.parse(localStorage.getItem('productos')) || [];

    // Agregar el nuevo ID del producto a la lista
    productosGuardados.push(idProducto);

    // Guardar la lista actualizada en localStorage
    localStorage.setItem('productos', JSON.stringify(productosGuardados));

    console.log(`Producto con ID ${idProducto} guardado en localStorage.`);
    mostrarCarrito()
}


// Función para guardar el ID del producto en localStorage
function eliminarProductoEnLocalStorage(posicionProducto) {
    // Obtener los productos guardados en localStorage
    let productosGuardados = JSON.parse(localStorage.getItem('productos')) || [];

    // elimina el producto en la lista
    productosGuardados.splice(posicionProducto, 1);

    // elimina el producto en el localStorage
    localStorage.setItem('productos', JSON.stringify(productosGuardados));

    console.log(`Producto con una posicion ${posicionProducto} eliminado en localStorage.`);
    mostrarCarrito()
}


async function mostrarCarrito() {


    let productosGuardados = JSON.parse(localStorage.getItem('productos')) || [];
    container.innerHTML = ""
    for (let i = 0; i < productosGuardados.length; i++) {
        const id = productosGuardados[i];
        const res = await fetch("api/get_category.php?id=" + id)
        data = await res.json()
        container.insertAdjacentHTML("afterbegin", `<div class="card-container">
    <div class="card-header">
        <h2 class="card-title">${data["nombre"]}</h2>
        <button class="card-close-button" onclick='eliminarProductoEnLocalStorage(${i})'>×</button>
    </div>
    <div class="card-content">
        <img src="https://via.placeholder.com/150" alt="Imagen del Producto" class="card-image">
        <div class="card-description">
            <p class="card-text">${data["descripcion"]}</p>
            <p class="card-price">${data["precio"]}$</p>
        </div>
    </div>
    <div class="card-footer">
        <button class="card-pay-button">Pagar</button>
    </div>
</div>`)
    }
}
mostrarCarrito()