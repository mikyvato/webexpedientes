
<!--table class="table table-striped table-bordered table-hover table-condensed">
 	
 	<thead>
	 	<tr class="info">
		 	<th>ID</th>
		 	<th>Detalle</th>
		 	<th>Id Exp</th>
		 	<th>Id Tramite</th>
		 	<th>ID Oficina</th>
		 	<th>Fecha</th>
 		</tr>
 	</thead>
<tbody-->
<?php 
	$observaciones = Observaciones::model()->findAll(
								array(
									'condition'=>'tramitaciones_id_tramite=:tramite', 
									'params'=>array('tramite'=> $idtramite,)
									)
								);
	
	foreach ($observaciones as $obs):
		echo "<blockquote>";
 		echo "<dt><span class='label label-info'>Fecha: </span> &nbsp;".$obs['fecha']."</dt>";
 		echo "<p>".$obs['detalle_observacion']."</p>";
 			// echo "<td>".$obs['expedientes_id_exp']."</td>";
 			// echo "<td>".$obs['tramitaciones_id_tramite']."</td>";
 			// echo "<td>".$obs['oficinas_id_oficina']."</td>";
		echo "</blockquote>"; 
		endforeach;
		unset($observaciones);
		?>
	
	<!--/tbody>
</table-->


	