<h1 style="text-align:center;"><u>Expediente N&deg;<?php echo $model->num_expediente; ?></u></h1>

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
)); ?>
