$(document).ready(inicializarEventos);

function inicializarEventos(){
    $("#cargarProducto").click(function (){
        // acciones a realizar cuando el usuario haga click
        cargarProducto();
    });

    $("#realizarVenta").click(function (){
        // acciones a realizar cuando el usuario haga click
        realizarVenta();
    });
}

function cargarProducto(){
    // var let son para declarar variables
    let codigo = $("#codigoProducto").val();
    let nombre = $("#nombreProducto").val();
    let precio = $("#precioProducto").val();
    let cantidad = $("#cantidadProducto").val();

    let registro="<tr>" +
    "<td>" + codigo + "</td>" +
    "<td>" + nombre + "</td>" +
    "<td>" + precio + "</td>" +
    "<td>" + cantidad + "</td>" +
    "<td>" + parseFloat(precio) * parseInt(cantidad) + "</td>" +
    "</tr>";

    $("#tablaVentas > tbody").append(registro);
}

function realizarVenta(){

    // Armando el array de datos con la tabla
    var datosTabla = [];
    $('#tablaVentas tbody tr').each(function () {
        var fila = [];
        $(this).find('td').each(function () {
            fila.push($(this).text());
        });
        datosTabla.push(fila);
    });

    // Concatenamos la base url con la ruta que nos permite el registro de venta
    let url_a=$("#baseUrl").val() + "realizarVenta";
    $.ajax({
        url:url_a, // hacia donde apunto esta petición
        type:"POST", // método de envío GET POST
        dataType: 'json', // enviamos en formato JSON
        data: {'tabla': datosTabla}, // data que enviamos a la ruta
        success:function(respuesta){
            if(respuesta.registro == 0){
                alert("Venta realizada");
                window.location.href = respuesta.redireccion;
            }
        }
     });
}