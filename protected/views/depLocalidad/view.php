<?php
/* @var $this DepLocalidadController */
/* @var $model DepLocalidad */

$this->breadcrumbs=array(
	'Dep Localidads'=>array('index'),
	$model->id_dep_localidad,
);

$this->menu=array(
	array('label'=>'List DepLocalidad', 'url'=>array('index')),
	array('label'=>'Create DepLocalidad', 'url'=>array('create')),
	array('label'=>'Update DepLocalidad', 'url'=>array('update', 'id'=>$model->id_dep_localidad)),
	array('label'=>'Delete DepLocalidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dep_localidad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DepLocalidad', 'url'=>array('admin')),
);
?>

<h1>View DepLocalidad #<?php echo $model->id_dep_localidad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dep_localidad',
		'descripcion',
	),
)); ?>
