console.log('autocomplete listo');
$( "#idCliente").autocomplete({
    source: function( request, response ) {

        $.ajax({
            url: "./php/autocomplete.php",
            type: 'post',
            dataType: "json",
            data: {
                search: request.term
            },
            success: function( data ) {
                response( data );
            }
        });
    },
    select: function (event, ui) {
        $('#idCliente').val(ui.item.label); // display the selected text
        $('#cliente').val(ui.item.value); // save selected id to input
        $('#id').val(ui.item.valueId); // save selected id to input
        return false;
    }
});

$( "#empaque").autocomplete({
    source: function( request, response ) {

        $.ajax({
            url: "./php/autocomplete.php",
            type: 'post',
            dataType: "json",
            data: {
                searchEmpaque: request.term
            },
            success: function( data ) {
                response( data );
            }
        });
    },
    select: function (event, ui) {
        $('#empaque').val(ui.item.label); // display the selected text
        $('#idempaque').val(ui.item.value); // save selected id to input
        return false;
    }
});

$( "#UM").autocomplete({
    source: function( request, response ) {

        $.ajax({
            url: "./php/autocomplete.php",
            type: 'post',
            dataType: "json",
            data: {
                searchUM: request.term
            },
            success: function( data ) {
                response( data );
            }
        });
    },
    select: function (event, ui) {
        $('#UM').val(ui.item.label); // display the selected text
        $('#idPaquete').val(ui.item.value); // save selected id to input
        return false;
    }
});
