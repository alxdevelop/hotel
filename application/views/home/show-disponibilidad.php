<?php

$this->appendCssFiles('jquery-ui/jquery.ui.datepicker.css');
$this->appendCssFiles('jquery-ui/jquery.ui.theme.css');
$this->renderView('layout/header.php');

$tipoHab['EJDB'] = '<h4>Ejecutiva Doble</h4><label>$ 1,070.00 (incluye impuestos, desayuno para Adultos)</label><label>Tarifa en ocupación doble</label><label>Hasta 2 menores de 12 años gratis</label><label>Dos camas matrimoniales</label><label>Ocupación máxima 4 personas</label>'; 
$tipoHab['EJSG'] = '<h4>Ejecutiva Sencilla</h4><label>$ 1,070.00 (incluye impuestos, desayuno para Adultos)</label><label>Tarifa en ocupación doble</label><label>Ocupación máxima 2 personas</label><label>Una cama King Size</label>';
$tipoHab['JRKS'] = '<h4>Junior Suite Sencilla</h4><label>$ 1,150.00  (incluye impuestos, desayunos para Adultos)</label><label>Tarifa en ocupación doble</label><label>Ocupación máxima 2 personas</label><label>Una cama King Size </label><label>Incluye salita tipo lounge, cafetera, mini-bar, micro-ondas</label>';
$tipoHab['JRST'] = '<h4>Junior Suite</h4><label>$ 1,150.00 (incluye impuestos, desayuno para Adultos)</label><label>Tarifa en ocupación doble</label><label>Dos camas matrimoniales</label><label>Ocupación máxima 4 personas</label><label>Incluye salita tipo lounge, cafetera, mini-bar, micro-ondas</label>';
$tipoHab['STD'] = '<h4>Standar</h4><label>$ 920.00 (incluye impuestos, desayunos para Adultos)</label><label>Tarifa en ocupación doble</label><label>Una cama Queen Size</label><label>Máximo 2 personas</label>';
/* */
$tarifa['EJDB'] = '1070';
$tarifa['EJSG'] = '1070';
$tarifa['JRKS'] = '1150';
$tarifa['JRST'] = '1150';
$tarifa['STD'] = '920';
?>


<h2>Habitaciones Disponibles:</h2>
<fieldset>
	<h4>Informacion:</h4>
	<table>
		<tr>
			<td><p><label>Fecha Entrada:</label> <?php echo $fechaInicial;?></p></td>
			<td><p><label>Fecha Salida:</label> <?php echo $fechaFinal;?></p></td>
		</tr>
		<tr>
			<td><label>Numero de Habitaciones: </label> <?php echo $noHabitaciones;?></td>
			<td><label>Clave Compañia: </label> <?php echo $claveComp;?></td>
		</tr>
		<tr>
			<td><label>Adultos:</label> <?php echo $totalAdultos;?></p></td>
			<td><label>Niños:</label> <?php echo $totalNinos;?></p></td>
		</tr>
	</table>
</fieldset>

<?php //echo $disponibilidad; 

$resultados = split(' ', $disponibilidad);

if(isset($resultados[3])){
	
	$no_std = split(' ',$resultados[3]);
	$resultados[2] = $resultados[2].$no_std[0];
}

$habitaciones =  split(',',$resultados[2]);
//print_r ($habitaciones);
?>
<table class='myinfo'>
	
	<?php foreach($habitaciones as $Habitaciones){
			$descripcion = split('-',$Habitaciones);
		?>
		<tr>
			<td><img src='<?php echo $this->QuarkUrl->baseUrl(); ?>application/public/image/<?php echo $descripcion[0]; ?>.jpg' />

			</td>
			<td><?php echo $tipoHab[$descripcion[0]];?></td>
			<!--<td><?php //if(isset($descripcion[1])){//echo "<h1>".$descripcion[1]."</h1>"; }else{ //echo "<h1>0</h1>";}?></td>-->
			<td>
			<?php if(isset($descripcion[1]) && $descripcion[1] > 0){?>
			<button class='btn-reservar' value='<?php echo $this->QuarkUrl->baseUrl()."reservacion/realizar-reservacion/".$descripcion[0]."-".$tarifa[$descripcion[0]]."-".$fechaInicial."-".$fechaFinal."-".$noHabitaciones."-".$totalAdultos."-".$totalNinos."-".$claveComp; ?>'>Reservar</button>
			<?php } ?></td>
		</tr>
	<?php
	unset($descripcion);
	} ?>
</table>
<form action="<?php echo $this->QuarkUrl->url('home/get-disponibilidad'); ?>"> 
	<br />
	<button>Volver</button>
</form>
<?php
$this->appendJsFiles('home/show-disponibilidad.js');
$this->renderView('layout/footer.php');
