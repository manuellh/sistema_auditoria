console.log('Trabajadores Cargado...');
$("#btnGroup").css("display", "none");

$(document).ready(function() {

    var f = new Date();
    var table = $('#tablaEmpleados').DataTable( {
      "pageLength": 25,
        "ajax": {
            "url": "./php/tablaEmpleados.php",
        },
        "columns": [
            { "data": "numeroEmpleado"},
            { "data": "nombreEmpleado"},
            { "defaultContent":"<button class='verEmpleado btn btn-warning'><i class='fas fa-edit'></i></button>"}
        ]
    });
    getData('#tablaEmpleados, tbody',table);
});
var getData = function(tbody, table){
  //EXTRACCION DE DATOS A MODIFICAR
    $(tbody).on('click','button.verEmpleado',function(){
      var data = data;

      if (data = table.row( $(this).parents('li') ).data()) {
        console.log(data);
        $("#btnAddEmpleado").hide("fast");
        $("#btnGroup").show("fast");
        var idClienteEliminar = $('#idEmpleado').val(data.id);
        var numeroEmpleado = $('#numeroEmpleado').val(data.numeroEmpleado);
        var nombreEmpleado = $('#nombreEmpleado').val(data.nombreEmpleado);
      }else if (data = table.row( $(this).parents('tr') ).data()) {
        $("#btnAddEmpleado").hide("fast");
        $("#btnGroup").show("fast");
        var idClienteEliminar = $('#idEmpleado').val(data.id);
        var numeroEmpleado = $('#numeroEmpleado').val(data.numeroEmpleado);
        var nombreEmpleado = $('#nombreEmpleado').val(data.nombreEmpleado);
      }

    });
}
$("#btnCancelar").click(function(event) {
	   $("#formEmpleado")[0].reset();
     $('#btnGroup').hide("fast");
     $("#btnAddEmpleado").show("fast");
   });
