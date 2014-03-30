<?php
/* @var $this DepartamentosController */
/* @var $model Departamentos */

$this->breadcrumbs=array(
	'Departamentoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Departamentos', 'url'=>array('index')),
	array('label'=>'/'),
	array('label'=>'Manage Departamentos', 'url'=>array('admin')),
);
?>
<div class="span3">&nbsp</div>
<div class="span7">
<h1>Create Departamentos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>