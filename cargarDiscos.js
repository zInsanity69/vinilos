$document.ready(function(){
    $.ajax({
        url:"cargarDiscos.php",
        type:"get",
        data:{nombre: Nombre,descripcion: Descripcion,precio: Precio,fecha: Fecha},
        dataType:"json",
        success:function(response){
            $('#mensaje').html(response.mensaje);
        },
        error:function(){
            $('#mensaje').html('Error al cargar los elementos.');
        }
    })
})