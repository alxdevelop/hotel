<?php
$this->renderView('layout/header.php');
?>

<h1>Reservacion</h1>
<label>Llena correctamente la informacion que se te pide:</label>
<form method='POST' id='form' name='form' action='<?php echo $this->QuarkUrl->url('reservacion/pre-reservacion');?>'>
<fieldset>
	<legend></legend>
	<table>
		<tr>
			<td rowspan='7'><img src='<?php echo $this->QuarkUrl->baseUrl(); ?>application/public/image/<?php echo $codHab; ?>.jpg' /></td>
			<td><label>Tipo de Habitacion</label></td>
			<td><?php echo $tipoHabitacion; ?><input type='hidden' value='<?php echo $codHab;?>' name='codHab'>
			</td>
		</tr>
		<tr>
			<td><label>Precio:</label></td>
			<td>$<?php echo $tarifa_rom; ?>.00 por noche.<input type='hidden' value='<?php echo $tarifa_rom;?>' name='tarifa_rom'></td>
		</tr>
		<tr>
			<td><label>Fecha Entrada:</label></td>
			<td><?php echo $fechaInicial; ?><input type='hidden' value='<?php echo $fechaInicial;?>' name='fechaInicial'></td>
		</tr>
		<tr>
			<td><label>Fecha Salida:</label></td>
			<td><?php echo $fechaFinal; ?><input type='hidden' value='<?php echo $fechaFinal;?>' name='fechaFinal'></td>
		</tr>
		<tr>
			<td><label>No. Habitaciones:</label></td>
			<td><?php echo $noHabitaciones; ?><input type='hidden' value='<?php echo $noHabitaciones;?>' name='noHabitaciones'></td>
		</tr>
		<tr>
			<td><label>No. Adultos:</label></td>
			<td><?php echo $totalAdultos; ?><input type='hidden' value='<?php echo $totalAdultos;?>' name='totalAdultos'></td>
		</tr>
		<tr>
			<td><label>No. Niños:</label></td>
			<td><?php echo $totalNinos; ?><input type='hidden' value='<?php echo $totalNinos;?>' name='totalNinos'></td>
		</tr>
		<tr>
			<td><label>Clave Compañia:</label></td>
			<td><?php echo $claveComp; ?><input type='hidden' value='<?php echo $claveComp;?>' name='claveComp'></td>
		</tr>
	</table>
</fieldset>
<h2>Información Cliente:</h2>
<fieldset>
	<legend></legend>
	
	<table>
		<tr>
			<td><label>Nombre(s):</label>
			<input type='text' name='nombreCliente' id='nombreCliente' value='<?php echo $nombreCliente; ?>' /></td>
			<td>
				<label>Apellido Paterno:</label>
				<input type='text' name='paternoAp' id='paternoAp' value='<?php echo $paternoAp; ?>' />
			</td>
			<td>
				<label>Apellido Materno:</label>
				<input type='text' name='maternoAp' id='maternoAp' value='<?php echo $maternoAp; ?>' />
			</td>
		</tr>
		
		<tr>
			<td>
				<label>Direccion:</label>
				<input type='text' size='20' name='direccionCliente' id='direccionCliente' value='<?php echo $direccionCliente; ?>' />
			</td>
			<td>
				<label>Codigo Postal:</label>
				<input type='text' name='cpCliente' value='<?php echo $cpCliente; ?>' />
			</td>
			<td></td>
		</tr>
		<tr>
			<td>
				<label>Pais:</label>
				<input type='text' name='pais' id='pais' value='<?php echo $pais; ?>' />
			</td>
			<td>
				<label>Estado:</label>
<input type='text' name='estado' id='estado' value='<?php echo $estado; ?>'/>
			</td>
			<td>
				<label>Ciudad:</label>
