

$(function(){
$("#suborden").change(function(){ // se activa el script cuando selecciono el select vehiculo
	 suborden=$(this).val() // Tomo el valor seleccionado

	 //envio a una pagina que hara la consulta sql y me devolvera los datos para poner en el select

	 $.get("http://localhost/gih/componentes/subordenes.php?idsuborden="+suborden,
		 function(data){
			 $("#suborden").html(data); // Tomo el resultado e inserto los datos en el select marca								
		 });															
});
});		