function mostrarAltaPlaza(){
	$('#contenidoPrincipal').empty();
	$('#contenidoPrincipal').load("views/alta_plaza.html", function(){
		$("#idPlaza").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
	});

}

function cerrarVentana(){
	$("#mensajesInformacion").fadeOut("fast");
}

function validarVacios(){
	var x = $("#formaAltaPlaza")[0].length ; 
	var vacios = 0;
	for (var i= 0 ; i < x-2 ; i++){

		if($("#formaAltaPlaza")[0][i].value.trim() == ""){
			vacios++;
		}

	}

	if (vacios > 0) {
		return false;
	}
	else {
		return true;
	}

}


function mostarMensajeInformacion(mensaje){

	if(mensaje ==="exito"){
			$("#mensajesInformacion").css({backgroundColor : 'GREEN'});

	$("#mensajesInformacion").html("Plaza dada de alta con exito");
	$("#mensajesInformacion").fadeIn("slow");
	}

	else{
	$("#mensajesInformacion").css({backgroundColor : 'red'});
	$("#mensajesInformacion").html("Plaza Duplicada cambiar ID");
	$("#mensajesInformacion").fadeIn("slow");

	}

}


function enviarForma(){
	
	var vacios = validarVacios();
	if(vacios === true) {
		var formaPlaza = new FormData($('#formaAltaPlaza')[0]); 
		formaPlaza.append("metodo", "add");
		
		$.ajax({
			type: "POST",
			async:true,
			url:"controller/plaza_controller.php",
			
			success:function(data){

				if(data==='ok'){
				var x = $("#formaAltaPlaza")[0].length;
				mostarMensajeInformacion("exito");
				for(var i = 0 ; i < x-1 ; i++){
					$("#formaAltaPlaza")[0][i].value = "";
				}

				}

				else {
					mostarMensajeInformacion("error");
				}
				

				

			},
			error:function(request,status,error){
				alert(request.statusText);
			},
			data:formaPlaza,
			cache:false, 
			contentType:false,
			processData:false
		}
		);

	}

	else {
		alert("campos vacios");
	}

}

function mostrarPlazas(){

		$('#contenidoPrincipal').empty();
		var metodo= "get";
		var formaPlaza = new FormData();
		formaPlaza.append("metodo", "get");
		$.ajax({
			method: "POST",
			async:true,
			url:"controller/plaza_controller.php",
			
			success:function(data){

				var obj = jQuery.parseJSON( data );
				var dataControlador = '';
		
					for (var i = 0 ; i < obj.length ; i++){
						dataControlador = dataControlador + '<tr id='+obj[i].ID_PLAZA+'><td>'+obj[i].ID_PLAZA+'</td><td>'+obj[i].NOMBRE+'</td><td>'+obj[i].DESCRIPCION+'</td><td>'+obj[i].CIUDAD+'</td><td>'+obj[i].ESTADO+'</td><td><img class="action" src="assets/img/trash.png" onclick= eliminarPlaza('+obj[i].ID_PLAZA+');><img class="action" src="assets/img/edit.png" onclick= editarPlaza('+obj[i].ID_PLAZA+');></td></tr>';
						}
				var ht = '<table><thead><tr><th width="100">ID PLAZA</th><th width="150">NOMBRE PLAZA</th><th width="150">DESCRIPCION</th><th width="150">CIUDAD</th><th width="150">ESTADO</th><th width="150">Accion</th></tr> </thead><tbody>';		
			$('#contenidoPrincipal').append(ht+dataControlador);
							
			},
			error:function(request,status,error){
				alert(request.statusText);
			},
			data: formaPlaza,
			cache:false, 
			contentType:false,
			processData:false
		}
		);
}



function eliminarPlaza(id){

	

	var obj = jQuery.parseJSON('{"metodo":"eliminar" , "id":'+id+'}');


$.ajax({
			method: "POST",
			async:true,
			url:"controller/plaza_controller.php",
			
			success:function(data){
				$('tr[id='+id+']').fadeOut("SLOW", function(){
					$('tr[id='+id+']').remove();
				});

			},
			error:function(request,status,error){
				alert('b'+request.statusText+ ' ' + error);
			},
			data: {metodo :'eliminar', id : id},
			cache:false		}
		);

}


function editarPlaza(id){

    $("#dialog").dialog({autoOpen: false,   height: 'auto' ,   width: 500 });
    $("#dialog").dialog('open');
    $("#dialog").load("views/editar_plaza.html", function(){



    	$.ajax({
			method: "POST",
			async:true,
			url:"controller/plaza_controller.php",
			
			success:function(data){
				var jsonData = jQuery.parseJSON(data);
				$('#idPlaza').val(jsonData[0].ID_PLAZA);
				$("#nombrePlaza").val(jsonData[0].NOMBRE);
				$("#descripcionPlaza").val(jsonData[0].DESCRIPCION);
				$("#ciudadPlaza").val(jsonData[0].CIUDAD);
				$("select[name='estado']").val(jsonData[0].ESTADO);

			},
			error:function(request,status,error){
				alert('b'+request.statusText+ ' ' + error);
			},
			data: {metodo :'plazaPorID', id : id},
			cache:false		}
		);

	

		$("#idPlaza").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    		});
	});
}



function enviarEditar(){

		var formaEditar = new FormData($('#formaEditarPlaza')[0]); 
		formaEditar.append("metodo", "editar");	
		$.ajax({
			type: "POST",
			async:true,
			url:"controller/plaza_controller.php",
			
			success:function(data){
				 $("#dialog").dialog('close');
				 mostrarPlazas();	
			},
			error:function(request,status,error){
				alert(request.statusText);
			},
			data:formaEditar,
			cache:false, 
			contentType:false,
			processData:false
		}
		);

	

}