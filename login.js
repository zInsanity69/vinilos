$(document).ready(function () {
    $("#enviar").click(function (e) { 
        e.preventDefault();

        let correo = $("#correo").val();
        let pass = $("#pass").val();

        $.ajax({
            type: "POST",
            url: "./login.php",
            data: {
                email: correo,
                pass: pass
            },
            dataType: "json",
            success: function (response) {
                
                if (response.success){
                    // Redirigir a catalogo.php si la respuesta es exitosa
                    window.location.href = "./catalogo.php";
                }else{
                    $("error").val("contraseña o correo invalidos");
                }
            }
        });
    });
});
