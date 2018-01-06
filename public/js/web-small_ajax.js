$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var  WebSection = {

    Guardar: function (url, formData) {
        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function (data) {
                if (data.estado === 1) {
                    toastr.success(data.mensaje);
                } else {
                    toastr.error(data.mensaje);
                }
            },
            error: function(data){
                $('.loading').hide();
                $("#banner-modal").modal("hide");
            }
        });
    },

    ObtenerSeccion: function (section) {
        $.ajax({
            url: 'section/'+section,
            type: 'GET',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                let ubicacion = CKEDITOR.instances.ckeditor_ubicacion;
                let ubicacion_en = CKEDITOR.instances.ckeditor_ubicacion_en;
                let telefono = CKEDITOR.instances.ckeditor_telefono;
                let email = CKEDITOR.instances.ckeditor_email;
                ubicacion.setData(data.ubicacion);
                ubicacion_en.setData(data.ubicacion_en);
                telefono.setData(data.telefono);
                email.setData(data.email);

            },
            error: function(data){
            }
        });
    }
};