<script>
        $(function () {
                $('#perfil-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'perfil',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'nombre', name: 'razonsocial'},
                                {data: 'estado', name: 'estado'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });    
        });
</script>