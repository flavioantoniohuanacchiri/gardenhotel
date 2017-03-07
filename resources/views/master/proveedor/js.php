<script>
        $(function () {
                $('#proveedor-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'proveedor',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'ruc', name: 'ruc'},
                                {data: 'razonsocial', name: 'razonsocial'},
                                {data: 'direccion', name: 'direccion'},
                                {data: 'telefono', name: 'telefono'},
                                {data: 'estado', name: 'estado'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });    
        });
</script>