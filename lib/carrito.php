<div id="paymentModal" class="modal">
    <div class="modal-content">
        <h2>Detalles del Pago</h2>
        <p id="paymentDetails"></p>
        <button class="close-btn" onclick="closeModal()">Cerrar</button>
    </div>
</div>

<div class="cerrar_carrito hidden"></div>
<div class="container_carrito hidden">
    <h2 class="title__carrito">Productos Guardados</h2>
    <div class="container">

    </div>
    <div class="pagar-todo">
        <button class="card-pay-button" onclick="pagarTodo()">Pagar Todo</button>
        <div class="mostrar_precio">Precio Total: $<span id="total_precio">12314</span></div>
    </div>
</div>
<button class="size-10 p-2 bg-red-500 absolute right-2 top-20 z-10" id="btn-carrito">
    <ion-icon name="cart-outline" class="size-full"></ion-icon>
</button>