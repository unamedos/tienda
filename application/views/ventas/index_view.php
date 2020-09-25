<div class="row">
	<div class="col-xs-12 text-center">
		<b>Empresa de Ventas</b><br>
		Solca c.a <br>
		Tel. 0414-3454333 <br>
		Rif. J403627339 <br>
		Email:unamedos@gmail.com
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">
		<b>CLIENTE</b><br>
		<b>Nombre:</b> <?php echo $venta->nombre; ?><br>
		<b>Cedula:</b> <?php echo $venta->cedula; ?><br>
		<b>Telefono:</b> <?php echo $venta->telefono; ?> <br>
		<b>Direccion</b> <?php echo $venta->direccion; ?><br>
	</div>
	<div class="col-xs-6">
		<b>COMPROBANTE</b> <br>
		<b>Tipo de Comprobante:</b> <?php echo $venta->tipocomprobante; ?><br>

		<b>Nro de Comprobante:</b> <?php echo $venta->num_control; ?><br>
		<b>Fecha</b> <?php echo $venta->fecha; ?>
	</div>
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>

					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detalles as $detalle) : ?>
					<tr>
						<td><?php echo $detalle->nombre ?></td>
						<td><?php echo $detalle->precio ?></td>
						<td><?php echo $detalle->cantidad ?></td>
						<td><?php echo $detalle->total ?></td>

					</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $venta->subtotal; ?></td>
				</tr>
				<tr>
					<td colspan="3" class="text-right"><strong>IVA:</strong></td>
					<td><?php echo $venta->iva; ?></td>
				</tr>
				<tr>
					<td colspan="3" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $venta->total; ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>