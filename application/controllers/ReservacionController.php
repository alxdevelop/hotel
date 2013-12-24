<?php
class ReservacionController extends QuarkController
{
	public function index(){
		
	}
	
	public function realizarReservacion($info = ''){
		
		$tipoHab['EJDB'] = 'Ejecutiva Doble';
		$tipoHab['EJSG'] = 'Ejecutiva Simple';
		$tipoHab['JRKS'] = 'Junior Suite Sencilla';
		$tipoHab['JRST'] = 'Junior Suite';
		$tipoHab['STD'] = 'Standar';
		if($info == ''){
			
			$fechaInicial 	= 	$_POST['fechaInicial'];
			$fechaFinal		=	$_POST['fechaFinal'];
			$codHab			=	$_POST['codHab'];
			$tipo_habitacion	=	$tipoHab[$codHab];
			$noHabitaciones		=	$_POST['noHabitaciones'];
			$totalAdultos		=	$_POST['totalAdultos'];
			$totalNinos			=	$_POST['totalNinos'];
			$claveComp			=	$_POST['claveComp'];
			$nombreCliente 		= 	$_POST['nombreCliente'];
			$paternoAp 		= 	$_POST['paternoAp'];
			$maternoAp 		= 	$_POST['maternoAp'];
			$type_card		=	$_POST['type_card'];
			$tCredito		=	$_POST['tCredito'];
			$month_card		=	$_POST['month_card'];
			$year_card		=	$_POST['year_card'];
			$seguridad_card	=	$_POST['seguridad_card'];
			$direccionCliente = $_POST['direccionCliente'];
			$cpCliente 		= 	$_POST['cpCliente'];
			$pais 			= 	$_POST['pais'];
			$estado 		= 	$_POST['estado'];
			$ciudad 		= 	$_POST['ciudad'];
			$email 			= 	$_POST['email'];
			$telefono 		= 	$_POST['telefono'];
			$nombreEmpresa 	= 	$_POST['nombreEmpresa'];
			$rfc 			= 	$_POST['rfc'];
			$direccionEmpresa = $_POST['direccionEmpresa'];
			$ciudadEmpresa 	= 	$_POST['ciudadEmpresa'];
			$planViaje 		= 	$_POST['planViaje'];
			$obs1 			= 	$_POST['obs1'];
			$obs2 			= 	$_POST['obs2'];
			$tarifa_rom		= 	$_POST['tarifa_rom'];
			
		}else{
		$data = split('-',$info);
		$tipo_habitacion = $tipoHab[$data[0]];
		$codHab		=	$data[0];
    if($codHab == 'EJDB'){
      $tarifa_rom = 1070;
    }else if($codHab == 'EJSG'){
      $tarifa_rom = 1070;
    }else if($codHab == 'JRKS'){
      $tarifa_rom = 1150;
    }else if($codHab == 'JRST'){
      $tarifa_rom = 1150;
    }else if($codHab == 'STD'){
      $tarifa_rom = 920;
    }
		//$tarifa_rom = $data[1];
		$fechaInicial = $data[2];
		$fechaFinal = $data[3];
		$noHabitaciones = $data[4];
		$totalAdultos	= $data[5];
		$totalNinos	= $data[6];
		if(isset($data[7])){
			$claveComp	= $data[7];
		}else{
			$claveComp = '';
		}
		$nombreCliente 	= 	'';
		$paternoAp 		= 	'';
		$maternoAp 		= 	'';
		$type_card		= 	'';
		$tCredito		=	'';
		$month_card		=	'';
		$year_card		=	'';
		$seguridad_card =	'';
		$direccionCliente = '';
		$cpCliente 		= 	'';
		$pais 			= 	'';
		$estado 		= 	'';
		$ciudad 		= 	'';
		$email 			= 	'';
		$telefono 		= 	'';
		$nombreEmpresa 	= 	'';
		$rfc 			= 	'';
		$direccionEmpresa = '';
		$ciudadEmpresa 	= 	'';
		$planViaje 		= 	'';
		$obs1 			= 	'';
		$obs2 			= 	'';
		}
		//print_r($data);
		$this->renderView('',array(
				'fechaInicial'	=>	$fechaInicial,
				'fechaFinal'	=>	$fechaFinal,
				'tipoHabitacion'=>	$tipo_habitacion,
				'codHab'		=>	$codHab,
				'noHabitaciones'=>	$noHabitaciones,
				'totalAdultos'	=>	$totalAdultos,
				'totalNinos'	=>	$totalNinos,
				'claveComp'		=>	$claveComp,
				'nombreCliente' =>	$nombreCliente,
				'paternoAp'		=>	$paternoAp,
				'maternoAp'		=>	$maternoAp,
				'type_card'		=>	$type_card,
				'tCredito'		=>	$tCredito,
				'month_card'	=>	$month_card,
				'year_card'		=>	$year_card,
				'seguridad_card'=>	$seguridad_card,
				'direccionCliente'=>$direccionCliente,
				'cpCliente'		=>	$cpCliente,
				'pais'			=>	$pais,
				'estado'		=>	$estado,
				'ciudad'		=>	$ciudad,
				'email'			=>	$email,
				'telefono'		=>	$telefono,
				'nombreEmpresa'	=>	$nombreEmpresa,
				'rfc'			=>	$rfc,
				'direccionEmpresa'=>$direccionEmpresa,
				'ciudadEmpresa'	=>	$ciudadEmpresa,
				'planViaje'		=>	$planViaje,
				'obs1'			=>	$obs1,
				'obs2'			=>	$obs2,
				'tarifa_rom'	=>	$tarifa_rom
				));
	}
	
