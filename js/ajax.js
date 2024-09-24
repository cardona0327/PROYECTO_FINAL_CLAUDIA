function eliminarPro(){
    var valor = document.getElementById('id_producto').value;
    param = {
        "idProEliminar":valor
        
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
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
                    
            }else{
                document.getElementById('productos').innerHTML = respuesta;
            }
            
            
        },
        error: function(xhr,status,error){
            console.log(error);
        }


    })
}
  



  
    