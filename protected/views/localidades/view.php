<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */

$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->id_localidad,
);

$this->menu=array(
	array('label'=>'Listar Localidades', 'url'=>array('index')),
	array('label'=>'Nueva Localidad', 'url'=>array('create')),
	array('label'=>'Modificar Localidad', 'url'=>array('update', 'id'=>$model->id_localidad)),
	array('label'=>'Eliminar Localidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_localidad),'confirm'=>'Esta seguro que desea eliminar este item?')),
	array('label'=>'Administar Localidades', 'url'=>array('admin')),
);
?>

<h1>View Localidades #<?php echo $model->id_localidad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_localidad',
		'descripcion',
		'dep_localidad_id_dep_localidad',
	),
)); ?>
