$(function() {

    if ( data_node = $('#realtime-data-node').length == 1) {

        var data_node  = $('#realtime-data-node');
        $.ajax({
            url: data_node.data('href')

        }).done(function( data ) {
            $('#realtime-data-node').html(data);
        });
    }
});