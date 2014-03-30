<?php
/* @var $this DepLocalidadController */
/* @var $model DepLocalidad */

$this->breadcrumbs=array(
	'Dep Localidads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DepLocalidad', 'url'=>array('index')),
	array('label'=>'Manage DepLocalidad', 'url'=>array('admin')),
);
?>

<h1>Create DepLocalidad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>