const btn_carrito = document.getElementById("btn-carrito")
const total_precio = document.getElementById("total_precio")
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
}


async function mostrarCarrito() {


    let productosGuardados = JSON.parse(localStorage.getItem('productos')) || [];
    container.innerHTML = ""
    total_precio.innerHTML = 0
    for (let i = 0; i < productosGuardados.length; i++) {
        const id = productosGuardados[i];
        const res = await fetch("api/get_category.php?id=" + id)
        data = await res.json()

        let datos = {
            position: i,
            id,
            name: data["nombre"],
            price: data["precio"]
        }
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
            <button class="card-pay-button" onclick='pagar([${JSON.stringify(datos)}])'>Pagar</button>
        </div></div>`);

        let precio = parseInt(total_precio.innerHTML);
        total_precio.innerHTML = precio + data["precio"];
    }

}
mostrarCarrito()


// Función que recibe los datos de pago y los muestra en el modal
function showPaymentModal(paymentData) {
    const modal = document.getElementById('paymentModal');
    const paymentDetails = document.getElementById('paymentDetails');

    // Formatear y mostrar los detalles de pago en el modal
    paymentDetails.innerHTML = `
        <strong>Status:</strong> ${paymentData.status}<br>
        <strong>Payment ID:</strong> ${paymentData.payment_id}<br>
        <strong>Amount:</strong> ${paymentData.amount} ${paymentData.currency}<br>
        <strong>Payment Method:</strong> ${paymentData.payment_method}<br>
        <strong>Description:</strong> ${paymentData.description}<br>
        <strong>Paid At:</strong> ${paymentData.paid_at}
    `;

    // Mostrar el modal
    modal.style.display = 'block';
}

// Función para cerrar el modal
function closeModal() {
    const modal = document.getElementById('paymentModal');
    modal.style.display = 'none';
}

async function pagarTodo() {
    let productosGuardados = JSON.parse(localStorage.getItem('productos')) || [];
    let items = []
    for (let i = 0; i < productosGuardados.length; i++) {
        const id = productosGuardados[i];
        const res = await fetch("api/get_category.php?id=" + id)
        data = await res.json()

        let datos = {
            position: i,
            id,
            name: data["nombre"],
            price: data["precio"]
        }
        items.push(datos)
    }
    pagar(items)
    console.log(pagarTodo);
    
}

function pagar(datos) {
    if (login === 'false') {
        alert("No has iniciado sesion. \nporfavor inicia sesion para continuar")
        window.location.href = "login.php";
        return
    }

    // Configurar la solicitud POST
    fetch('api/PaymentSimulator.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ items: datos }) // Enviar los datos en formato JSON
    })
        .then(response => response.json()) // Parsear la respuesta JSON
        .then(data => {
            // Manejar la respuesta del servidor
            console.log('Respuesta del servidor:', data);
            // Llamada a la función para mostrar el modal con los datos de pago
            showPaymentModal(data);

            
            const reversedArr = datos.reverse();

            reversedArr.forEach(item => {
                let position = item["position"]
                eliminarProductoEnLocalStorage(position)
            });

            mostrarCarrito()


        })
        .catch(error => {
            // Manejar errores
            console.error('Error al realizar la solicitud:', error);
        });

}