	public function preReservacion(){
		
		$codHab 		= 	$_POST['codHab'];
		$claveComp		=	$_POST['claveComp'];
		$fechaInicial 	= 	$_POST['fechaInicial'];
		$fechaFinal 	= 	$_POST['fechaFinal'];
		$noHabitaciones = 	$_POST['noHabitaciones'];
		$totalAdultos 	= 	$_POST['totalAdultos'];
		$totalNinos 	= 	$_POST['totalNinos'];
		$nombreCliente 	= 	$_POST['nombreCliente'];
		$paternoAp 		= 	$_POST['paternoAp'];
		$maternoAp 		= 	$_POST['maternoAp'];
		$type_card		=	$_POST['type_card'];
			$tCredito		=	$_POST['tCredito'];
			$month_card		=	$_POST['month_card'];
			$year_card		=	$_POST['year_card'];
			$seguridad_card	=	$_POST['seguridad_card'];
		$direccionCliente = $_POST['direccionCliente'];
		$cpCliente 		= 	$_POST['cpCliente'];
		$pais 			= 	$_POST['pais'];
		$estado 		= 	$_POST['estado'];
		$ciudad 		= 	$_POST['ciudad'];
		$email 			= 	$_POST['email'];
		$telefono 		= 	$_POST['telefono'];
		$nombreEmpresa 	= 	$_POST['nombreEmpresa'];
		$rfc 			= 	$_POST['rfc'];
		$direccionEmpresa = $_POST['direccionEmpresa'];
		$ciudadEmpresa 	= 	$_POST['ciudadEmpresa'];
		$planViaje 		= 	$_POST['planViaje'];
		$obs1 			= 	$_POST['obs1'];
		$obs2 			= 	$_POST['obs2'];
		$tarifa_rom		= 	$_POST['tarifa_rom'];
		
		$tCredito_final = $type_card.'/'.$tCredito.'/'.$month_card.$year_card.'/'.$seguridad_card;
		
    //obtener los numero de dias
    $ano1 = substr($fechaInicial,0,4);
    $mes1 = substr($fechaInicial,4,2);
    $dia1 = substr($fechaInicial,6,2);

    $ano2 = substr($fechaFinal,0,4);
    $mes2 = substr($fechaFinal,4,2);
    $dia2 = substr($fechaFinal,6,2);
    
    //calculo timestam de las dos fechas
    $timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
    $timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2); 

    $segundos_diferencia = $timestamp1 - $timestamp2;
    //echo $segundos_diferencia;

    //convierto segundos en días
    $dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

    //obtengo el valor absoulto de los días (quito el posible signo negativo)
    $dias_diferencia = abs($dias_diferencia);

    //quito los decimales a los días de diferencia
    $dias_diferencia = floor($dias_diferencia); 

