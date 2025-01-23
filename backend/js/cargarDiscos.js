$(document).ready(function(){
    $.ajax({
        url:"./cargarDiscos.php",
        type:"GET",
        success:function(response){
            console.log(response)
            $('#vinylContainer').html(response);
        },
        error:function(){
            $('#mensaje').html('Error al cargar los elementos.');
        }
    })
})