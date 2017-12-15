$(document).ready(function () {
    console.log('sd');
    WebItem.Listar();
    $('#section-form').submit( function (ev) {
        ev.preventDefault();
        console.log('sd2');
    });

    $('#banner-form').submit( function (ev) {
        ev.preventDefault();
        let id = $('#id').val();
        let file_data = $('#banner').prop('files')[0];
        let formData = new FormData($('#banner-form')[0]);
        formData.append('file', file_data);

        if (id !== undefined && id !==  '') {
            WebItem.Guardar('web/' + id, formData);
        } else {
            WebItem.Guardar('web/', formData);
            formData.delete('method');
        }
    })
});


function LimpiarDatos(){

}

$('#myModal').on('hidden.bs.modal', function () {
    $('#id').val('');
    $('#descripcion_en').val('');
    $('#descripcion').val('');
    $('#titulo').val('');
    $('#titulo_en').val('');
});