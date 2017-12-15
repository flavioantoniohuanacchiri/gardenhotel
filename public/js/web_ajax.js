$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});
var  WebItem = {

    Listar: function () {
        let section = 3;
        console.log('listar');
        $.ajax({
            url         : 'web/listar',
            type        : 'GET',
            cache       : false,
            data    : {
                section: section
            },
            success : function(obj) {
                //$('#request').text(obj.request);
                //$('#response').text(obj.response);
                //$('#envioLegado').modal('show');
                console.log(obj);
            },
            error: function(){
                //$(".overlay,.loading-img").remove();
            }
        });
    },
    
    Guardar: function (url, formData) {
        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function (data) {
                $("#banner-modal").modal("hide");
            },
            error: function(){
                $("#banner-modal").modal("hide");
            },
        });
    },
    ObtenerBanner: function () {
        let id = $('#id').val();
        $.ajax({
            url: 'web/' + id,
            type: 'GET',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                let datos = data;
            },
            error: function(){
            },
        });
    }



};