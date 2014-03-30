<h1 style="text-align:center;"><u>Expediente N&deg;<?php echo $model->num_expediente; ?></u></h1>

<p> <?php echo CHtml::submitButton('<< Volver', array('submit' => CHttpRequest::getUrlReferrer(), 'class'=>"btn btn-inverse")); ?></p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fecha_inicio',
		array(
              'name' => 'fecha_pedido',
              'header' => 'Fecha Pedido',
              'value' => Yii::app()->dateFormatter->format("dd/MM/y", strtotime($model->fecha_pedido)),
     	),
		array(
              'name' => 'ref_exp',
              'label' => 'Referencia otro Expediente',
        ),
		'agregado_exp',
		'dirigido_a',
		'causante',
		'asunto',
		array(
              'name' => 'cantidad_folios',
              'label' => 'Cantidad Inicial de Folios',
        ),
		array(
			'label'=>'Localidad',
			'type'=>'raw',
			'value'=>$model->localidadesIdLocalidad->descripcion
		),
	),
)); 

echo CHtml::submitButton('Alta', array('submit' => array("expedientes/alta","id"=>$model->id_exp), 'class'=>"btn btn-danger btn-large"));
echo CHtml::submitButton('Media', array('submit' => array("expedientes/media","id"=>$model->id_exp), 'class'=>"btn btn-info btn-large"));
echo CHtml::submitButton('Baja', array('submit' => array("expedientes/baja","id"=>$model->id_exp), 'class'=>"btn btn-success btn-large"));

?>
