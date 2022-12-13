$(document).ready( function () {
    // $('#table_id').DataTable();
    // feather.replace();

    $('#table_id').dataTable( {
        "drawCallback": function( settings ) {
            feather.replace();
        }
    } );
    
} );

$(document).ready( function () {
    // $('#table_id').DataTable();
    // feather.replace();

    $('#table_id_2').dataTable( {
        "drawCallback": function( settings ) {
            feather.replace();
        }
    } );
    
} );

CKEDITOR.replace( 'ckeditor', {
    customConfig: '/ckeditor_settings/config.js'
} );