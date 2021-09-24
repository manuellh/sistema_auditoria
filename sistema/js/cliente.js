//TABLA CLIENTE
$("#btnGroup").css("display", "none");
$(document).ready(function() {
    var table = $('#tablaCliente').DataTable( {
      "pageLength": 30,
        "ajax": {
            "url": "./php/tablaCliente.php",
        },
        "columns": [
            { "data": "numeroCliente"},
            { "data": "nombreCliente"},
            { "defaultContent":"<a href='#title'><button class='verCliente btn btn-warning'><i class='fas fa-edit'></i> Editar</button></a>"}
        ]
    });

getData('#tablaCliente, tbody',table);
});
var getData = function(tbody, table){
  //EXTRACCION DE DATOS A MODIFICAR
    $(tbody).on('click','button.verCliente',function(){
      var data = data;

      if (data = table.row( $(this).parents('li') ).data()) {
        console.log(data);
        $("#btnRegistrar").hide("fast");
        $("#btnGroup").show("fast");
        var idClienteEliminar = $('#idClienteDelete').val(data.id);
        var idCliente = $('#idClienteEdit').val(data.id);
        var numeroCliente = $('#idCliente').val(data.numeroCliente);
        var nombreCliente = $('#cliente').val(data.nombreCliente);
      }else if (data = table.row( $(this).parents('tr') ).data()) {
        $("#btnRegistrar").hide("fast");
        $("#btnGroup").show("fast");
        var idClienteEliminar = $('#idClienteDelete').val(data.id);
        var idCliente = $('#idClienteEdit').val(data.id);
        var numeroCliente = $('#idCliente').val(data.numeroCliente);
        var nombreCliente = $('#cliente').val(data.nombreCliente);
      }

    });

    //EXTRACCION DE DATOS A ELIMINAR
}

$("#btnCancelar").click(function(event) {
	   $("#formClientes")[0].reset();
     $("#btnRegistrar").show("fast");
     $('#btnGroup').hide("fast");
   });
