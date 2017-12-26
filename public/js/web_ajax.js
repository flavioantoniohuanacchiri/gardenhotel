$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var  WebItem = {
    Listar: function (section) {
        console.log(section);
        $.ajax({
            url         : 'web/listar',
            type        : 'GET',
            cache       : false,
            data    : {
                section: section
            },
            success : function(obj) {
                let table = $("#banner-table");
                table.DataTable().destroy();
                table.DataTable({
                    data: obj,
                    columns: [
                        { data: 'titulo', name:'btn-titulo'},
                        { data: 'titulo_en', name:'titulo_en'},
                        { data: 'descripcion', name:'descripcion' },
                        { data: 'descripcion_en', name:'descripcion_en' },
                        { data : function( row, type, val, meta) {
                            if (typeof row.id !== "undefined" && typeof row.id !== undefined) {
                                let estado_item = 'inactivo';
                                if (row.estado == 1) {
                                    estado_item = 'activo';
                                }
                                let html = '<div style="display: block; text-align:center"><button class="btn btn-success cambiarestado-item" data-id="'+row.id+'">'+ estado_item +'</button></div>';
                                return html;
                            }
                        }, name:'estado'},
                        { data : function( row, type, val, meta) {
                            if (typeof row.id !== "undefined" && typeof row.id !== undefined) {
                                let html = '<div style="display: block; text-align:center"><button class="btn btn-primary edit-item" data-toggle="modal" data-target="#banner-modal" data-id="'+row.id+'"><span class="glyphicon glyphicon-pencil"></span></button></div>';
                                return html;
                            }
                        }, name:'btn-edit'},
                        { data : function( row, type, val, meta) {
                            if (typeof row.id !== "undefined" && typeof row.id !== undefined) {
                                let html = '<div style="display: block; text-align:center"><button class="btn btn-danger delete-item" data-id="'+row.id+'"><span class="glyphicon glyphicon-remove"></span></button></div>';
                                return html;
                            }
                        }, name:'btn-edit'}
                    ],
                    autoWidth: true,
                    responsive: true
                });
                if (section === 5) {
                    let column_descripcion  = table.DataTable().column(2);
                    column_descripcion.visible( false);
                    let column_descripcion_en = table.DataTable().column(3);
                    column_descripcion_en.visible( false );
                }
            },
            error: function(){
                //$(".overlay,.loading-img").remove();
            }
        });
    },
    
    Guardar: function (url, formData, section) {
        console.log(section);
        console.log(url);
        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function (data) {
                $("#banner-modal").modal("hide");

                if (data.estado === 1) {
                    WebItem.Listar(section);
                    toastr.success(data.mensaje);
                } else {
                    toastr.error(data.mensaje);
                }
            },
            error: function(data){
                $("#banner-modal").modal("hide");
            }
        });
    },
    ObtenerBanner: function (id) {
        $.ajax({
            url: 'web/' + id,
            type: 'GET',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                $('#titulo').val(data.titulo);
                $('#titulo_en').val(data.titulo_en);
                $('#img').css('background-image', 'url(../'+ data.path_imagen + ')');
                $('#orden').val(data.orden);
                if ( $('#ckeditor_text')[0]  !== undefined &&  $('#ckeditor_text')[0]) {
                    let descripcion = CKEDITOR.instances.ckeditor_text;
                    let descripcion_en = CKEDITOR.instances.ckeditor_text_en;
                    descripcion.setData(data.descripcion);
                    descripcion_en.setData(data.descripcion_en);
                } else {
                    $('#descripcion_en').val(data.descripcion_en);
                    $('#descripcion').val(data.descripcion);
                }
            },
            error: function(){
            }
        });
    },
    
    EliminarBanner: function (id, section) {
        $.ajax({
            url: 'web/' + id,
            type: 'DELETE',
            contentType: false,
            cache: false,
            success: function (data) {
                WebItem.Listar(section);
                if (data.estado === 1) {
                    toastr.success(data.msj);
                } else {
                    toastr.error(data.msj);
                }
            },
            error: function(){
            }
        });
    },
    
    CambiarEstado: function (id, section) {
        $.ajax({
            url: 'web/cambiarestado/' + id,
            type: 'GET',
            contentType: false,
            cache: false,
            success: function (data) {
                WebItem.Listar(section);
                if (data.estado === 1) {
                    toastr.info(data.msj);
                } else {
                    toastr.error(data.msj);
                }
            },
            error: function(){
            }
        });
    }



};