<script>
        $(function () {
                $('#chofer-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'chofer',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'nombre', name: 'nombre'},
                                {data: 'apellido', name: 'apellido'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
        });
</script>