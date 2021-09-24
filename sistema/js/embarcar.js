//TABLA_EMBARQUE
$(document).ready(function() {
  var f = new Date();
    var table = $('#tablaEmbarques').DataTable( {
      "oSearch": {"sSearch": f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate()},
      responsive: true,
      "pageLength": 25,
        "ajax": {
            "url": "./php/tablaEmbarquesPotosinos.php",
        },
        "columns": [
            { "data": "fecha"},
            { "data": "nombreCliente"},
            { "data": "UM"},
            { "data": "tipo"},
            { "data": "embarque"}
        ],
        "rowCallback": function( row, data, index ) {
          if (data.embarque == "SIN EMBARCAR") {
            $('td', row).css('background-color', '#ffcdd2');
          } else if (data.embarque == "EMBARCADO") {
            $('td', row).css('background-color', '#c8e6c9');
          }
        }
    });
});

$(document).ready(function() {
  var f = new Date();
    var table = $('#tablaEmbarquesPaquete').DataTable( {
      "oSearch": {"sSearch": f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate()},
      responsive: true,
      "pageLength": 25,
        "ajax": {
            "url": "./php/tablaEmbarquesPaquete.php",
        },
        "columns": [
            { "data": "fecha"},
            { "data": "nombreCliente"},
            { "data": "UM"},
            { "data": "tipo"},
            { "data": "embarque"}
        ],
        "rowCallback": function( row, data, index ) {
          if (data.embarque == "SIN EMBARCAR") {
            $('td', row).css('background-color', '#ffcdd2');
          } else if (data.embarque == "EMBARCADO") {
            $('td', row).css('background-color', '#c8e6c9');
          }
        }
    });
});
