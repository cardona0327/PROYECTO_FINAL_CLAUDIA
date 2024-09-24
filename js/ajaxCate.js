function eliminarCate(){
    var valor = document.getElementById('id_categoria').value;
    param = {
        "idCateEliminar":valor
        
    }

    $.ajax({
        data: param,
        url: 'ctroAdmi.php',
        dataType: 'html',
        method: 'get',
        success:function(respuesta){//función de respuesta
            if(respuesta===0){
                Swal.fire({
                    icon: "error",
                    title: "error",
                    text: "no se encontró",
                  }) 
            }else{
                document.getElementById('categorias').innerHTML = respuesta;
            }
            
            
        },
        error: function(xhr,status,error){
            console.log(error);
        }


    })
}