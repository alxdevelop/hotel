<?php
$this->renderView('layout/header.php');
?>
No. de Reservacion:

<h2><?php echo $no_reservacion; ?></h2>
Se ha enviado un e-mail con el numero de reservacion al cliente.<br />
<br />
<a href='<?php echo $this->QuarkUrl->url('home/get-disponibilidad');?>'>Volver al Inicio</a>
<?php 
$this->renderView('layout/footer.php');
?>