
<h1 style="text-align:center;"><u>Aceptar Tramitacion</u></h1>
<p> <?php echo CHtml::submitButton('<< Volver', array('submit' => CHttpRequest::getUrlReferrer(), 'class'=>"btn btn-inverse")); ?></p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tramite',
		'expedientes_id_exp',
		'fecha_tramite',
		'observacion',
		'cantidad_folios',
		'usuarios_id_usuario',
		'oficinas_id_oficina',
		'oficina_origen',
		'estado_tramite',
	),
)); 

echo CHtml::submitButton('Aceptar', array('submit' => array("tramitaciones/aceptar","id"=>$model->id_tramite), 'class'=>"btn btn-danger btn-large"));

?>