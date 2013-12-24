<?php
$this->renderView('layout/header.php');
$tipoHab['EJDB'] = 'Ejecutiva Doble';
$tipoHab['EJSG'] = 'Ejecutiva Sencilla';
$tipoHab['JRKS'] = 'Junior Suite Sencilla';
$tipoHab['JRST'] = 'Junior Suite';
$tipoHab['STD'] = 'Standar';
?>
<h2>Revise su Reservacion</h2>
<fieldset>
	<legend>Datos de la Reservacion</legend>
	
	<table>
		<tr>
			<td colspan='2'>
				<h4>Habitacion:</h4>
			</td>
		<tr>
		<tr>
			<td><label>Tipo:</label><?php echo $tipoHab[$codHab];?></td>
			<td><label>No. Hab:</label><?php echo $noHabitaciones;?></td>
		</tr>
		<tr>
			<td colspan='2'>
				<h4>Precio:</h4>
			</td>
		<tr>
		<tr>
			<td><label>Precio por noche:</label>$<?php echo $tarifa_rom;?>.00</td>
		</tr>
    <tr>
      <td><label>Total de Noches:</label><?php echo $dias_reservados; ?></td>
      <td><label>Precio Total:</label><?php echo ($tarifa_rom * $dias_reservados); ?></td>
    </tr>
		<tr>
			<td colspan='2'>
				<h4>Fechas:</h4>
			</td>
		<tr>
		<tr>
			<td><label>Fecha Entrada:</label><?php echo $fechaInicial;?></td>
			<td><label>Fecha Salida:</label><?php echo $fechaFinal;?></td>
		</tr>
		<tr>
			<td colspan='2'>
				<h4>No. Personas:</h4>
			</td>
		<tr>
		<tr>
			<td><label>Adultos:</label><?php echo $totalAdultos;?></td>
			<td><label>Niños:</label><?php echo $totalNinos;?></td>
		</tr>
		<tr>
			<td colspan='2'>
				<h4>Informacion Cliente:</h4>
			</td>
		<tr>
		<tr>
			<td><label>Nombre(s):</label><?php echo $nombreCliente;?></td>
			<td><label>A. Paterno:</label><?php echo $paternoAp;?></td>
			<td><label>A. Materno:</label><?php echo $maternoAp;?></td>
		</tr>
		<tr>
			<td><label>Tarjeta Credito:</label><?php echo $tCredito;?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><label>Direccion:</label><?php echo $direccionCliente;?></td>
			<td><label>CP:</label><?php echo $cpCliente;?></td>
			<td></td>
		</tr>
		<tr>
			<td><label>Pais:</label><?php echo $pais;?></td>
			<td><label>Estado:</label><?php echo $estado;?></td>
			<td><label>Ciudad:</label><?php echo $ciudad;?></td>
		</tr>
		<tr>
			<td><label>E-mail:</label><?php echo $email;?></td>
			<td><label>Telefono:</label><?php echo $telefono;?></td>
			<td></td>
		</tr>
		<tr>
			<td colspan='2'>
				<h4>Informacion Compañia:</h4>
			</td>
		<tr>
		<tr>
			<td><label>Nombre Compañia:</label><?php echo $nombreEmpresa;?></td>
			<td><label>RFC:</label><?php echo $rfc;?></td>
			<td><label>Clave Compañia</label><?php echo $claveComp; ?></td>
		</tr>
		<tr>
			<td><label>Direccion:</label><?php echo $direccionEmpresa;?></td>
			<td><label>Ciudad:</label><?php echo $ciudadEmpresa;?></td>
			<td></td>
		</tr>
		<tr>
			<td colspan='2'>
				<h4>Informacion Adicional:</h4>
			</td>
		<tr>
		<tr>
			<td><label>Plan de Viaje:</label><?php echo $planViaje;?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><label>Observaciones:</label><?php echo $obs1;?></td>
			<td><label>Observaciones2:</label><?php echo $obs2;?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	
</fieldset>
<form method='post' id='form' action=''>
	<input type='hidden' name='codHab' value='<?php echo $codHab;?>' />
	<input type='hidden' name='noHabitaciones' value='<?php echo $noHabitaciones; ?>' />
	<input type='hidden' name='fechaInicial' value='<?php echo $fechaInicial; ?>' />
	<input type='hidden' name='fechaFinal' value='<?php echo $fechaFinal; ?>' />
	<input type='hidden' name='totalAdultos' value='<?php echo $totalAdultos; ?>' />
	<input type='hidden' name='totalNinos' value='<?php echo $totalNinos; ?>' />
	<input type='hidden' name='nombreCliente' value='<?php echo $nombreCliente; ?>' />
	<input type='hidden' name='paternoAp' value='<?php echo $paternoAp; ?>' />
	<input type='hidden' name='maternoAp' value='<?php echo $maternoAp; ?>' />
	<input type='hidden' name='type_card' value='<?php echo $type_card; ?>' />
	<input type='hidden' name='tCredito' value='<?php echo $tCredito; ?>' />
	<input type='hidden' name='month_card' value='<?php echo $month_card; ?>' />
	<input type='hidden' name='year_card' value='<?php echo $year_card; ?>' />
	<input type='hidden' name='seguridad_card' value='<?php echo $seguridad_card; ?>' />
	<input type='hidden' name='direccionCliente' value='<?php echo $direccionCliente; ?>' />
	<input type='hidden' name='cpCliente' value='<?php echo $cpCliente; ?>' />
	<input type='hidden' name='pais' value='<?php echo $pais; ?>' />
	<input type='hidden' name='estado' value='<?php echo $estado; ?>' />
	<input type='hidden' name='ciudad' value='<?php echo $ciudad; ?>' />
	<input type='hidden' name='email' value='<?php echo $email; ?>' />
	<input type='hidden' name='telefono' value='<?php echo $telefono; ?>' />
	<input type='hidden' name='nombreEmpresa' value='<?php echo $nombreEmpresa; ?>' />
	<input type='hidden' name='rfc' value='<?php echo $rfc; ?>' />
	<input type='hidden' name='claveComp' value='<?php echo $claveComp; ?>' />
	<input type='hidden' name='direccionEmpresa' value='<?php echo $direccionEmpresa; ?>' />
	<input type='hidden' name='ciudadEmpresa' value='<?php echo $ciudadEmpresa; ?>' />
	<input type='hidden' name='planViaje' value='<?php echo $planViaje; ?>' />
	<input type='hidden' name='obs1' value='<?php echo $obs1; ?>' />
	<input type='hidden' name='obs2' value='<?php echo $obs2; ?>' />
	<input type='hidden' name='tarifa_rom' value='<?php echo ($tarifa_rom * $dias_reservados); ?>' />
	<input type='hidden' name='tCredito_final' value='<?php echo $tCredito_final; ?>' />
</form>
</form>

<button id='btn_back'>Regresar</button><button id='btn_reservar'>Reservar</button>
<?php 
$this->renderView('layout/footer.php');
?>
<script>
$(document).ready(function(){

	$('#btn_back').click(function(){
	
		$('#form').attr('action','realizar-reservacion');
		$('#form').submit();

		});

	$('#btn_reservar').click(function(){
		
		$('#form').attr('action','generar-reservacion');
		$('#form').submit();

		});
	
});
</script>
