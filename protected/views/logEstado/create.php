<?php
/* @var $this LogEstadoController */
/* @var $model LogEstado */

$this->breadcrumbs=array(
	'Log Estados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LogEstado', 'url'=>array('index')),
	array('label'=>'Manage LogEstado', 'url'=>array('admin')),
);
?>

<h1>Create LogEstado</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>