<script>
        $(function () {
                $('#producto-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'producto',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'codigo', name: 'codigo'},
                                {data: 'nombre', name: 'nombre'},
                                {data: 'pesobandeja', name: 'pesobandeja'},
                                {data: 'estado', name: 'estado'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
        });
</script>