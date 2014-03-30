<?php
/* @var $this LogEstadoController */
/* @var $model LogEstado */

$this->breadcrumbs=array(
	'Log Estados'=>array('index'),
	$model->id_log_estado,
);

$this->menu=array(
	array('label'=>'List LogEstado', 'url'=>array('index')),
	array('label'=>'Create LogEstado', 'url'=>array('create')),
	array('label'=>'Update LogEstado', 'url'=>array('update', 'id'=>$model->id_log_estado)),
	array('label'=>'Delete LogEstado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_log_estado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LogEstado', 'url'=>array('admin')),
);
?>

<h1>View LogEstado #<?php echo $model->id_log_estado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_log_estado',
		'fecha',
		'detalle_estado',
		'tramitaciones_id_tramite',
		'oficinas_id_oficina',
	),
)); 

echo CHtml::submitButton('Asignar', array('submit' => array("tramitaciones/create"), 'class'=>"btn btn-danger btn-large"));

?>