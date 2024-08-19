<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assect/layout.css">      
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    session_start();
    ?>
    <?php 
    require "lib/navbar.php"
    ?>
     <main>
        <div class="cerrar_carrito w-screen h-screen w-64 bg-black/20 hidden absolute right-0 z-10"></div>
        <div class="container_carrito h-screen w-90 p-2 bg-yellow-500 hidden absolute right-0 z-20">
            <div class="container">

            </div>
        </div>
        <button class="size-10 p-2 bg-red-500 absolute right-2 top-20 z-10" id="btn-carrito">
            <ion-icon name="cart-outline" class="size-full"></ion-icon>
        </button>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
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

        function mostrarCarrito() {
            let productosGuardados = JSON.parse(localStorage.getItem('productos')) || [];
            container.innerHTML = ""
            container.innerHTML = `<div class="bg-white shadow-md rounded-lg max-w-sm">
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-lg font-semibold">Nombre del Producto</h2>
            <button class="text-red-500 hover:text-red-700">×</button>
        </div>
        <div class="p-4 flex">
            <img src="https://via.placeholder.com/150" alt="Imagen del Producto" class="w-1/3 h-auto object-cover rounded-md">
            <div class="ml-4">
                <p class="text-gray-700">Descripción del producto. Aquí va una breve descripción del producto.</p>
                <p class="mt-2 text-xl font-bold text-gray-900">$Precio</p>
            </div>
        </div>
        <div class="p-4">
            <button class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Pagar</button>
        </div>
    </div>`
        }
        mostrarCarrito()
    </script>
    <?php 
       require "lib/footer.php"
    ?>
</body>
</html>