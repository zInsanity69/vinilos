$(document).ready(function () {
    // Manejar el evento de envío del formulario
    $("#form-login").submit(function (e) {
        e.preventDefault(); // Evitar el envío tradicional del formulario

        // Obtener los datos del formulario
        let email = $("#email").val().trim();
        let pass = $("#pass").val().trim();

        // Validar que los campos no estén vacíos
        if (email === "" || pass === "") {
            mostrarAlerta("Todos los campos son obligatorios", "danger");
            return;
        }

        // Enviar los datos al servidor usando AJAX
        $.ajax({
            type: "POST",
            url: "./login.php",
            data: { email: email, pass: pass },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    // Redirigir según el rol
                    if (response.rol == 1) {
                        window.location.href = "./catalogo.php";
                    } else if (response.rol == 2) {
                        window.location.href = "./tienda.php";
                    }
                } else {
                    // Mostrar mensaje de error
                    mostrarAlerta(response.error || "Correo o contraseña incorrectos", "danger");
                }
            },
            error: function () {
                mostrarAlerta("Error en el servidor. Inténtalo más tarde.", "danger");
            }
        });
    });

    // Función para mostrar alertas dinámicas
    function mostrarAlerta(mensaje, tipo) {
        const alerta = $("#alerta");
        alerta
            .removeClass("d-none alert-danger alert-success")
            .addClass(`alert-${tipo}`)
            .text(mensaje);
    }
});
