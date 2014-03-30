<?php
/* @var $this DepLocalidadController */
/* @var $model DepLocalidad */

$this->breadcrumbs=array(
	'Dep Localidads'=>array('index'),
	$model->id_dep_localidad=>array('view','id'=>$model->id_dep_localidad),
	'Update',
);

$this->menu=array(
	array('label'=>'List DepLocalidad', 'url'=>array('index')),
	array('label'=>'Create DepLocalidad', 'url'=>array('create')),
	array('label'=>'View DepLocalidad', 'url'=>array('view', 'id'=>$model->id_dep_localidad)),
	array('label'=>'Manage DepLocalidad', 'url'=>array('admin')),
);
?>

<h1>Update DepLocalidad <?php echo $model->id_dep_localidad; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>