// Función para guardar el ID del producto en localStorage
function guardarProductoEnLocalStorage(idProducto) {
    // Obtener los productos guardados en localStorage
    let productosGuardados = JSON.parse(localStorage.getItem('productos')) || [];

    // Agregar el nuevo ID del producto a la lista
    productosGuardados.push(idProducto);

    // Guardar la lista actualizada en localStorage
    localStorage.setItem('productos', JSON.stringify(productosGuardados));

    console.log(`Producto con ID ${idProducto} guardado en localStorage.`);
}
