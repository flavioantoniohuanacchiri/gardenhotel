$(document).ready(function () {
    let section = '';
    if (section_name === 'Header') {
        section = 1;
        $('.telefono').hide();
    } else {
        section = 2;
    }
    $('#section-form').submit(function (ev) {
        ev.preventDefault();
        llenarForm();

    });
    WebSection.ObtenerSeccion(section);

});

function llenarForm(){
    let formData = new FormData($('#section-form')[0]);
    let ubicacion = CKEDITOR.instances.ckeditor_ubicacion;
    let ubicacion_en = CKEDITOR.instances.ckeditor_ubicacion_en;
    let telefono = CKEDITOR.instances.ckeditor_telefono;
    let email = CKEDITOR.instances.ckeditor_email;
    ubicacion = ubicacion.getData();
    ubicacion_en = ubicacion_en.getData();
    telefono = telefono.getData();
    email = email.getData();
    let section = (section_name == 'Header')? 1: 2;
    formData.append('ubicacion', ubicacion);
    formData.append('ubicacion_en', ubicacion_en);
    formData.append('telefono', telefono);
    formData.append('email', email);
    formData.append('section', section);
    WebSection.Guardar('section/guardar', formData);
}