<script>
        $(function () {
                $('#sede-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'sede',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'codigo', name: 'codigo'},
                                {data: 'nombre', name: 'razonsocial'},
                                {data: 'direccion', name: 'direccion'},
                                {data: 'estado', name: 'estado'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });    
        });
</script>