<input type='text' name='ciudad' id='ciudad' value='<?php echo $ciudad; ?>' />
			</td>
		</tr>
		<tr>
			<td>
				<label>E-mail:</label>
				<input type='text' name='email' id='email' value='<?php echo $email; ?>' />
			</td>
			<td>
				<label>Telefono:</label>
				<input type='text' name='telefono' id='telefono' value='<?php echo $telefono; ?>' />
			</td>
			<td></td>
		</tr>
		
	

	</table>
</fieldset>
<h2>Tarjeta de Credito</h2>
<fieldset>
	<legend></legend>

	<table>
		<tr>
			<td><label>Tipo de Tarjeta:</label>
				<select name='type_card' id='type_card'>
					<option value='0'>Seleccione una opcion..</option>
					<option value='VS'>Visa</option>
					<option value = 'MC'>Mastercard</option>
					<option value='AX'>American Express</option>

				</select></td>
				<td>
				<label>No. Tarjeta Credito:</label>
				<input type='text' name='tCredito' id='tCredito' value='<?php echo $tCredito; ?>' />
			</td>
		</tr>
		<tr>
			<td><label>Fecha de Vencimiento: </label></td>
		</tr>
		<tr>
			<td>
				
				Mes: <select name='month_card' id='month_card'>
					<option value='0'>Selecciona el numero de mes..</option>
					<option value='01'>01</option>
					<option value='02'>02</option>
					<option value='03'>03</option>
					<option value='04'>04</option>
					<option value='05'>05</option>
					<option value='06'>06</option>
					<option value='07'>07</option>
					<option value='08'>08</option>
					<option value='09'>09</option>
					<option value='10'>10</option>
					<option value='11'>11</option>
					<option value='12'>12</option>
			</select>
				
			</td>
			<td>
				Año:<input type='text' name='year_card' size='2' id='year_card' value='<?php echo $year_card; ?>' />
			</td>
			<td></td>
		</tr>
		<tr>
			<td>
				<label>Codigo de Seguridad:</label>
				<input type='text' name='seguridad_card' id='seguridad_card' value='<?php echo $seguridad_card; ?>' />
			</td>
			<td>
				
			</td>
			<td></td>
		</tr>
	</table>
</fieldset>
<h2>Información Compañia</h2>
<fieldset>
	<legend></legend>
	<table>
		<tr>
			<td>
				<label>Nombre Compañia:</label>
				<input type='text' name='nombreEmpresa' value='<?php echo $nombreEmpresa; ?>' />
			</td>
			<td>
				<label>RFC Compañia:</label>
				<input type='text' name='rfc' value='<?php echo $rfc; ?>' />
			</td>
			<td></td>
		</tr>
		<tr>
			<td>
				<label>Direccion Compañia:</label>
				<input type='text' name='direccionEmpresa' value='<?php echo $direccionEmpresa; ?>' />
			</td>
			<td>
				<label>Ciudad Compañia:</label>
				<input type='text' name='ciudadEmpresa' value='<?php echo $ciudadEmpresa; ?>' />
			</td>
			<td></td>
		</tr>
		
	</table>
</fieldset>
<h2>Información Adicional</h2>
<fieldset>
	<legend></legend>
	<table>
	<tr>
			<td><label>Plan de Viaje:</label>
				<input type='text' name='planViaje' value='<?php echo $planViaje; ?>' /></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>
				<label>Observaciones:</label>
<input type='text' name='obs1' value='<?php echo $obs1; ?>' />
			</td>
			<td>
				<label>Observaciones2:</label>
<input type='text' name='obs2' value='<?php echo $obs2; ?>' />
			</td>
			<td></td>
		</tr>
		</table>
</fieldset>
<button id='btn-cancel' rel="<?php echo $this->QuarkUrl->url('home/get-disponibilidad'); ?>">Cancelar</button><button id='btn-res'>Continuar</button>

</form>


<?php
$this->appendJsFiles('reservacion/realizar-reservacion.js');
$this->renderView('layout/footer.php');
