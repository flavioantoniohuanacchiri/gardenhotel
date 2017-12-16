var id = '';
$(document).ready(function () {
    let section = located;
    WebItem.Listar(section);
    $('#section-form').submit( function (ev) {
        ev.preventDefault();
    });

    $('#banner-form').submit( function (ev) {
        ev.preventDefault();
        let file_data = $('#banner').prop('files')[0];
        let formData = new FormData($('#banner-form')[0]);
        formData.append('file', file_data);
        formData.append('section_id', section);

        if (id !== undefined && id !==  '') {
            WebItem.Guardar('web/' + id, formData, section);
        } else {
            formData.delete('_method');
            WebItem.Guardar('web/', formData, section);
        }
    })
});



$('#banner-modal').on('hidden.bs.modal', function () {
    $('#descripcion_en').val('');
    $('#descripcion').val('');
    $('#titulo').val('');
    $('#titulo_en').val('');
    $('#img').css('background-image', 'url("")');
    $('#banner').val('');
    id = '';
});

$(document).on('click', '.edit-item', function () {
    id = $(this).data('id');
    WebItem.ObtenerBanner(id);
});
$(document).on('click', '.delete-item', function () {
    let id_delete = $(this).data('id');
    WebItem.EliminarBanner(id_delete, located);
});