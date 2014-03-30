<?php
/* @var $this DepartamentosController */
/* @var $model Departamentos */

$this->breadcrumbs=array(
	'Departamentoses'=>array('index'),
	$model->id_departamento=>array('view','id'=>$model->id_departamento),
	'Update',
);

$this->menu=array(
	array('label'=>'List Departamentos', 'url'=>array('index')),
	array('label'=>('/')),
	array('label'=>'Create Departamentos', 'url'=>array('create')),
	array('label'=>('/')),
	array('label'=>'View Departamentos', 'url'=>array('view', 'id'=>$model->id_departamento)),
	array('label'=>('/')),
	array('label'=>'Manage Departamentos', 'url'=>array('admin')),
);
?>
<div class="span3">&nbsp</div>
<div class="span6">
<h1>Update Departamentos <?php echo $model->id_departamento; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>