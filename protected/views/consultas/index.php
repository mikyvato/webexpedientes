<?php if ($tramitacion !== null){ ?>
	<table border="1">
		<tr>
			<th colspan="4">Listado de Tramitaciones Tramitaciones </th>
		</tr>
		<tr>
			<th>Nro Exp</th>
			<th>Fecha Tramite</th>
			<th>Observacion</th>
			<th>Cant de Folios</th>
			<th>Usuario</th>
			<th>Estado</th>
			<th>Oficina</th>
		</tr>
		<?php 
		foreach ($tramitacion as $data) {
			<td><?php echo $data->id_tramite; ?></td>
			<td><?php echo $data->fecha_tramite; ?></td>
			<td><?php echo $data->observacion; ?></td>
			<td><?php echo $data->cantidad_folios; ?></td>
			<td><?php echo $data->usuarios_id_usuario; ?></td>
			<td><?php echo $data->estados_id_estado; ?></td>
			<td><?php echo $data->oficinas_id_oficina; ?></td>
		<?php } ?>
	</table>
<?php 
}
else{
	echo "Registros no encontrados";
}