$(".solo-enteros").numeric(false, 
  function() { 
    this.notify("Solo Enteros", "danger");this.value = ""; this.focus(); 
});
$(".decimales").numeric();


Mensaje = {
  alerta : function(mensaje) {
    swal(
      'Oops...',
      mensaje,
      'error'
    )
  },
  confirmacion: function(titulo, mensaje) {
  	swal(
		titulo,
		mensaje,
		'success'
	)
  },
  info: function (titulo, mensaje) {
    swal({
      title: titulo,
      type: 'info',
      html: mensaje
    })
  }
}
$("#id_sede").change(function(e){

});
$("#zonalfiltro").change(function(e){
  if ($(this).val() != "") {
    var clientesporzona = clientesjson[$(this).val()];
  } else {
    var clientesporzona = [];
    k = 0;
    for(var i in clientesjson) {
      for (var j in clientesjson[i]) {
        clientesporzona[k] = clientesjson[i][j];
        k++;
      }
    }
  }
  
  console.log(clientesporzona);
  html ="";
  if (clientesporzona.length > 0) {
    html+="<option value=''>Todos</option>";
    for(var i in clientesporzona) {
      html+="<option value='"+clientesporzona[i].id+"'>"+clientesporzona[i].nombre+"</option>";
    }
  }

  $('select#clientefiltro').selectpicker();
  $('select#clientefiltro').html(html);
  $('select#clientefiltro').selectpicker('refresh');
});