<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

$this->breadcrumbs=array(
	'Observaciones'=>array('index'),
	$model->id_observacion,
);

$this->menu=array(
	array('label'=>'List Observaciones', 'url'=>array('index')),
	array('label'=>'Create Observaciones', 'url'=>array('create')),
	array('label'=>'Update Observaciones', 'url'=>array('update', 'id'=>$model->id_observacion)),
	array('label'=>'Delete Observaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_observacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Observaciones', 'url'=>array('admin')),
);
?>

<h1>View Observaciones #<?php echo $model->id_observacion; ?></h1>

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
