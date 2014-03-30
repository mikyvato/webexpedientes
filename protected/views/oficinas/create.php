<?php
/* @var $this OficinasController */
/* @var $model Oficinas */

$this->breadcrumbs=array(
	'Oficinases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Oficinas', 'url'=>array('index')),
	array('label'=>'Administrar Oficinas', 'url'=>array('admin')),
);
?>

<h1>Nueva Oficina</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>