document.addEventListener("DOMContentLoaded", function () {
    const botones = document.querySelectorAll(".btn-agregar-carrito");

    botones.forEach(boton => {
        boton.addEventListener("click", function () {
            // Obtener la información del producto desde los atributos 'data-*' del botón clickeado
            const producto = {
                id: this.dataset.id,
                nombre: this.dataset.nombre,
                precio: parseFloat(this.dataset.precio),
                imagen: this.dataset.imagen,
                cantidad: 1
            };

            // Obtener el carrito desde localStorage o iniciar uno vacío si no existe
            let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

            // Verificar si el producto ya existe en el carrito
            const existe = carrito.find(p => p.id === producto.id);
            if (existe) {
                // Si el producto existe, aumentamos la cantidad
                existe.cantidad += 1;
            } else {
                // Si no existe, lo agregamos al carrito como nuevo producto
                carrito.push(producto);
            }

            // Guardar el carrito actualizado en localStorage
            localStorage.setItem("carrito", JSON.stringify(carrito));

            // Mostrar mensaje de éxito
            alert("Producto añadido al carrito.");
        });
    });
});
