$(document).ready(function(){
	
	function validar_email(valor)
    {
        // creamos nuestra regla con expresiones regulares.
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        // utilizamos test para comprobar si el parametro valor cumple la regla
        if(filter.test(valor))
            return true;
        else
            return false;
    }

    function validar_tarjeta (tcredito) {
		//Limpiamos el número de tarjeta  de posibles espacios en blanco...
		  var expReg = /\W/gi;
		  var numero = tcredito.replace(expReg, "");
		 
		  //Chequeamos que el numero entrado tenga formato numérico...
		  if (isNaN(numero)) {
		    alert("El número de la tarjeta de crédito no tiene formato numérico.");
		  
		    return false;
		  }
		 
		  //Chequeamos que el numero tenga 16 o 18 dígitos...
		  if ((numero.length!=16) && (numero.length!=18)) {
		     alert("El número de dígitos en la tarjeta de crédito es incorrecto.");
		    
		     return false;
		  }
		 
		  var suma = 0;
		  for (i = numero.length; i > 0; i--) {
		 
		    //Si la posición es impar
		    if (i % 2 == 1) {
		      var doble = "" + (parseInt(numero.substring(i - 1, i)) * 2);
		 
		      //Si el doble tiene más dos cifras (o sea es mayor que 9)
		      if (doble.length == 2) {
		         doble = parseInt(doble.substring(0,1)) + parseInt(doble.substring(1,2));
		      }
		      suma += parseInt(doble);
		    }
		    //Si la posición es par
		    else {
		      suma += parseInt(numero.substring(i - 1, i));
		    }
		  }
		 
		  //Si la suma total no es divisible por 10 entonces el número no es válido
		  if (suma % 10 != 0) {
		    alert("El número de la tarjeta de crédito no es válido.");
		    return false;
		  }
		 
		  //En cualquier otro caso el número es válido
		  return true;
	}
	
	$('#btn-res').click(function(){
		
		if($('#nombreCliente').val() == ''){
			alert('Por favor Ingresa tu nombre');
			$('#nombreCliente').focus();
			return false;
		}
		if($('#paternoAp').val() == ''){
			alert('Por favor Ingresa tu apellido paterno');
			$('#paternoAp').focus();
			return false;
		}
		if($('#maternoAp').val() == ''){
			alert('Por favor Ingresa tu apellido materno');
			$('#maternoAp').focus();
			return false;
		}
		if($('#direccionCliente').val() == ''){
			alert('Por favor Ingresa tu direccion');
			$('#direccionCliente').focus();
			return false;
		}
		if($('#pais').val() == ''){
			alert('Por favor Ingresa el Pais');
			$('#pais').focus();
			return false;
		}
		if($('#estado').val() == ''){
			alert('Por favor Ingresa el Estado');
			$('#estado').focus();
			return false;
		}
		if($('#ciudad').val() == ''){
			alert('Por favor Ingresa la ciudad');
			$('#ciudad').focus();
			return false;
		}
		if($('#email').val() == ''){
			alert('Ingresa su correo electronico donde le llegara el numero de reservacion');
			$('#email').focus();
			return false;
		}
		if($('#telefono').val() == ''){
			alert('Por favor Ingresa tu telefono');
			$('#telefono').focus();
			return false;
		}
		if(!validar_email($("#email").val()))
        {
            alert('Por favor ingresa un correo electronico con el formato valido');
			$('#email').focus();
			return false;
        }
		if($('#type_card').val() == '0'){
			alert('Ingresa el tipo de tarjeta de credito');
			$('#type_card').focus();
			return false;
		}
		if($('#tCredito').val() == ''){
			alert('Ingresa el numero de tarjeta de credito');
			$('#tCredito').focus();
			return false;
		}
		if(isNaN($('#tCredito').val())){
			alert('El numero de la tarjeta de credito debe ser numerico');
			$('#tCredito').focus();
			return false;
		}
		if($('#month_card').val() == '0'){
			alert('Ingresa el mes de vencimiento de la tarjeta de credito');
			$('#month_card').focus();
			return false;
		}
		if($('#year_card').val() == ''){
			alert('Ingresa el año de vencimiento de la tarjeta de credito');
			$('#year_card').focus();
			return false;
		}
		if(isNaN($('#year_card').val())){
			alert('El valor del año debe ser numerico');
			$('#year_card').focus();
			return false;
		}
		if($('#seguridad_card').val() == ''){
			alert('Ingresa el numero de seguridad de la tarjeta de credito el cual se encuentra en el reverso de la misma');
			$('#seguridad_card').focus();
			return false;
		}
		if(isNaN($('#seguridad_card').val())){
			alert('El valor del numero de seguridad de la tarjeta de credito debe ser numerico');
			$('#seguridad_card').focus();
			return false;
		}
		if(!validar_tarjeta($('#tCredito').val())){
			alert('El no. de tarjeta de credito es incorrecto o no coherente');
			$('#tCredito').focus();
			return false;
		}
	});

	$('#btn-cancel').click(function(){
		var url = $(this).attr('rel');
		window.location= url;
		return false;
	});
	
	
});