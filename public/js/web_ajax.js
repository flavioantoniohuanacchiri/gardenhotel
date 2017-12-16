$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var  WebItem = {
    Listar: function (section) {
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
                        { data: 'titulo' },
                        { data: 'titulo_en' },
                        { data: 'descripcion' },
                        { data: 'descripcion_en' },
                        {data : function( row, type, val, meta) {
                            if (typeof row.id !== "undefined" && typeof row.id !== undefined) {
                                let html = '<button class="btn btn-primary edit-item" data-toggle="modal" data-target="#banner-modal" data-id="'+row.id+'"><span class="glyphicon glyphicon-pencil"></span></button>';
                                return html;
                            }
                        }, name:'btn-edit'},
                        {data : function( row, type, val, meta) {
                            if (typeof row.id !== "undefined" && typeof row.id !== undefined) {
                                let html = '<button class="btn btn-danger delete-item" data-toggle="modal" data-id="'+row.id+'"><span class="glyphicon glyphicon-remove"></span></button>';
                                return html;
                            }
                        }, name:'btn-edit'},
                    ]
                });
                //$('#request').text(obj.request);
                //$('#response').text(obj.response);
                //$('#envioLegado').modal('show');
            },
            error: function(){
                //$(".overlay,.loading-img").remove();
            }
        });
    },
    
    Guardar: function (url, formData, section) {
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
                WebItem.Listar(section);
            },
            error: function(){
                $("#banner-modal").modal("hide");
            },
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
                $('#descripcion_en').val(data.descripcion_en);
                $('#descripcion').val(data.descripcion);
                $('#titulo').val(data.titulo);
                $('#titulo_en').val(data.titulo_en);
                $('#img').css('background-image', 'url(' + data.path_imagen + ')');
            },
            error: function(){
            },
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
            },
            error: function(){
            },
        });
    }



};