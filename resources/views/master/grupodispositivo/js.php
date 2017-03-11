<script>
        $(function () {
                $('#grupodispositivo-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'grupodispositivo',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'nombre', name: 'nombre'},
                                {data: 'descripcion', name: 'direccion'},
                                {data: 'estado', name: 'estado'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
        });
</script>