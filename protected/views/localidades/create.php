<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */

$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Localidades', 'url'=>array('index')),
	array('label'=>'Administrar Localidades', 'url'=>array('admin')),
);
?>

<h1>Nueva Localidad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>