<script>
        $(function () {
                $('#dispositivo-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'dispositivo',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'codigo', name: 'codigo'},
                                {data: 'grupo', name: 'grupo'},
                                {data: 'estado', name: 'estado'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
        });
</script>