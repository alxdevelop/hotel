<?php

$this->appendCssFiles('jquery-ui/jquery.ui.datepicker.css');
$this->appendCssFiles('jquery-ui/jquery.ui.theme.css');
$this->renderView('layout/header.php');

?>
<h2>Disponibilidad:</h2>
<label>Seleccione el rango de fechas que necesite verificar disponibilidad:</label>
<form method='POST' id='form' name='form' action='<?php echo $this->QuarkUrl->url('home/show-disponibilidad');?>'>
	<fieldset>
		<legend></legend>
	
	<table>
		<tr>
			<td><p>Fecha Entrada: <input type="text" class="datepicker" id='fechainicial' name='fechainicial' /></p></td>
			<td><p>Fecha Salida: <input type="text" class="datepicker" id='fechafinal' name='fechafinal' /></p></td>
		</tr>
		<tr>
			<td><p>No. Habitaciones: 
			<select name='noHabitaciones' id='noHabitaciones'>
				<option value='0'>Seleccione una opcion</option>
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
				<option value='4'>4</option>
				<option value='5'>5</option>
				<option value='6'>6</option>
				<option value='7'>7</option>
				<option value='8'>8</option>
				<option value='9'>9</option>
				<option value='10'>10</option>
			</select>
			</p></td>
			<td></td>
		</tr>
		<tr>
			<td><p>Total Adultos: <select name='totalAdultos' id='totalAdultos'>
				<option value='0'>Seleccione una opcion</option>
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
				<option value='4'>4</option>
				<option value='5'>5</option>
				<option value='6'>6</option>
				<option value='7'>7</option>
				<option value='8'>8</option>
				<option value='9'>9</option>
				<option value='10'>10</option>
			</select>
			</p></td>
			<td><p>Total Niños: 
			<select name='totalNinos' id='totalNinos'>
				<option value='0'>0</option>
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
				<option value='4'>4</option>
				<option value='5'>5</option>
				<option value='6'>6</option>
				<option value='7'>7</option>
				<option value='8'>8</option>
				<option value='9'>9</option>
				<option value='10'>10</option>
			</select>
			</p></td>
		</tr>
		<tr>
			<td><p>Clave Compañia: <input type='text' name='claveComp' id='claveComp' /></p></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><button>Consultar</button></td>
		</tr>
	</table>
	
	</fieldset>
</form>

<?php
$this->appendJsFiles('home/get-disponibilidad.js');
$this->renderView('layout/footer.php');
?>

