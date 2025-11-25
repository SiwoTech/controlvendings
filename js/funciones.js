

function agregardatos(id,name,master,ubica){

	cadena="id=" + id +
			"&name=" + name + 
			"&master=" + master +
			"&ubica=" + ubica;
			


	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('../componentes/tabla.php');
				 $('#buscador').load('componentes/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo al guardar :(");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#idpersona').val(d[0]);
	$('#afiliadou').val(d[1]);
	$('#devnameu').val(d[2]);
	$('#devidu').val(d[3]);
	$('#devtypeu').val(d[4]);
	$('#devposu').val(d[5]);
	
}

function actualizaDatos(){

	id=$('#idpersona').val();
	afiliado=$('#afiliadou').val();
	devname=$('#devnameu').val();
	devid=$('#devidu').val();
	devtype=$('#devtypeu').val();
	devpos=$('#devposu').val();



	cadena="id=" + id +
	"&afiliado=" + afiliado +
	"&devname=" + devname + 
	"&devid=" + devid +
	"&devtype=" + devtype +
	"&devpos=" + devpos ;


	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Cerrar Dispositivo', '¿Esta seguro de Cerrar valvula del dispositivo?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function preguntarSiNo2(id){
	
	alertify.confirm('Ubicación Dispositivo', '¿Desea Actualizar la Ubicación del Dispositivo?', 
					function(){ eliminarDatos2(id) }
                , function(){ alertify.error('Se cancelo')});
}                


function preguntarSiNo3(id){
	
	alertify.confirm('Abrir Dispositivo', '¿Esta seguro de Abrir valvula del dispositivo?', 
					function(){ eliminarDatos3(id) }
                , function(){ alertify.error('Se cancelo')});
}


function preguntarSiNo4(id){
	
	alertify.confirm('Obtener Volúmen', '¿Quieres obtener la última lectura de volúmen?', 
					function(){ eliminarDatos4(id) }
                , function(){ alertify.error('Se cancelo')});
}
function preguntarSiNo5(id){
	
	alertify.confirm('Eliminar Dispositivo', '¿Esta seguro de Eliminar el dispositivo?', 
					function(){ eliminarDatos5(id) }
                , function(){ alertify.error('Se cancelo')});
}

function preguntarSiNo6(id){
	
	alertify.confirm('Concluir Mantenimiento', '¿Confirmar que se realizo mantenimiento?', 
					function(){ eliminarDatos6(id) }
                , function(){ alertify.error('Se cancelo')});
}


function eliminarDatos(id){

	cadena="id=" + id;
	
		$.ajax({
			type:"POST",
			url:"php/cerrar.php",
			data:cadena,
			success:function(r){
				if(r!=0){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Se envio instruccion de cerrar!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}

function eliminarDatos2(id){

	cadena="id=" + id;
		$.ajax({
			type:"POST",
			url:"php/ubicacion.php",
			data:cadena,
			success:function(r){
				if(r!=0){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Ubicación Actualizada");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
	location.reload();	
}		
function eliminarDatos3(id){

	cadena="id=" + id;
		$.ajax({
			type:"POST",
			url:"php/abrir.php",
			data:cadena,
			success:function(r){
				if(r!=0){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Se envio instruccion de abrir!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}

function eliminarDatos4(id){

	cadena="id=" + id;
		$.ajax({
			type:"POST",
			url:"php/volumen.php",
			data:cadena,
			success:function(r){
				if(r!=0){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Se envio instruccion de Medir!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
		location.reload();
}
function eliminarDatos5(id){

	cadena="id=" + id;
		$.ajax({
			type:"POST",
			url:"php/borrar.php",
			data:cadena,
			success:function(r){
				if(r!=0){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Dispositivo Eliminado");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}

function eliminarDatos6(id){

	cadena="id=" + id;
		$.ajax({
			type:"POST",
			url:"php/mtt.php",
			data:cadena,
			success:function(r){
				if(r!=0){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Mantenimiento Concluido");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}