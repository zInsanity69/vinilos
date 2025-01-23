
    $(document).ready(function () {
        // Función para alternar el menú lateral
        $('.menu-toggle').click(function () {
            $('#menuLateral').toggleClass('active'); // Activa/desactiva la clase 'active'
    
            if ($('#menuLateral').hasClass('active')) {
                $('.menu-toggle').hide(); // Oculta el botón cuando el menú está abierto
            } else {
                $('.menu-toggle').show(); // Muestra el botón cuando el menú está cerrado
            }
        });
    
        // Cierra el menú cuando se hace clic fuera de él
        $(document).click(function (event) {
            if (!$(event.target).closest('#menuLateral').length &&
                !$(event.target).closest('.menu-toggle').length &&
                $('#menuLateral').hasClass('active')) {
                $('#menuLateral').removeClass('active');
                $('.menu-toggle').show(); // Muestra el botón si el menú se cierra
            }
        });
    
        // Agrega desplazamiento suave y cierra el menú al hacer clic en un enlace
        $('.menu-links a').click(function (event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace
            var targetId = $(this).attr('href'); // Obtiene el destino
            var targetElement = $(targetId);
    
            $('html, body').animate({
                scrollTop: targetElement.offset().top
            }, 600); // Desplazamiento suave
    
            // Cierra el menú si está activo
            if ($('#menuLateral').hasClass('active')) {
                $('#menuLateral').removeClass('active');
                $('.menu-toggle').show(); // Muestra el botón si el menú se cierra
            }
        });
        $('.acordeon-toggle').click(function () {
        var acordeon = $(this).prev('.acordeon-contenido'); // Encuentra el contenido principal
        var contenidoAdicional = acordeon.find('.acordeon-mas'); // Encuentra el contenido adicional

        // Alterna la visibilidad del contenido adicional
        contenidoAdicional.slideToggle();

        // Cambia el texto de "Leer más" a "Leer menos" y viceversa
        if ($(this).text() === 'Leer más') {
            $(this).text('Leer menos');
        } else {
            $(this).text('Leer más');
        }
    });
    document.querySelectorAll('.acordeon-toggle').forEach(function (toggle) {
    toggle.addEventListener('click', function () {
        const acordeonMas = this.previousElementSibling;
        if (acordeonMas.style.display === 'block') {
            acordeonMas.style.display = 'none';
            this.textContent = 'Leer más';
        } else {
            acordeonMas.style.display = 'block';
            this.textContent = 'Leer menos';
        }
    });
});
    });