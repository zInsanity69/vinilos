$(document).ready(function () {
    // Función para obtener los vinilos
    function obtenerVinilos() {
        $.ajax({
            type: "GET",
            url: "./backend/getvinilos.php",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    // Limpiar los resultados previos
                    $(".listado_vinilos").empty();

                    // Mostrar los vinilos en la página
                    response.vinilos.forEach(function (vinilo) {
                        var card = `
                            <div class="col-md-4 mb-4 card_vinilo" data-id="${vinilo.id}" data-publicacion="${vinilo.publicacion}">
                                <div class="card">
                                    <img src="${vinilo.portada}" alt="${vinilo.nombre}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">${vinilo.nombre}</h5>
                                        <p class="card-text"><strong>Artista:</strong> ${vinilo.artista}</p>
                                        <p class="card-text"><strong>Descripción:</strong> ${vinilo.descripcion}</p>
                                        <p class="card-text"><strong>Precio:</strong> ${vinilo.precio}</p>
                                        <p class="card-text"><strong>Fecha:</strong> ${vinilo.fecha}</p>
                                        <div class="form-check">
                                            <input class="form-check-input publicacion" type="checkbox" ${vinilo.publicacion == 1 ? "checked" : ""} data-id="${vinilo.id}">
                                            <label class="form-check-label" for="publicacion">
                                                Publicado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        $(".listado_vinilos").append(card);
                    });

                    // Agregar evento para manejar el cambio de estado del checkbox
                    $(".publicacion").change(function () {
                        var viniloId = $(this).data("id");
                        var nuevoEstado = $(this).prop("checked") ? 1 : 0; // 1 para marcado, 0 para desmarcado

                        // Enviar la actualización al servidor
                        $.ajax({
                            type: "POST",
                            url: "./backend/actualizarpublicacion.php",
                            data: {
                                id: viniloId,
                                estado: nuevoEstado
                            },
                            success: function (response) {
                                console.log(response);  // Verifica la respuesta completa
                                if (response.success) {
                                    console.log("Estado actualizado correctamente");
                                    obtenerVinilos();  // Refrescar el grid de vinilos después de la actualización
                                } else {
                                    alert("Error al actualizar el estado");
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error('Error en la solicitud AJAX:', status, error);
                                alert('Hubo un problema al actualizar el estado');
                            }
                        });
                    });

                } else {
                    alert(response.message || 'Error al obtener los vinilos');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error en la solicitud AJAX:', status, error);
                alert('Hubo un problema al obtener los vinilos');
            }
        });
    }

    // Llamar la función para obtener los vinilos al cargar la página
    obtenerVinilos();

    // Filtrar vinilos por el nombre
    $("#buscar").on("input", function () {
        var searchTerm = $(this).val().toLowerCase();
        $(".card_vinilo").each(function () {
            var nombre = $(this).find(".card-title").text().toLowerCase();
            if (nombre.indexOf(searchTerm) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });

    // Filtrar por checkbox "Mostrar todos"
    $("#filtroMostrar").change(function () {
        if ($(this).is(":checked")) {
            // Solo mostrar los vinilos con 'publicacion' activado
            $(".card_vinilo").each(function () {
                var publicacion = $(this).data("publicacion");

                if (publicacion == 0) {
                    $(this).hide();  // Ocultar los vinilos no publicados
                } else {
                    $(this).show();  // Mostrar los vinilos publicados
                }
            });
        } else {
            // Mostrar todos los vinilos cuando el checkbox no está marcado
            $(".card_vinilo").show();
        }
    });
});
