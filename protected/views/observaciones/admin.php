<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#observaciones-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 style="text-align:center;"><u>Observaciones del Exp N° <?php echo CHtml::encode($model->tramitacionesIdTramite->expedientesIdExp->num_expediente); ?>
							</u>
</h1>
	<br>&nbsp;</br>
<p> <?php echo CHtml::submitButton('<< Volver', array('submit' => CHttpRequest::getUrlReferrer(), 'class'=>"btn btn-inverse")); ?></p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'observaciones-grid',
	'emptyText'=>'Sin Observaciones!!',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'summaryText' => 'Mostrando {end} de {count} resultados',
    'template' => "{summary}\n{pager}\n{items}\n{pager}",
    'pager'=>array(
              'header'=>'',
              'firstPageLabel'=>'Primero',
              'lastPageLabel'=>'Ultimo',
              'nextPageLabel'=>'Siguiente',
              'prevPageLabel'=>'Anterior',
              ),
	'columns'=>array(
		array(
              'name' => 'fecha',
              'header' => 'Fecha de la Observacion',
              'value' => 'Yii::app()->dateFormatter->format("dd/MM/y", strtotime($data->fecha))',
              'htmlOptions'=>array('style'=>'text-align: center;'),
              // 'footer'=>""
    ),
		'detalle_observacion',
		array(
          'name' => 'oficinas_id_oficina',
          'header' => 'Oficina',
          'value' => '$data->oficinasIdOficina->descripcion',
          'filter' => '',
    ),
	),
)); ?>
