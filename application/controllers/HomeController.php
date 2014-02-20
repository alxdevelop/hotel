<?php
class HomeController extends QuarkController
{
  public function index()
  {
    

 	$this->renderView('');
  }
  
  public function getDisponibilidad(){
  	
  	$this->renderView();
  }
  
  public function showDisponibilidad(){
  	
  	$fechaInicial = $_POST['fechainicial'];
  	$fechaFinal = $_POST['fechafinal'];
  	$noHabitaciones = $_POST['noHabitaciones'];
  	$totalAdultos = $_POST['totalAdultos'];
  	$totalNinos = $_POST['totalNinos'];
  	$claveComp = $_POST['claveComp'];
  	$cadena_disponibilidad = '';
  	$solicitud = '002 025 ';
  	$apuntador = '1 ';
  	$usuario = 'PGRL'.chr(20);
  	
  	/* convertir al formato correcto */
  	$convertirFecha = split('/',$fechaInicial);
  	$fechaInicial = $convertirFecha[2].$convertirFecha[0].$convertirFecha[1];
  	$convertirFecha = split('/',$fechaFinal);
  	$fechaFinal = $convertirFecha[2].$convertirFecha[0].$convertirFecha[1];
  	
  	
  	$cadena_disponibilidad = $solicitud.$fechaInicial.' '.$fechaFinal.' '.$apuntador.$usuario.chr(20);
  	
  	//echo "Cadena Disponibilidad: ".$cadena_disponibilidad;
  	$info_disponibilidad = $this->connect($cadena_disponibilidad);
  	//echo "<br />Cadena Regresada: ".$info_disponibilidad;
  	
  	$this->renderView('',array(
  			'disponibilidad' => $info_disponibilidad,
  			'fechaInicial'	=> $fechaInicial,
  			'fechaFinal'	=> $fechaFinal,
  			'noHabitaciones' => $noHabitaciones,
  			'totalAdultos'	=>	$totalAdultos,
  			'totalNinos'	=>	$totalNinos,
  			'claveComp'		=>	$claveComp
  			));
  }
  
  public function connect($cadena){
  	
  	$host = '0.0.0.0';
  	$port = 1;
  	$data = '';
  	
  	$timeout = 30;
  	
  $fp = @fsockopen($host, $port, $errno, $errstr, 30);
	echo "conectando a ".$host.", puerto ".$port."...<br />";
  echo $fp;
	
	if (!$fp) {
    echo "Error al tratar de conectar al servidor: ".$errstr." (".$errno.")<br />\n";
    exit;
	}
	else {
	//echo "conexion exitosa...enviando a cadena<br />";
    fwrite($fp, $cadena);
    
	//echo "cadena enviada... esperando respuesta<br />";
	
	stream_set_blocking($fp, TRUE); 
    stream_set_timeout($fp,$timeout); 
    $info = stream_get_meta_data($fp); 

	$finished = false; 
	while((!feof($fp)) && (!$info['timed_out']) && (!$finished)){
		$data .= fgets($fp, 4096);
		
		if(ord(substr($data, -1)) == 10){
			$finished = true;
		}
		
		$info = stream_get_meta_data($fp); 
		//ob_flush;
		flush();
	
	}
    fclose($fp);
		if ($info['timed_out']){ 
        echo "Time out (".$timeout." segundos) superado, con la info: ".$data;
        }
		else { 
        echo "Datos regresados '".$data."'"; 
        }
	}
	//echo $data;
	
	return $data;
  }
  
	
}
