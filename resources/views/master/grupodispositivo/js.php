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

                $(".btn-agregar").click(function(e){
                        //element = $(this).parent().parent();
                        elementhtml = $(".contenedor-archivos-gpx .fila").html();
                        html = "<div class='col-md-12 col-sm-12 col-xs-12'>";
                        html+=elementhtml;
                        html+="</div>";
                        $(".contenedor-archivos-gpx").append(html);
                });
                $(".btn-eliminar").click(function(e){
                   filas = $(".contenedor-archivos-gpx .col-md-12.col-sm-12.col-xs-12");
                   i = 0;
                   filas.each(function(index, data){
                        console.log(index);
                        console.log(data);
                        i++;
                   });
                   if (i > 1) {
                        filas[i-1].remove();
                   }
                });
                $("input[type=color]").change(function(e){
                        fila = $(this).parent().parent();
                        id = fila.attr("idelement");
                        var jsongpx = JSON.parse($("#jsongrupogpx").val());
                        jsongpx[id].color = $(this).val();
                        var data = JSON.stringify(jsongpx);
                        $("#jsongrupogpx").val(data);
                });
                $(".estadogpx").change(function(e){
                        fila = $(this).parent().parent().parent();
                        console.log(fila);
                        id = fila.attr("idelement");

                        var jsongpx = JSON.parse($("#jsongrupogpx").val());
                        jsongpx[id].estado = $(this).val();
                        var data = JSON.stringify(jsongpx);
                        $("#jsongrupogpx").val(data);
                });
                $("#grupodispositivogpx-table").DataTable({order: true, searching: false});
        });
</script>