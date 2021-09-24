console.log("js cargado...");
$("#btnGroup").css("display", "none");
$("#datosIncidencia").css("display", "none");
//TABLA_PLANTAS
$(document).ready(function() {

    var f = new Date();
    var table = $('#tablaAuditoria').DataTable( {
      "oSearch": {"sSearch": f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate()},
      "pageLength": 25,
        "ajax": {
            "url": "./php/tablaAuditoria.php",
        },
        "columns": [
            { "data": "fecha"},
            { "data": "numCliente"},
            { "data": "nombreCliente"},
            { "data": "referencia"},
            { "data": "UM"},
            { "data": "entrega"},
            { "data": "estatus"},
            { "data": "comentarios"},
            { "data": "pieza"},
            { "data": "empaco"},
            { "data": "surtio"},
            { "defaultContent":"<button class='verAuditoria btn btn-warning'><i class='fas fa-edit'></i></button>"}
        ],
        "rowCallback": function( row, data, index ) {
          if (data.estatus == "ERROR") {
            $('td', row).css('background-color', '#ffcdd2');
          } else if (data.estatus == "AUDITADO") {
            $('td', row).css('background-color', '#c8e6c9');
          }
        },
        dom: 'Bfrtip',
        buttons: [
                  {
                    extend: 'copyHtml5',
                    text: '<button type="button" class="btn btn-success"><i class="fas fa-copy fa-2x text-green"></i> Copiar datos</button>',
                    titleAttr: 'Copiar datos'
                  },
               ]
    });
    getData('#tablaAuditoria, tbody',table);
});
var getData = function(tbody, table){
  //EXTRACCION DE DATOS A MODIFICAR
    $(tbody).on('click','button.verAuditoria',function(){
        $("#btnAuditar").hide("fast");
  			$('#btnGroup').show("fast");
        $("#datosIncidencia").show("fast");
        var data = table.row( $(this).parents('li') ).data();
        var estatus = $('#estatus').val(data.estatus);
        var comentarios = $('#comentarios').val(data.comentarios);
        var pieza = $('#piezas').val(data.pieza);
        var empaco = $('#empaco').val(data.empaco);
        var surtio = $('#surtio').val(data.surtio);
        var um = $('#UM').val(data.UM);
    });
}

$("#btnCancelar").click(function(event) {
	   $("#formAuditar")[0].reset();
     $("#btnAuditar").show("fast");
     $('#btnGroup').hide("fast");
     $("#datosIncidencia").hide("fast");
   });

   $(document).ready(function () {
     var error = "ERROR";
     var correcto = "AUDITADO";
                $("#estatus").change(function () {
                    var selectedVal = $("#estatus option:selected").val();
                    console.log(selectedVal);

                    if (selectedVal == error) {
                      $("#datosIncidencia").show("fast");
                    }else if (selectedVal == correcto) {
                      $("#datosIncidencia").hide("fast");
                    }

                });
    });
