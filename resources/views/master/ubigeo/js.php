<script>
        $(function () {
                $('#ubigeo-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'ubigeo',
                        columns: [
                                {data: 'id', name: 'id'},
                                {data: 'codpto', name: 'codpto'},
                                {data: 'codprov', name: 'codprov'},
                                {data: 'coddist', name: 'coddist'},
                                {data: 'nombre', name: 'nombre'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });    
        });
</script>