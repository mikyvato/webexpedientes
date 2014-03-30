

<div class="row-fluid">

	<!--div class="span2"></div-->
	<div class="span12" id="fields">

		<table class="table table-striped table-bordered table-hover table-condensed">
		 	<caption>Tramitaciones del Expediente </caption>
		 	<thead>
			 	<tr class="info">
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
		 				if ($f % 2) 
		 				  echo "<tr class='success'>";
		 				else
		 				  echo "<tr class='error'>";
		 				//$data = Expedientes::model()->findbypk($tramitaciones['expedientes_id_exp']);
			 			//echo "<td>".$data->num_expediente."</td>";
			 			//$fecha = Yii::app()->dateFormatter->format("dd/MM/y", $tramitaciones['fecha_tramite']);
			 			//echo "<td>".$fecha."</td>";
			 			//$ofi = Oficinas::model()->findbypk($tramitaciones['oficinas_id_oficina']);
			 			echo "<td>".$tramitaciones->oficinasIdOficina->descripcion."</td>";//$ofi->descripcion
			 			echo "<td>".$tramitaciones->estado."</td>";
			 			echo "<td>".$tramitaciones->estado_tramite."</td>";
			 			// echo "<td>".CHtml::submitButton('Ver', array('submit' => array("observaciones/viewo","id"=>$tramitaciones->id_tramite), 'class'=>"btn btn-danger btn-mini"))."</td>";
			 			if ($tramitaciones->countObs > 0) {
						  echo "<td>".CHtml::link(
						  	'<i class="icon-search icon-white"></i> Ver',"#myModal".$tramitaciones['id_tramite'], 
						  	array(
						  		'data-toggle' => 'modal',
						  		'class' => 'btn btn-mini btn-primary',
						  		))."</td>";
			 			
		 			    

					?>
					<div class="modal hide fade" <?php echo 'id="myModal'.$tramitaciones['id_tramite'].'"'; ?> >

					  <div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					    <h3>Observaciones <small><?php echo $tramitaciones->oficinasIdOficina->descripcion; ?></small></h3>
					  </div>

					  <div class="modal-body">
							<?php 
							  $this->renderPartial('modalObservaciones', array('idtramite'=>$tramitaciones['id_tramite']));
							?>
					  </div>

					  <div class="modal-footer">
					    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					  </div>

					</div>


					<?php
				} else { echo "<td></td>";}
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

