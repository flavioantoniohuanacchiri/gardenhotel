<script>
        $(function () {
                $('#modulo-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'modulo',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'nombre', name: 'nombre'},
                                {data: 'url', name: 'url'},
                                {data: 'parent', name: 'parent'},
                                {data: 'visible', name: 'visible'},
                                {data: 'estado', name: 'estado'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });    
        });
</script>