// 
function likear(element) {
    var valor = $(element).data('id_producto');
    var param = {
        "idProducto": valor
    };

    $.ajax({
        data: param,
        url: "../usuarios/ctroUser.php?like=true",
        dataType: "text",
        method: "post",
        success: function(respuesta) {
            console.log("Respuesta del servidor: ", respuesta);

            if (respuesta) {
                // Actualizar la clase del icono
                $(element).toggleClass('fas far liked');
                
                // Extraer la nueva cantidad de likes de la respuesta
                var newLikes = parseInt(respuesta.trim(), 10);
                console.log("Nueva cantidad de likes: ", newLikes);

                // Actualizar la cantidad de likes en el DOM
                $(element).closest('.producto').find('.producto-likes').text('Likes: ' + newLikes);
            } else {
                console.log("Error al procesar el like.");
            }
        },
        error: function(status, xhr, error) {
            console.log("Error: " + error);
        }
    });
}



// function likear(element) {
//     var valor = $(element).data('id_producto');
//     var param = {
//        "idProducto": valor
//     };

//     $.ajax({
//         data: param,
//         url: "../usuarios/ctroUser.php?like=true",
//         dataType: "html",
//         method: "post",
//         success: function(respuesta){
//             console.log(respuesta);
//         },
//         error: function(status, xhr, error){
//             console.log("eror: "+error);
//         }
//     });
// }


// function likear(element) {
//     var valor = $(element).data('id_producto');
//     var param = {
//        "idProducto": valor
//     };

//     $.ajax({
//         data: param,
//         url: "../usuarios/ctroUser.php?like=true",
//         dataType: "html",
//         method: "post",
//         success: function(respuesta){
//             console.log(respuesta);
//         },
//         error: function(status, xhr, error){
//             console.log("eror: "+error);
//         }
//     });
// }






    // function likear(element) {
    //     var valor = $(element).data('id_producto');
    //     var param = {
    //         "idProducto": valor
    //     };
    
    //     $.ajax({
    //         data: param,
    //         url: "../usuarios/ctroUser.php?like=true",
    //         dataType: "html",
    //         method: "post",
    //         success: function(respuesta){
    //             if (respuesta == 1) {
    //                 $(element).toggleClass('liked');
    //             } else {
    //                 console.log("Error al procesar la solicitud de like.");
    //             }
    //         },
    //         error: function(status, xhr, error){
    //             console.log("Error: " + error);
    //         }
    //     });
    // }










// function likear(){
//     var valor = $(this).data('id_producto');
//     var param = {
//        "idProducto": valor
//     }

//     $.ajax({
//         data: param,
//         url: "../admi/ctroAdmi.php?like=true",
//         dataType : "html",
//         method: "post",
//         success: function(respuesta){
//             console.log(respuesta);
            
//         },
//         error: function(status,xhr,error){
//             console.log(error);
//         }
//     })
// }

