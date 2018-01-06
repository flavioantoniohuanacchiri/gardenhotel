var id = '';
$(document).ready(function () {
    let section = located;
    WebItem.Listar(section);
    $('#section-form').submit( function (ev) {
        ev.preventDefault();
    });

    $('#banner-form').submit( function (ev) {
        ev.preventDefault();
        //
        let file_data = $('#banner').prop('files')[0];
        let formData = new FormData($('#banner-form')[0]);
        formData.append('file', file_data);
        formData.append('section_id', section);

        if ( $('#ckeditor_text')[0]  !== undefined &&  $('#ckeditor_text')[0]) {
            let descripcion = CKEDITOR.instances.ckeditor_text;
            let descripcion_en = CKEDITOR.instances.ckeditor_text_en;
            descripcion = descripcion.getData();
            descripcion_en = descripcion_en.getData();
            formData.append('descripcion', descripcion);
            formData.append('descripcion_en', descripcion_en);
        }


        if (id !== undefined && id !==  '') {
            WebItem.Guardar('web/' + id, formData, section);
        } else {
            formData.delete('_method');
            WebItem.Guardar('web', formData, section);
        }
    })
});

$('#banner-modal').on('hidden.bs.modal', function () {
    $('.modal-title').html('Crear Banner');
    $('#titulo').val('');
    $('#titulo_en').val('');
    $('#img').css('background-image', 'url("")');
    $('#orden').val(0);
    $('#banner').val('');
    id = '';
    if ( $('#ckeditor_text')[0]  !== undefined &&  $('#ckeditor_text')[0]) {

        let descripcion = CKEDITOR.instances.ckeditor_text;
        let descripcion_en = CKEDITOR.instances.ckeditor_text_en;
        descripcion.setData('');
        descripcion_en.setData('');
    } else {
        $('#descripcion_en').val('');
        $('#descripcion').val('');
    }

});

$(document).on('click', '.edit-item', function () {
    $('.modal-title').html('Editar Banner');
    id = $(this).data('id');
    WebItem.ObtenerBanner(id);
});
$(document).on('click', '.delete-item', function () {
    let id_delete = $(this).data('id');
    WebItem.EliminarBanner(id_delete, located);
});

$(document).on('click', '.cambiarestado-item', function () {
    let id_cambiar = $(this).data('id');
    WebItem.CambiarEstado(id_cambiar, located);
});