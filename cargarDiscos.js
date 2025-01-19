$document.ready(function(){
    $.ajax({
        url:"cargarDiscos.php",
        type:"GET",
        success:function(response){
            $('#mensaje').html(response.mensaje);
        },
        error:function(){
            $('#mensaje').html('Error al cargar los elementos.');
        }
    })
})