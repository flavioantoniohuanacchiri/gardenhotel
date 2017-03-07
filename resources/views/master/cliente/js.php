<script>
        $(function () {
                $('#cliente-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'cliente',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'documento', name: 'documento'},
                                {data: 'nombre', name: 'nombre'},
                                {data: 'apellido', name: 'apellido'},
                                {data: 'direccion', name: 'direccion'},
                                {data: 'email', name: 'email'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
        });
</script>