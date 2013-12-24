$(document).ready(function(){
	
	$( ".datepicker" ).datepicker();
	
	$('button').click(function(){
		
		if($('#fechainicial').val() == ''){
			alert('Ingresa la fecha inicial');
			$('#fechainicial').focus();
			return false;
		}
		if($('#fechafinal').val() == ''){
			alert('Ingresa la fecha final');
			$('#fechafinal').focus();
			return false;
		}
		
		var inicio = new Array();
		var final = new Array();
		inicio[0] = $('#fechainicial').val().substring(0,2);
		inicio[1] = $('#fechainicial').val().substring(3,5);
		inicio[2] = $('#fechainicial').val().substring(6,10);
		
		final[0] = $('#fechafinal').val().substring(0,2);
		final[1] = $('#fechafinal').val().substring(3,5);
		final[2] = $('#fechafinal').val().substring(6,10);
		
		if(final[2] < inicio[2]){
			alert('El año de la fecha final no puede ser menor');
			return false;
		}else{
			if(final[0] < inicio[0]){
				alert('El mes de la fecha final no puede ser menor');
				return false;
			}else{
				if(final[0] == inicio[0]){
					
					if(final[1] < inicio[1]){
						alert('El dia de la fecha final no puede ser menor');
						return false;
					}
				}
			}
			
		}
		
		if($('#noHabitaciones').val() == 0){
			alert('Por favor ingresa el numero de habitaciones');
			$('#noHabitaciones').focus();
			return false;
		}
		
		if($('#totalAdultos').val() == 0){
			alert('Por favor ingresa el numero de Adultos');
			$('#totalAdultos').focus();
			return false;
		}
		/*if($('#totalNinos').val() == ''){
			alert('Por favor ingresa el numero de Niños');
			$('#totalNinos').focus();
			return false;
		}*/
	});
});