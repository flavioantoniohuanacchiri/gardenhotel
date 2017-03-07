var dataTablePerfilModuloColumn = [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
            ];

    getDropDownRequest('master/modulo', '#modulo-nombre', '', '');

    $(document).ready(function() {
        $('#addRowPerfilModuloTable').on( 'click', function () {
            selectedId = $('#modulo-nombre option:selected').val();
            selectedText = $('#modulo-nombre option:selected').text();
            $('#modulo-nombre option:selected').attr("disabled", true).prop("selected", false);

            insertRowDataTable (selectedId, selectedText);

            formatRowsDataTableToString( dataTablePerfilModulo.rows().data() );
        } );

        $('#perfil-modulo-table tbody').on( 'click', 'tr td .deleteRowTable', function () {
            var row = dataTablePerfilModulo.row( $(this).parents('tr') );
            var rowData = row.data();
            row.remove().draw();
            $('#modulo-nombre option[value= ' + rowData.id + ' ]').removeAttr("disabled");
            formatRowsDataTableToString( dataTablePerfilModulo.rows().data() );
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

        $('#modulo-data').val( JSON.stringify(jObject) );
    }

    function insertRowDataTable (selectedId, selectedText) {
        var atInsert = [];
        atInsert.id = selectedId;
        atInsert.nombre = selectedText;
        atInsert.action = '<button type="button" class="btn btn-xs btn-danger deleteRowTable"><i class="fa fa-trash"></i></button>';
        dataTablePerfilModulo.row.add( atInsert ).draw( false );
    }