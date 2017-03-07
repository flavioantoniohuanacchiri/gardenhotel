<script>
        $(function () {
                $('#granja-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'granja',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'nombre', name: 'nombre'},
                                {data: 'codigo', name: 'codigo'},
                                {data: 'direccion', name: 'direccion'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
        });
</script>