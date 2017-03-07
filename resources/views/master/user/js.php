<script>
    $(function () {
            $('#user-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'user',
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
            });    
    });
</script>
