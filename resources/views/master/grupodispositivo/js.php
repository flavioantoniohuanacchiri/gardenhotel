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

                $(".btn-agregar-dispositivo").click(function(e){
                        //element = $(this).parent().parent();
                        elementhtml = $(".contenedor-dispositivos .filadispositivo").html();
                        html = "<div class='col-md-12 col-sm-12 col-xs-12'>";
                        html+=elementhtml;
                        html+="</div>";
                        $(".contenedor-dispositivos").append(html);
                });
                $(".btn-eliminar-dispositivo").click(function(e){
                   filas = $(".contenedor-dispositivos .col-md-12.col-sm-12.col-xs-12");
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
                        console.log($("#jsongrupogpx").val());
                });
                $(".estadodispositivo").change(function(e){
                        fila = $(this).parent().parent().parent();
                        console.log(fila);
                        id = fila.attr("idelement");

                        var jsondispositivo = JSON.parse($("#jsondispositivo").val());
                        jsondispositivo[id].estado = $(this).val();
                        var data = JSON.stringify(jsondispositivo);
                        $("#jsondispositivo").val(data);
                });
                $("#grupodispositivogpx-table").DataTable().destroy();
                $("#dispositivogpx-table").DataTable().destroy();
                $("#grupodispositivogpx-table").DataTable({order: true, searching: false});
                $("#dispositivogpx-table").DataTable({order: true, searching: false});

                $(".masterDelete").click(function(e){
                id = $(this).data("id");
                url = $(this).data("url");
                fila = $(this);

                swal.queue([{
                              title: '¿Estás seguro de eliminarlo?',
                              text: "Este cambio no es reversible!",
                              type: 'warning',
                              showCancelButton: true,
                              confirmButtonText: 'Si deseo, eliminarlo!',
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              showLoaderOnConfirm: true
                            }]).then(function () {
                                eliminar(fila, url);
                            });
                return false;
                
             });

            function eliminar(fila, url) {
                switch(url) {
                    case "dispositivo":
                        console.log(fila);
                        fila = fila.parent().parent();
                        
                        id = fila.attr("idelement");
                        console.log(id);

                        var jsondispositivo = JSON.parse($("#jsondispositivo").val());
                        
                        var data = JSON.stringify(jsondispositivo);
                        $("#jsondispositivo").val(data);
                        fila.remove();
                        eliminarajax(url, id);
                        break;

                    case "grupodispositivogpx":
                        console.log(fila);
                        fila = fila.parent().parent();
                        
                        id = fila.attr("idelement");
                        console.log(id);

                        var jsondispositivo = JSON.parse($("#jsongrupogpx").val());
                        
                        var data = JSON.stringify(jsondispositivo);
                        $("#jsongrupogpx").val(data);
                        fila.remove();
                        eliminarajax(url, id);
                        break;
                }
            }

            function eliminarajax(url, id){
                $.ajax({
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                url: $("#urlpath").val()+'/'+url + '/' + id,
                success: function (data) {
                    console.log(data);
                        
                        if (data.rst == "2" || data.rst == 2){
                            Mensaje.alerta(data.msj);
                            return false;
                        }
                        timer = false;

                    swal(
                        'Eliminado!',
                        'El registro ha sido eliminado.',
                        'success'
                      );
                },
                error: function (data) {
                     console.log('Error:', data);
                    }
                });
            }
        });
</script>