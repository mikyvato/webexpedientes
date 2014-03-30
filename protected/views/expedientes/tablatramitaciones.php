

<div class="row-fluid">

	<div class="span2"></div>
	<div class="span8" id="fields">

		<table class="table table-striped table-bordered table-hover table-condensed">
		 	<caption>Tramitaciones del Expediente </caption>
		 	<thead>
			 	<tr class="info">
				 	<th>N° Expediente</th>
				 	<th>Fecha tramite</th>
				 	<th>Oficina</th>
				 	<th>Estado</th>
				 	<th>Estado Tramite</th>
				 	<th colspan="2">Obs</th>
		 		</tr>
		 	</thead>

		 	<tbody>
		 	<?php 
		 			$f=1;
		 			foreach ($model as $tramitaciones):
		 			echo "<tr class='success'>";
		 				$data = Expedientes::model()->findbypk($tramitaciones['expedientes_id_exp']);
			 			echo "<td>".$data->num_expediente."</td>";
			 			$fecha = Yii::app()->dateFormatter->format("dd/MM/y", $tramitaciones['fecha_tramite']);
			 			echo "<td>".$fecha."</td>";
			 			$ofi = Oficinas::model()->findbypk($tramitaciones['oficinas_id_oficina']);
			 			echo "<td>".$ofi->descripcion."</td>";
			 			echo "<td>".$tramitaciones->estado."</td>";
			 			echo "<td>".$tramitaciones->estado_tramite."</td>";
			 			// echo "<td>".CHtml::submitButton('Ver', array('submit' => array("observaciones/viewo","id"=>$tramitaciones->id_tramite), 'class'=>"btn btn-danger btn-mini"))."</td>";
						echo "<td>".CHtml::link('Ver',"#myModal".$tramitaciones['id_tramite'], array('data-toggle' => 'modal'))."</td>";
		 			

					?>
					<div class="modal hide fade" <?php echo 'id="myModal'.$tramitaciones['id_tramite'].'"'; ?> >

					  <div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					    <h3>Observaciones</h3>
					  </div>

					  <div class="modal-body">
					    <table class="table table-striped table-bordered table-hover table-condensed">
						 	<caption>Observaciones </caption>
						 	<thead>
							 	<tr class="info">
								 	<th>ID</th>
								 <!--	<th>Detalle</th>
								 	<th>Id Exp</th>
								 	<th>Id Tramite</th>
								 	<th>ID Oficina</th>
								 	<th>Fecha</th> -->
						 		</tr>
						 	</thead>
						<tbody>
					    <?php 
					    	$idtramite = $tramitaciones['id_tramite'];
					    	$observaciones = Observaciones::model()->findAll(array(
		 														'condition'=>'tramitaciones_id_tramite=:tramite', 
		 														'params'=>array('tramite'=> $idtramite,)
		 																	)
		 															);
					    	$f2=1;
				 			foreach ($observaciones as $obs):
					 			echo "<tr class='info'>";
						 			echo $obs['id_observacion'];
						 			// echo "<td>".$obs['detalle_observacion']."</td>";
						 			// echo "<td>".$obs['expedientes_id_exp']."</td>";
						 			// echo "<td>".$obs['tramitaciones_id_tramite']."</td>";
						 			// echo "<td>".$obs['oficinas_id_oficina']."</td>";
						 			// echo "<td>".$obs['fecha']."</td>";
					 			echo "</tr>"; 

				 				$f2++;
		 					endforeach;
		 					unset($observaciones);
		 					?>
					  	</tbody>
					  </table>
					  </div>

					  <div class="modal-footer">
					    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					  </div>

					</div>


					<?php
		 			$f++;
		 			echo "</tr>";
		 			endforeach;
					 	 if ($f==1){ 
			?>
					 	<tr class="error"><td colspan="7"> <p class="text-center">Sin Tramitaciones</p> </td></tr>
 			<?php } ?>
		 	</tbody>
		 </table>
	</div>
</div>

