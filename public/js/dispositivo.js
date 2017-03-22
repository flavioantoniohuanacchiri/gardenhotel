var iddispositivo = 0;
Dispositivo = {
	listar : function(){
		$('#dispositivo-table').DataTable().destroy();
		$('#dispositivo-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'dispositivo?fecha='+$("#fechafiltro").val()+'&estado='+$("estadofiltro").val(),
        columns: [
            {data: 'id', name: 'id'},
            {data: 'codigo', name: 'codigo'},
            {data: 'grupo', name: 'grupo'},
            {data: 'estado', name: 'estado'},
            {data: 'updated_at', name: 'updated_at'},
             {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
        });
	},
	save : function(){
		
		if (iddispositivo <= 0){
			var url = "dispositivo";
			var form = new FormData($("#form-dispositivo")[0]);
		} else {
			var url = "dispositivo";
			var form = new FormData($("#form-dispositivo")[0]);
		}
		submit = $.ajax({url: url, method: "POST", dataType: 'json', data: form, processData: false, contentType: false});
		submit.success(function(datos){
			console.log(datos);
			if(datos.rst == 1 || datos.rst == "1") {
				Mensaje.confirmacion("Exito", datos.msj);
				Dispositivo.listar();
				$("#modal-dispositivo").modal("hide");
			} else {
				Mensaje.alerta(datos.msj);
			}
		});

		return false;
	}
};
$(document).ready(function(){
	$(".btn-search").click(listar);
	$("#form-dispositivo").submit(function(){
		save();
		return false;
	});
	Dispositivo.listar();
	$("#modal-dispositivo").on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		iddispositivo = button.data("id");
		console.log(iddispositivo);
		if (iddispositivo!="undefined" && iddispositivo!=undefined){
			$("#modal-dispositivo").modal("hide");
			iddispositivo = button.data("id");
			edit = $.get({url: "dispositivo/"+iddispositivo+"/edit", type:"GET", data: null});
			edit.success(function(datos){
				$("#form-dispositivo").append("<input type='hidden' name='iddispositivo' id='iddispositivo' value='"+iddispositivo+"'/>");
				dispositivo = datos.dispositivo;
				$("#codigo").val(dispositivo.codigo);
				$("#codigo").prop("disabled", true);
				$("#descripcion").val(dispositivo.descripcion);
				$("#idgrupo").val(dispositivo.id_grupo);
				$("#imagenoeste").val(dispositivo.urlimagen);
				$("#modal-dispositivo").modal("show");
			});
		}
	});

	$("#modal-dispositivo").on('hide.bs.modal', function (event) {
		iddispositivo = 0;
		$("#iddispositivo").remove();
		$("#codigo").removeAttr("disabled");
		$("#codigo").val("");
		$("#descripcion").val("");
		$("#idgrupo").val("");
		$("h4.modal-title").text("Nuevo Dispositivo");
	});
});

listar = function(){
	Dispositivo.listar();
};

save = function(){
	console.log("save");
	Dispositivo.save();
	return false;
}