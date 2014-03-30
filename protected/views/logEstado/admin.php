<?php
/* @var $this LogEstadoController */
/* @var $model LogEstado */

$this->breadcrumbs=array(
	'Log Estados'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LogEstado', 'url'=>array('index')),
	array('label'=>'Create LogEstado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#log-estado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Log Estados</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'log-estado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_log_estado',
		'fecha',
		'detalle_estado',
		'tramitaciones_id_tramite',
		'oficinas_id_oficina',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
