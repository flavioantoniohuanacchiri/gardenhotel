<script>
        $(function () {
                $('#sede-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'zonal',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'codigo', name: 'codigo'},
                                {data: 'nombre', name: 'razonsocial'},
                                {data: 'sede', name: 'sede'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'updated_at', name: 'updated_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });    
        });
</script>