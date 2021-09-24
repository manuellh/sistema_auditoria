console.log('tabla paqueteria cargada...');
//TABLA_EMBARQUE
$(document).ready(function() {
    var f = new Date();
    var table = $('#tablaPaqueteria').DataTable( {
      "oSearch": {"sSearch": f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate()},
      "pageLength": 25,
        "ajax": {
            "url": "./php/tablaPaqueteria.php",
        },
        "columns": [
            { "data": "fecha"},
            { "data": "numCliente"},
            { "data": "nombreCliente"},
            { "data": "referencia"},
            { "data": "UM"},
            { "data": "tipo"},
            { "data": "entrega"},
            { "data": "embarque"}
        ]
    });
});
