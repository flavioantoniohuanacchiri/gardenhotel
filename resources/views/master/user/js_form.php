<script>
   /* var dataTableUserPerfilColumn = [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
            ];

    getDropDownRequest('<?php echo url('master/perfil') ?>', '#perfil-nombre', '', '');

    $(document).ready(function() {
        $('#addRowUserPerfilTable').on( 'click', function () {
            selectedPerfilId = $('#perfil-nombre option:selected').val();
            selectedPerfilText = $('#perfil-nombre option:selected').text();
            $('#perfil-nombre option:selected').attr("disabled", true).prop("selected", false);

            insertRowDataTable (selectedPerfilId, selectedPerfilText);

            formatRowsDataTableToString( dataTableUserPerfil.rows().data() );
        } );

        $('#user-perfil-table tbody').on( 'click', 'tr td .deleteRowTable', function () {
            var row = dataTableUserPerfil.row( $(this).parents('tr') );
            var rowData = row.data();
            row.remove().draw();
            console.log('deletting...');
            console.log(rowData.id);
            $('#perfil-nombre option[value= ' + rowData.id + ' ]').removeAttr("disabled");
            formatRowsDataTableToString( dataTableUserPerfil.rows().data() );
        } );
    } );

    function formatRowsDataTableToString (data) {
        var jObject = {};
        for(i in data)
        {
            if(!isNaN(i)){
                jObject[i] = {id:data[i].id, nombre:data[i].perfil};
            }
        }
        console.log(jObject);

        $('#perfil-data').val( JSON.stringify(jObject) );
    }

    function insertRowDataTable (selectedPerfilId, selectedPerfilText) {
        var atInsert = [];
        atInsert.id = selectedPerfilId;
        atInsert.nombre = selectedPerfilText;
        atInsert.action = '<button type="button" class="btn btn-xs btn-danger deleteRowTable"><i class="fa fa-trash"></i></button>';
        dataTableUserPerfil.row.add( atInsert ).draw( false );
    }*/
</script>