<script>
        $(function () {
                $('#vehiculo-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'vehiculo',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'vehiculo', name: 'vehiculo'},
                                {data: 'placa', name: 'placa'},
                                {data: 'descripcion', name: 'descripcion'},
                                {data: 'estado', name: 'estado'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });    
        });
</script>