		$this->renderView('',array(
				'codHab'		=>	$codHab,
				'claveComp'		=>	$claveComp,
				'noHabitaciones'=>	$noHabitaciones,
				'fechaInicial'	=>	$fechaInicial,
				'fechaFinal'	=>	$fechaFinal,
				'totalAdultos'	=>	$totalAdultos,
				'totalNinos'	=>	$totalNinos,
				'nombreCliente' =>	$nombreCliente,
				'paternoAp'		=>	$paternoAp,
				'maternoAp'		=>	$maternoAp,
				'type_card'		=>	'',
				'tCredito'		=>	$tCredito,
				'month_card'	=>	'',
				'year_card'		=>	'',
				'seguridad_card'=>	'',
				'direccionCliente'=>$direccionCliente,
				'cpCliente'		=>	$cpCliente,
				'pais'			=>	$pais,
				'estado'		=>	$estado,
				'ciudad'		=>	$ciudad,
				'email'			=>	$email,
				'telefono'		=>	$telefono,
				'nombreEmpresa'	=>	$nombreEmpresa,
				'rfc'			=>	$rfc,
				'direccionEmpresa'=>$direccionEmpresa,
				'ciudadEmpresa'	=>	$ciudadEmpresa,
				'planViaje'		=>	$planViaje,
				'obs1'			=>	$obs1,
				'obs2'			=>	$obs2,
				'tarifa_rom'	=>	$tarifa_rom,
				'tCredito_final'=>	$tCredito_final,
        'dias_reservados' => $dias_diferencia
				));
	}
	
	public function generarReservacion(){
		
		$solicitud = "004 006 ";
		$cenv = "";
		$cenv = $cenv."campo2007=00000000-0 nomprv78=GENERAL PUBLICO grupal=OTRO ".chr(17);
		$cenv = $cenv."NOMBREDA=".strtoupper($_POST['paternoAp'])."/".strtoupper($_POST['maternoAp'])."/".strtoupper($_POST['nombreCliente'])." ".chr(17);
		$cenv = $cenv."STATUSDA=R ".chr(17);
		$cenv = $cenv."CIUDADDA=".strtoupper($_POST['ciudad'])." ".chr(17);
		$cenv = $cenv."NUMRESDA=0 ".chr(17);
		$cenv = $cenv."FHAENTDA=".$_POST['fechaInicial']." ".chr(17);
		$cenv = $cenv."FHASALDA=".$_POST['fechaFinal']." ".chr(17);
		$cenv = $cenv."NUMHABDA=0 ".chr(17);
		$cenv = $cenv."PLANVIDA=".$_POST['planViaje']." ".chr(17);
		$cenv = $cenv."OBSERVDA=".strtoupper($_POST['obs1'])." ".chr(17);	//observacion 1
		$cenv = $cenv."OBSERVDA2=".strtoupper($_POST['obs2'])." ".chr(17); //observacion 2
		$cenv = $cenv."DIRDA=".strtoupper($_POST['direccionCliente'])." ".chr(17); //direccion del cliente
		$cenv = $cenv."TELDA= ".chr(17);
		$cenv = $cenv."PAISDA=".strtoupper($_POST['pais'])." ".chr(17); //pais
		$cenv = $cenv."NOMCIADA=".strtoupper($_POST['nombreEmpresa'])." ".chr(17); //nombre de la empresa
		$cenv = $cenv."FORMPADA=".$_POST['tCredito_final']." ".chr(17); //forma de pago
		$cenv = $cenv."NUMPERDA=".$_POST['totalAdultos']." ".chr(17); //total adultos
		$cenv = $cenv."TARIFADA=".$_POST['tarifa_rom']." ".chr(17); //tarifa del hotel
		$cenv = $cenv."NUMCUADA=".$_POST['noHabitaciones']." ".chr(17); //no de habitaciones a reservar
		$cenv = $cenv."PASEDA=PGRL ".chr(17); //usuario con permisos
		$cenv = $cenv."FHARESDA=20080204 ".chr(17); //Fecha de la reservacion (hoy)
		$cenv = $cenv."TPOCAM1DA=0 ".chr(17); //pesos 0, dolares 1
		$cenv = $cenv."GARANTIADA=S ".chr(17); //garantizada S/N
		$cenv = $cenv."NUMNINDA=".$_POST['totalNinos']." ".chr(17); //numero de niños
		$cenv = $cenv."RFCDA=".strtoupper($_POST['rfc'])." ".chr(17); //rfc
		$cenv = $cenv."DIRCIADA=".strtoupper($_POST['direccionEmpresa'])." ".chr(17);  //direccion compañia o empresa
		$cenv = $cenv."CIUDCIADA= ".strtoupper($_POST['ciudadEmpresa']).",  CP".chr(17); //ciudad Empresa
		$cenv = $cenv."TIPTARDA=F ".chr(17); //tarifa forzada (F)
		$cenv = $cenv."NUMREGDA=0 ".chr(17);
		$cenv = $cenv."ORIGENDA=PUONLINE ".chr(17);
		$cenv = $cenv."NUMVIPDA= ".chr(17);
		$cenv = $cenv."ESTADODA=".strtoupper($_POST['estado'])." ".chr(17);
		$cenv = $cenv."NOMBR_DA=".strtoupper($_POST['nombreCliente'])." ".chr(17);
		$cenv = $cenv."APPAT_DA=".strtoupper($_POST['paternoAp'])." ".chr(17);
		$cenv = $cenv."APMAT_DA=".strtoupper($_POST['maternoAp'])." ".chr(17);
		$cenv = $cenv."EMAIL_DA=".strtoupper($_POST['email'])." ".chr(17);
		$cenv = $cenv."CODPOSDA=".strtoupper($_POST['cpCliente'])." ".chr(17);
		$cenv = $cenv."TELEFODA=".strtoupper($_POST['telefono'])." ".chr(17);
		$cenv = $cenv."CVEESTDA1=A".strtoupper($_POST['codHab'])." ".chr(17);
		$cenv = $cenv."CVEESTDA2=B ".chr(17);
		$cenv = $cenv."CVEESTDA3=C ".chr(17);
		$cenv = $cenv."CVEESTDA4=D1.6 ".chr(17);
		$cenv = $cenv."CVEESTDA5=E ".chr(17);
		$cenv = $cenv."CVEESTDA6=F ".chr(17);
		$cenv = $cenv."CVEESTDA7=G ".chr(17);
		$cenv = $cenv."CVEESTDA8=H ".chr(17);
		$cenv = $cenv."CVEESTDA9=IMSPR ".chr(17);
		$cenv = $cenv."CVEESTDA10=J ".chr(17);
		$cenv = $cenv."CVEESTDA11= ".chr(17);
		$cenv = $cenv."CVEESTDA12= ".chr(17);
		$cenv = $cenv."CVEESTDA13= ".chr(17);
		$cenv = $cenv."CVEESTDA14= ".chr(17);
		$cenv = $cenv."CVEESTDA15= ".chr(17);
		$cenv = $cenv."CVEESTDA16=";
		
		$total = 0;
		
		for ($i=0;$i<strlen($cenv);$i++){
			$thischar = substr(trim($cenv),$i,1);
			$asciichar=ord($thischar);
			$total = ($total+$asciichar);
		}
		
		
		$totalstr = $total;
		for ($n=0;$n<=10;$n++){
			$lentotal = strlen($totalstr);
			if ($lentotal<10){
				$totalstr = "0".$totalstr;
			}
			else {
				break;
			}
		}
		
		$cenv = $solicitud.$totalstr." ".$cenv.chr(20);
		
		//echo "Cadena Reservacion: ".$cenv;
		//exit;
		//echo "<hr />";
		$host = '201.120.27.198';
  		$port = '1';
		
		$timeout = 6;
		
		$fp = @fsockopen($host, $port, $errno, $errstr, 60);
		//echo "conectando a ".$host.", puerto ".$port."<br />";
		if (!$fp) {
			echo "".$errstr." (".$errno.")<br />\n";
		}
		else {
			//echo "conexión exitosa...enviando a cadena<br />";
			fwrite($fp, $cenv);
			//echo "cadena enviada... esperando respuesta<br />";
			$data = '';
			
			stream_set_blocking($fp, TRUE);
			stream_set_timeout($fp,$timeout);
			$info = stream_get_meta_data($fp);
		
		$finished = false; 
		while((!feof($fp)) && (!$info['timed_out']) && !$finished){
			$data .= fgets($fp, 4096);
			
			if(ord(substr($data, -1)) == 20){
				$finished = true;
			}
		}
		
			$info = stream_get_meta_data($fp); 
			//ob_flush;
			flush();
	
		}
			fclose($fp);
			if ($info['timed_out']){
				//echo "Time out (".$timeout." segundos) superado".$data;
			}
			else {
				//echo "Datos regresados '".$data."'";
			}
		
		$tipoHab['EJDB'] = 'Ejecutiva Doble';
		$tipoHab['EJSG'] = 'Ejecutiva Sencilla';
		$tipoHab['JRKS'] = 'Junior Suite Sencilla';
		$tipoHab['JRST'] = 'Junior Suite';
		$tipoHab['STD'] = 'Standar';

		$data = preg_replace('/\s+/', ' ', $data);
		$data_final = split(' ',$data);
		//print_r($data_final);
		
		if(strpos($data_final[2],'-')){
			$data_final[3] = 'Error'+$data_final[2];
		}
		
		//envio de correo
		
		//$email = array('0' => 'alx.develop@gmail.com', '1' => 'elborretpi@hotmail.com');
		$encabezados = 'From: Reservacion Hotel Arborea <no-reply@hotelarborea.com>' . "\r\n";
		$encabezados .= "MIME-Version: 1.0\r\n";
		$encabezados .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$asunto = 'Reservacion Arborea Hotel';
		//$email = array('0' => 'alx.develop@gmail.com');
		
		$fecha_ini = substr( $_POST['fechaInicial'], 6, 2 )."/".substr( $_POST['fechaInicial'], 4, 2 )."/".substr( $_POST['fechaInicial'], 0, 4 );
		$fecha_fin = substr( $_POST['fechaFinal'], 6, 2 )."/".substr( $_POST['fechaFinal'], 4, 2 )."/".substr( $_POST['fechaFinal'], 0, 4 );
		
		$message = "<h1>Arborea Hotel Guadalajara</h1><br />
		Le enviamos la confirmaci&oacute;n de su reservaci&oacute;n: <br /><br />
		<b>Nombre:</b> ".$_POST['nombreCliente']." ".$_POST['paternoAp']." ".$_POST['maternoAp']."<br />
		<b>Tipo de Habitaci&oacute;n:</b> ".$tipoHab[$_POST['codHab']]."<br />
		<b>Fecha de Llegada:</b> ".$fecha_ini." <br />
		<b>Fecha de Salida:</b> ".$fecha_fin." <br />
		<b>Tarifa por noche: $</b> ".$_POST['tarifa_rom'].".00 <br />
		<b>Adultos:</b> ".$_POST['totalAdultos']." <br />
		<b>Ni&ntilde;os:</b> ".$_POST['totalNinos']." <br />
		<h1>No. Reservaci&oacute;n: ".$data_final[3]."</h1><br />
		Arborea Hotel agradece su preferencia<br />
		<p style='color:red;'>Nota: En caso de no ser utilizada la reservaci&oacute;n y no ser cancelada 24 hrs. antes de su llegada se har&aacute; un cargo de NO-Show (una noche por habitaci&oacute;n reservada)</p>";

		mail($_POST['email'],$asunto,$message,$encabezados);
		mail('ecommerce@hotelarborea.com',$asunto,$message,$encabezados);
		
		/*$this->PHPMailer = new PHPMailer();
		
		$this->PHPMailer->IsSendmail(); // telling the class to use SendMail transport
		$this->PHPMailer->From       = 'no-reply@hotelarborea.com';
		$this->PHPMailer->FromName   = 'Hotel Arborea';
		$this->PHPMailer->Subject    = "Reservacion Hotel";
		$this->PHPMailer->IsHTML(true);
		$this->PHPMailer->MsgHTML(utf8_decode($message));
		$this->PHPMailer->AddAddress($email, "Reservacion Hotel");
		$this->PHPMailer->Send();*/
		
		$this->renderView('',array(
				'no_reservacion' => $data_final[3]
				));
		
	}
}
