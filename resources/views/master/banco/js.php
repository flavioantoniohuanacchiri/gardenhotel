<script>
        $(function () {
                $('#banco-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'banco',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'nombre', name: 'nombre'},
                                {data: 'direccion', name: 'direccion'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
        });
</script>