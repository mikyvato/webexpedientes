
<h1 style="text-align:center;"><u>Observaciones <?php echo $model->id_observacion; ?></u></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_observacion',
		'detalle_observacion',
		'expedientes_id_exp',
		'tramitaciones_id_tramite',
		'oficinas_id_oficina',
	),
)); ?>
